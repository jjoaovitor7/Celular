<?php
class Celular {

    // atributos
    private $cor;
    private $marca;
    private $modelo;
    private $qtdeMemoriaArmazenamento;
    private $qtdeMemoriaRAM;
    private $sistemaOperacional;


    // setters
    public function setCor($cor){
        $this->$cor = $cor;
    }

    public function setMarca($marca){
        $this->$marca = $marca;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function setQtdeMemoriaArmazenamento($qtdeMemoriaArmazenamento){
        $this->$qtdeMemoriaArmazenamento = $qtdeMemoriaArmazenamento;
    }

    public function setQtdeMemoriaRAM($qtdeMemoriaRAM){
        $this->$qtdeMemoriaRAM = $qtdeMemoriaRAM;
    }

    public function setSO($so){
        $this->sistemaOperacional = $so;
    }


    // getters
    public function getCor(){
        return $this->cor;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function getQtdeMemoriaArmazenamento(){
        return $this->qtdeMemoriaArmazenamento;
    }

    public function getQtdeMemoriaRAM(){
        return $this->qtdeMemoriaRAM;
    }

    public function getSO(){
        return $this->sistemaOperacional;
    }
}
