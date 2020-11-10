<?php
class Request
{
    public function requestCor($celular)
    {
        echo "Cor: "
    ."\n1-Preto"
    ."\n2-Branco"
    ."\n3-Dourado"
    ."\n4-Outra"
    ."\n:";
        $corCelular = fgets(STDIN);
        if ($corCelular == 1) {
            $celular->setCor("Preto");
        } elseif ($corCelular == 2) {
            $celular->setCor("Branco");
        } elseif ($corCelular == 3) {
            $celular->setCor("Dourado");
        } elseif ($corCelular == 4) {
            $celular->setCor(fgets(STDIN));
        } else {
            $celular->setCor("Preto");
        }
    }

    public function requestMarca($celular)
    {
        echo "Marca: ";
        $celular->setMarca(fgets(STDIN));
    }

    public function requestModelo($celular)
    {
        echo "Modelo: ";
        $celular->setModelo(fgets(STDIN));
    }

    public function requestQuantidadeMemoriaArmazenamento($celular)
    {
        echo "Quantidade de Memória de Armazenamento: "
    ."\n1-16GB"
    ."\n2-32GB"
    ."\n3-64GB"
    ."\n4-128GB"
    ."\n5-256GB"
    ."\n:";
        $qtdeArmazenamento = fgets(STDIN);
        if ($qtdeArmazenamento == 1) {
            $celular->setQtdeMemoriaArmazenamento("16GB");
        } elseif ($qtdeArmazenamento == 2) {
            $celular->setQtdeMemoriaArmazenamento("32GB");
        } elseif ($qtdeArmazenamento == 3) {
            $celular->setQtdeMemoriaArmazenamento("64GB");
        } elseif ($qtdeArmazenamento == 4) {
            $celular->setQtdeMemoriaArmazenamento("128GB");
        } elseif ($qtdeArmazenamento == 5) {
            $celular->setQtdeMemoriaArmazenamento("256GB");
        } else {
            $celular->setQtdeMemoriaArmazenamento("16GB");
        }
    }

    public function requestQuantidadeMemoriaRAM($celular)
    {
        echo "Quantidade de Memória RAM:"
    ."\n1-2GB"
    ."\n2-4GB"
    ."\n3-8GB"
    ."\n:";
        $qtdeRAM = fgets(STDIN);
        if ($qtdeRAM == 1) {
            $celular->setQtdeMemoriaRAM("2GB");
        } elseif ($qtdeRAM == 2) {
            $celular->setQtdeMemoriaRAM("4GB");
        } elseif ($qtdeRAM == 3) {
            $celular->setQtdeMemoriaRAM("8GB");
        } else {
            $celular->setQtdeMemoriaRAM("2GB");
        }
    }

    public function requestSO($celular)
    {
        echo "Sistema Operacional: ";
        $celular->setSO(fgets(STDIN));
    }
}
?>