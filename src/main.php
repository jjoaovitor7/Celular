<?php
require_once(__DIR__ . '/Celular.php');
require_once(__DIR__ . '/clearScreen.php');
require_once(__DIR__ . '/Contato.php');
require_once(__DIR__ . '/requests.php');
require_once(__DIR__ . '/optionProprietario.php');
require_once(__DIR__ . '/ContatoFunctions.php');

$celular = new Celular();
$contato = new Contato();

clearScreen();
echo "---Cadastro de Celular\n";
requestCor($celular);
requestMarca($celular);
requestModelo($celular);
requestQuantidadeMemoriaArmazenamento($celular);
requestQuantidadeMemoriaRAM($celular);
requestSO($celular);
clearScreen();

echo " ------------------";
echo "\n|Celular cadastrado|";
echo "\n ------------------";
$celular->getInfo($celular);

echo "\nLigar o celular? <S/n>\n";
$ligarCelular = fgets(STDIN);
if (strtok($ligarCelular, "\n") == "S" || strtok($ligarCelular, "\n") == "s")
{
    $celular->ligar();
    $celular->showOptionsHome();

    $isTrue = true;
    while ($isTrue)
    {
        $showOptionsCond = fgets(STDIN);


        // Home
        if ($showOptionsCond == 1)
        {
            clearScreen();
            $celular->showOptionsHome();
        }


        // Contatos
        else if ($showOptionsCond == 2)
        {
            clearScreen();
            $celular->showOptionsContatos();
            $contatosOptions = fgets(STDIN);
            if ($contatosOptions == 1)
            {
                clearScreen();
                addContato($contato);
                $celular->showOptionsHome();
            }
            
            else if ($contatosOptions == 2)
            {
                echo $contato->getContato();
                echo "\n";
                $celular->showOptionsHome();
            }

            else if ($contatosOptions == 3)
            {
                selectContato($celular, $contato);
            }

            else if ($contatosOptions == 4)
            {
                deleteContato($celular, $contato);
            }
            else {
                echo "Opção não encontrada.\n";
                $celular->showOptionsHome();
            }
        }


        // Enviar mensagem
        else if ($showOptionsCond == 3)
        {
            echo "Digite sua mensagem: ";
            $msg = fgets(STDIN);
            echo "Digite o ID do usuário para quem quer enviar: ";
            $idDestinatario = fgets(STDIN);
            if (array_key_exists(intval($idDestinatario), $contato->getContatoArray()))
            {
                $contato->enviarMensagem(strtok($idDestinatario, "\n"), strtok($msg, "\n"));
                $celular->showOptionsHome();
            }
            else {
                echo "Você não tem esse contato adicionado.";
                $celular->showOptionsHome();
            }
        }


        // Configurações
        else if ($showOptionsCond == 4)
        {
            clearScreen();
            if ($celular->getStatusProprietario() == false)
            {
                $celular->showOptionsConfig();
                $configOptions = fgets(STDIN);
                optionProprietario($celular, false, $configOptions);

                if (intval($configOptions) <= 0 ||intval($configOptions) >= 3 || gettype(intval($configOptions)) != "integer"){
                    echo "Opção não encontrada.\n";
                    $celular->showOptionsHome();
                }
            } else {
                $celular->showOptionsConfigWithProprietario();
                $configOptions = fgets(STDIN);
        
                optionProprietario($celular, true, $configOptions);
                if ($configOptions == 3)
                {
                    clearScreen();
                    echo "Nome do Proprietário: ";
                    echo $celular->getNomeProprietario();
                    $celular->showOptionsHome();
                }

                if (intval($configOptions) <= 0 ||intval($configOptions) >= 4 || gettype(intval($configOptions)) != "integer"){
                    echo "Opção não encontrada.\n";
                    $celular->showOptionsHome();
                }

            }
        }


        // Desligar
        else if ($showOptionsCond == 5)
        {
            $celular->desligar();
            echo "\n";
            $isTrue = false;
            break;
        }
        else {
            echo "Opção não encontrada.\n";
            echo "Estamos te redirecionando para a Home.\n";
            sleep(5);
            clearScreen();
            $celular->showOptionsHome();
        }
    }
} else {
    echo "O celular não será ligado.\n";
}
