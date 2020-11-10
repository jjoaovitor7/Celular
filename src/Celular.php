<?php
require_once(__DIR__ . '/clearScreen.php');

class Celular
{
    // atributos
    private $cor = null;
    private $marca = null;
    private $modelo = null;
    private $qtdeMemoriaArmazenamento = null;
    private $qtdeMemoriaRAM = null;
    private $sistemaOperacional = null;
    private $statusProprietario = false;
    private $nomeProprietario = null;


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

    public function setNomeProprietario($nomeProprietario)
    {
        $this->nomeProprietario = $nomeProprietario;
    }

    public function setStatusNomeProprietario($statusNomeProprietario){
        $this->statusProprietario = $statusNomeProprietario;
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

    public function getNomeProprietario()
    {
        return $this->nomeProprietario;
    }

    public function getStatusProprietario(){
        return $this->statusProprietario;
    }

    public function getInfo($celular)
    {
        echo "\n|Cor: {$celular->getCor()}\n";
        echo "|Marca: {$celular->getMarca()}";
        echo "|Modelo: {$celular->getModelo()}";
        echo "|Quantidade de Memória de Armazenamento: {$celular->getQtdeMemoriaArmazenamento()}\n";
        echo "|Quantidade de Memória RAM: {$celular->getQtdeMemoriaRAM()}\n";
        echo "|Sistema Operacional: {$celular->getSO()}";
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

    public function desligar()
    {
        clearScreen();
        echo "Desligando.";
        sleep(2);
        clearScreen();
        echo "Desligando..";
        sleep(2);
        clearScreen();
        echo "Desligando...";
        sleep(2);
    }

    public function showOptionsHome()
    {
        echo "\nHome";
        echo "\n1-Home";
        echo "\n2-Contatos";
        echo "\n3-Enviar Mensagem";
        echo "\n4-Acessar Internet";
        echo "\n5-Configurações";
        echo "\n6-Desligar";
        echo "\n:";
    }

    public function showOptionsContatos()
    {
        echo "Contatos";
        echo "\n1-Adicionar Contato";
        echo "\n2-Ver Contatos";
        echo "\n3-Selecionar Contato";
        echo "\n4-Deletar Contato";
        echo "\n:";
    }

    public function showOptionsConfig()
    {
        echo "Configurações";
        echo "\n1-Sobre";
        echo "\n2-Definir nome do proprietário";
        echo "\n:";
    }

    public function showOptionsConfigWithProprietario()
    {
        echo "Configurações";
        echo "\n1-Sobre";
        echo "\n2-Definir nome do proprietário";
        echo "\n3-Ver nome do proprietário";
        echo "\n:";
    }
}
?>