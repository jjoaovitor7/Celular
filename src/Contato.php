<?php
class Contato {
    private $contatosList = array();
    public $id = 0;

    public function addContato($contato) {
        array_push($this->contatosList, $contato);
    }

    public function getContatoArray(){
        return $this->contatosList;
    }

    public function getContato(){
        return json_encode($this->contatosList);
    }

    public function selectNomeContato($index){
        return json_encode($this->contatosList[$index]["nome"]);
    }

    public function selectNumeroContato($index){
        return json_encode($this->contatosList[$index]["numero"]);
    }
}
?>