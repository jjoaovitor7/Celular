<?php
require_once('./src/scripts/clearScreen.php');

class Option
{
    public function addContact($contato)
    {
        echo "Nome do Contato: ";
        $nomeContato = fgets(STDIN);
        echo "Número do Contato: ";
        $numContato = fgets(STDIN);

        $contatoAux = array("id" => $contato->id, "nome" => strtok($nomeContato, "\n"), "numero" => strtok($numContato, "\n"));
        $contato->addContato($contatoAux);
        $contato->id += 1;
    }

    public function selectContact($celular, $contato)
    {
        echo "ID do Contato: ";
        $idContato = fgets(STDIN);

        if (array_key_exists(intval($idContato), $contato->getContatoArray())) {
            echo "Contato Selecionado: ";
            echo $contato->selectNomeContato(intval($idContato));
            echo "\n";
            echo "Número: ";
            echo $contato->selectNumeroContato(intval($idContato));
            echo "\n";
            $celular->showOptionsHome();
        }
        
        else {
            clearScreen();
            echo "Contato não existe!\n";
            $celular->showOptionsHome();
        }
    }

    public function deleteContact($celular, $contato)
    {
        echo "ID do Contato: ";
        $idContato = fgets(STDIN);

        if (array_key_exists(intval($idContato), $contato->getContatoArray())) {
            $contato->deleteContato(intval($idContato));
            echo "Contato deletado!\n";
            $celular->showOptionsHome();
        }
        
        else {
            clearScreen();
            echo "Contato não existe!\n";
            $celular->showOptionsHome();
        }
    }

    public function sendMessage($celular, $contato){
        echo "Digite sua mensagem: ";
        $msg = fgets(STDIN);

        echo "Digite o ID do usuário para quem quer enviar: ";
        $idDestinatario = fgets(STDIN);

        if (array_key_exists(intval($idDestinatario), $contato->getContatoArray())) {
            $contato->enviarMensagem(strtok($idDestinatario, "\n"), strtok($msg, "\n"));
            $celular->showOptionsHome();
        }
        
        else {
            echo "Você não tem esse contato adicionado.\n";
            $celular->showOptionsHome();
        }
    }

    public function configWithAboutAndWithoutOwnerDefined($celular, $status, $configOptions)
    {
        switch ($configOptions)
        {
            case 1:
                clearScreen();
                $celular->getInfo($celular);
                $celular->showOptionsHome();
            break;

            case 2:
                clearScreen();
                echo "Nome do Proprietário: ";
                $nomeProprietario = fgets(STDIN);

                if ($celular->getStatusProprietario() == $status && $nomeProprietario != null) {
                   $celular->setNomeProprietario($nomeProprietario);
                   $celular->setStatusNomeProprietario(true);
                   $celular->showOptionsHome();
                }
            break;
        }
    }
}
?>
