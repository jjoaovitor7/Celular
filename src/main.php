<?php
require_once(__DIR__ . '/Celular.php');
require_once(__DIR__ . '/clearScreen.php');
require_once(__DIR__ . '/Contato.php');
require_once(__DIR__ . '/requests.php');

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
if (strtok($ligarCelular, "\n") == "S")
{
    $celular->ligar();
    $celular->showOptionsHome();

    $isTrue = true;
    while ($isTrue)
    {
        $showOptionsCond = fgets(STDIN);
        if ($showOptionsCond == 1)
        {
            clearScreen();
            $celular->showOptionsHome();
        }

        if ($showOptionsCond == 2)
        {
            clearScreen();
            $celular->showOptionsContatos();
            $contatosOptions = fgets(STDIN);
            if ($contatosOptions == 1)
            {
                clearScreen();
                echo "Nome do Contato: ";
                $nomeContato = fgets(STDIN);
                echo "Número do Contato: ";
                $numContato = fgets(STDIN);

                $contatoAux = array("id" => $contato->id, "nome"=>strtok($nomeContato, "\n"), "numero"=>strtok($numContato, "\n"));
                $contato->addContato($contatoAux);
                $contato->id += 1;
                $celular->showOptionsHome();
            }
            
            if ($contatosOptions == 2)
            {
                echo $contato->getContato();
                echo "\n";
                $celular->showOptionsHome();
            }

            if ($contatosOptions == 3)
            {
                echo "ID do Contato: ";
                $idContato = fgets(STDIN);
                if (array_key_exists(intval($idContato), $contato->getContatoArray()))
                {
                    echo "Contato Selecionado: ";
                    echo $contato->selectNomeContato(intval($idContato));
                    echo "\n";
                    echo "Número: ";
                    echo $contato->selectNumeroContato(intval($idContato));
                    echo "\n";
                    $celular->showOptionsHome();
                }
                else {
                    echo "Contato não existe!";
                    $celular->showOptionsHome();
                }
            }

            if ($contatosOptions == 4)
            {
                echo "ID do Contato: ";
                $idContato = fgets(STDIN);
                if (array_key_exists(intval($idContato), $contato->getContatoArray()))
                {
                    $contato->deletarContato(intval($idContato));
                    echo "Contato deletado!\n";
                    $celular->showOptionsHome();
                }
                else {
                    echo "Contato não existe!";
                    $celular->showOptionsHome();
                }
            }
        }

        if ($showOptionsCond == 3)
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

        if ($showOptionsCond == 4)
        {
            clearScreen();
            if ($celular->getStatusProprietario() == false)
            {
                $celular->showOptionsConfig();
                $configOptions = fgets(STDIN);
                if ($configOptions == 1)
                {
                    clearScreen();
                    $celular->getInfo($celular);
                    $celular->showOptionsHome();
                }
            
                if ($configOptions == 2)
                {
                    clearScreen();
                    echo "Nome do Proprietário: ";
                    $nomeProprietario = fgets(STDIN);
                    if ($celular->getStatusProprietario() == false && $nomeProprietario != null)
                    {
                        $celular->setNomeProprietario($nomeProprietario);
                        $celular->setStatusNomeProprietario(true);
                        $celular->showOptionsHome();
                    }
                }
            } else {
                $celular->showOptionsConfigWithProprietario();
                $configOptions = fgets(STDIN);
                if ($configOptions == 1)
                {
                    clearScreen();
                    $celular->getInfo($celular);
                    $celular->showOptionsHome();
                }
            
                if ($configOptions == 2)
                {
                    clearScreen();
                    echo "Nome do Proprietário: ";
                    $nomeProprietario = fgets(STDIN);
                    if ($celular->getStatusProprietario() == true && $nomeProprietario != null)
                    {
                        $celular->setNomeProprietario($nomeProprietario);
                        $celular->setStatusNomeProprietario(true);
                        $celular->showOptionsHome();
                    }
                }

                if ($configOptions == 3)
                {
                    clearScreen();
                    echo "Nome do Proprietário: ";
                    echo $celular->getNomeProprietario();
                    $celular->showOptionsHome();
                }
            }
        }

        if ($showOptionsCond == 5)
        {
            $celular->desligar();
            echo "\n";
            $isTrue = false;
            break;
        }
    }
} else {
    echo "O celular não será ligado.\n";
}
