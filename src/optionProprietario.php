<?php
require_once(__DIR__ . '/Celular.php');

function optionProprietario($celular, $status, $configOptions){
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
        if ($celular->getStatusProprietario() == $status && $nomeProprietario != null)
        {
            $celular->setNomeProprietario($nomeProprietario);
            $celular->setStatusNomeProprietario(true);
            $celular->showOptionsHome();
        }
    }
}
?>