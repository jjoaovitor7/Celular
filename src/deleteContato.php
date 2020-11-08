<?php
function deleteContato($celular, $contato){
    echo "ID do Contato: ";
    $idContato = fgets(STDIN);
    if (array_key_exists(intval($idContato), $contato->getContatoArray())) {
        $contato->deletarContato(intval($idContato));
        echo "Contato deletado!\n";
        $celular->showOptionsHome();
    } else {
        echo "Contato não existe!";
        $celular->showOptionsHome();
    }
}
?>