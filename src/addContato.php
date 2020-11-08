<?php
function addContato($contato){
    echo "Nome do Contato: ";
    $nomeContato = fgets(STDIN);
    echo "Número do Contato: ";
    $numContato = fgets(STDIN);

    $contatoAux = array("id" => $contato->id, "nome"=>strtok($nomeContato, "\n"), "numero"=>strtok($numContato, "\n"));
    $contato->addContato($contatoAux);
    $contato->id += 1;
}
?>