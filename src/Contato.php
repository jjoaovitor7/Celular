<?php
class Contato {
    private $contatosList = array();

    public function addContato($contato) {
        array_push($this->contatosList, $contato);
    }

    public function getContato(){
        return json_encode($this->contatosList);
    }
}
?>