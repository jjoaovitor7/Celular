<?php
function enviarMensagem($celular, $contato){
    echo "Digite sua mensagem: ";
    $msg = fgets(STDIN);
    echo "Digite o ID do usuário para quem quer enviar: ";
    $idDestinatario = fgets(STDIN);
    if (array_key_exists(intval($idDestinatario), $contato->getContatoArray())) {
        $contato->enviarMensagem(strtok($idDestinatario, "\n"), strtok($msg, "\n"));
        $celular->showOptionsHome();
    } else {
        echo "Você não tem esse contato adicionado.";
        $celular->showOptionsHome();
    }
}
?>