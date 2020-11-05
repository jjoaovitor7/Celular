<?php
require_once(getcwd() . '/clearScreen.php');

class Celular
{
    // atributos
    private $cor = null;
    private $marca = null;
    private $modelo = null;
    private $qtdeMemoriaArmazenamento = null;
    private $qtdeMemoriaRAM = null;
    private $sistemaOperacional = null;


    // setters
    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setQtdeMemoriaArmazenamento($qtdeMemoriaArmazenamento)
    {
        $this->qtdeMemoriaArmazenamento = $qtdeMemoriaArmazenamento;
    }

    public function setQtdeMemoriaRAM($qtdeMemoriaRAM)
    {
        $this->qtdeMemoriaRAM = $qtdeMemoriaRAM;
    }

    public function setSO($so)
    {
        $this->sistemaOperacional = $so;
    }


    // getters
    public function getCor()
    {
        return $this->cor;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getQtdeMemoriaArmazenamento()
    {
        return $this->qtdeMemoriaArmazenamento;
    }

    public function getQtdeMemoriaRAM()
    {
        return $this->qtdeMemoriaRAM;
    }

    public function getSO()
    {
        return $this->sistemaOperacional;
    }

    public function ligar()
    {
        clearScreen();
        echo "Ligando.";
        sleep(2);
        clearScreen();
        echo "Ligando..";
        sleep(2);
        clearScreen();
        echo "Ligando...";
        sleep(2);
        echo "\nCelular ligado!\n";
        sleep(2);
    }

    public function showOptions()
    {
        echo "Home";
        echo "\n1-Home";
        echo "\n2-Contatos";
        echo "\n:";
    }
}
?>