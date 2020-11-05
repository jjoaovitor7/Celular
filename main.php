<?php
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

    public function ligar(){
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
}

function clearScreen()
{
    if (PHP_OS == "Linux") {
        echo system("clear");
    } else {
        echo system('cmd /c cls');
    }
}

$celular = new Celular();

echo "---Cadastro de Celular\n";
echo "Cor: ";
$celular->setCor(fgets(STDIN));
echo "Marca: ";
$celular->setMarca(fgets(STDIN));
echo "Modelo: ";
$celular->setModelo(fgets(STDIN));
echo "Quantidade de Memória de Armazenamento: ";
$celular->setQtdeMemoriaArmazenamento(fgets(STDIN));
echo "Quantidade de Memória RAM: ";
$celular->setQtdeMemoriaRAM(fgets(STDIN));
echo "Sistema Operacional: ";
$celular->setSO(fgets(STDIN));

clearScreen();

echo "\n ------------------";
echo "\n|Celular cadastrado|";
echo "\n ------------------";
echo "\n|Cor: {$celular->getCor()}";
echo "|Marca: {$celular->getMarca()}";
echo "|Modelo: {$celular->getModelo()}";
echo "|Quantidade de Memória de Armazenamento: {$celular->getQtdeMemoriaArmazenamento()}";
echo "|Quantidade de Memória RAM: {$celular->getQtdeMemoriaRAM()}";
echo "|Sistema Operacional: {$celular->getSO()}";

echo "\nLigar o celular? <S/n>\n";
$ligarCelular = fgets(STDIN);
if ($ligarCelular == "S\n"){
    $celular->ligar();
}
else {
    echo "O celular não será ligado.";
}
