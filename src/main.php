<?php
require_once('./src/Celular.php');
require_once('./src/Contato.php');
require_once('./src/Option.php');
require_once('./src/Request.php');

require_once('./src/scripts/cadastrarCelular.php');
require_once('./src/scripts/clearScreen.php');

$celular = new Celular();
$contato = new Contato();
$option = new Option();
$request = new Request();

clearScreen();
cadastrarCelular($celular);

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

        switch ($showOptionsCond) {
            // Home
            case 1:
                clearScreen();
                $celular->showOptionsHome();
            break;

            // Contatos
            case 2:
                clearScreen();
                $celular->showOptionsContatos();
                $contatosOptions = fgets(STDIN);

            switch ($contatosOptions)
            {
                case 1:
                    clearScreen();
                    $option->addContact($contato);
                    $celular->showOptionsHome();
                break;

                case 2:
                    echo $contato->getContato();
                    echo "\n";
                    $celular->showOptionsHome();
                break;

                case 3:
                    $option->selectContact($celular, $contato);
                break;

                case 4:
                    $option->deleteContact($celular, $contato);
                break;

                default:
                    echo "Opção não encontrada.\n";
                    $celular->showOptionsHome();
                break;
            }

            break;

            // Enviar mensagem
            case 3:
                $option->sendMessage($celular, $contato);
            break;

            case 4:
                clearScreen();
                echo "Navegadores";
                echo "\n1-Firefox";
                echo "\n2-Chrome";
                echo "\n:";

                $acessarInternet = fgets(STDIN);
                switch ($acessarInternet)
                {
                    case 1:
                        echo "Abrindo Firefox...\n";
                        popen("firefox -url https://google.com", "r");
                        $celular->showOptionsHome();
                    break;

                    case 2:
                        echo "Abrindo Chrome...\n";
                        popen("google-chrome -url https://google.com", "r");
                        sleep(3);
                        $celular->showOptionsHome();
                    break;

                    default:
                        echo "Navegador não encontrado.";
                    break;
                }

            // Configurações
            case 5:
                clearScreen();
                if ($celular->getStatusProprietario() == false)
                {
                    $celular->showOptionsConfig();
                    $configOptions = fgets(STDIN);
                    $option->configWithAboutAndWithoutOwnerDefined($celular, false, $configOptions);

                    if (intval($configOptions) <= 0 ||intval($configOptions) >= 3 || gettype(intval($configOptions)) != "integer"){
                       echo "Opção não encontrada.\n";
                        $celular->showOptionsHome();
                    }
                } else {
                    $celular->showOptionsConfigWithProprietario();
                    $configOptions = fgets(STDIN);
        
                    $option->configWithAboutAndWithoutOwnerDefined($celular, true, $configOptions);
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
            break;

            // Desligar
            case 6:
                $celular->desligar();
                echo "\n";
                $isTrue = false;
            break;

            default:
                echo "Opção não encontrada.\n";
                echo "Estamos te redirecionando para a Home.\n";
                sleep(5);
                clearScreen();
                $celular->showOptionsHome();
            break;
        }
    }
}
else {
    echo "O celular não será ligado.\n";
}
