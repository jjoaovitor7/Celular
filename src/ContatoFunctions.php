<?php
function addContato($contato)
{
    echo "Nome do Contato: ";
    $nomeContato = fgets(STDIN);
    echo "Número do Contato: ";
    $numContato = fgets(STDIN);

    $contatoAux = array("id" => $contato->id, "nome"=>strtok($nomeContato, "\n"), "numero"=>strtok($numContato, "\n"));
    $contato->addContato($contatoAux);
    $contato->id += 1;
}

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

function deleteContato($celular, $contato)
{
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