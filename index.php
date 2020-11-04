<?php
class Celular {
    private $cor;

    private $marca;
    private $modelo;

    private $qtdeMemoriaArmazenamento;
    private $qtdeMemoriaRAM;

    private $sistemaOperacional;

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

}
