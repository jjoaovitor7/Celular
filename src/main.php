<?php
require_once(__DIR__ . '/Celular.php');
require_once(__DIR__ . '/clearScreen.php');
require_once(__DIR__ . '/Contato.php');
require_once(__DIR__ . '/requests.php');
require_once(__DIR__ . '/optionProprietario.php');
require_once(__DIR__ . '/ContatoFunctions.php');
require_once(__DIR__ . '/enviarMensagem.php');

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
                optionAddContato($contato);
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
                optionSelectContato($celular, $contato);
            }

            else if ($contatosOptions == 4)
            {
                optionDeleteContato($celular, $contato);
            }
            else {
                echo "Opção não encontrada.\n";
                $celular->showOptionsHome();
            }
        }


        // Enviar mensagem
        else if ($showOptionsCond == 3)
        {
            enviarMensagem($celular, $contato);
        }

        else if ($showOptionsCond == 4)
        {
            clearScreen();
            echo "Navegadores";
            echo "\n1-Firefox";
            echo "\n2-Chrome";
            echo "\n:";
            $acessarInternet = fgets(STDIN);
            if ($acessarInternet == 1)
            {
                echo "Abrindo Firefox...\n";
                popen("firefox -url https://google.com", "r");
                $celular->showOptionsHome();
            }
            
            else if ($acessarInternet == 2)
            {
                echo "Abrindo Chrome...\n";
                popen("google-chrome -url https://google.com", "r");
                sleep(3);
                $celular->showOptionsHome();
            }

            else {
                echo "Navegador não encontrado.";
            }
        }

        // Configurações
        else if ($showOptionsCond == 5)
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
        else if ($showOptionsCond == 6)
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
