<?php
function selectContato($celular, $contato)
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
    } else {
        echo "Contato não existe!";
        $celular->showOptionsHome();
    }
}
?>