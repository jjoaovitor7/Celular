<?php
function requestCor($celular)
{
    echo "Cor: "
    ."\n1-Preto"
    ."\n2-Branco"
    ."\n3-Dourado"
    ."\n4-Outra"
    ."\n:";
    $corCelular = fgets(STDIN);
    if($corCelular == 1){
        $celular->setCor("Preto");
    }
    else if($corCelular == 2){
        $celular->setCor("Branco");
    }
    else if($corCelular == 3){
        $celular->setCor("Dourado");
    }
    else if($corCelular == 4){
        $celular->setCor(fgets(STDIN));
    }
    else {
        $celular->setCor("Preto");
    }
}

function requestMarca($celular)
{
    echo "Marca: ";
    $celular->setMarca(fgets(STDIN));
}

function requestModelo($celular)
{
    echo "Modelo: ";
    $celular->setModelo(fgets(STDIN));
}

function requestQuantidadeMemoriaArmazenamento($celular)
{
    echo "Quantidade de Memória de Armazenamento: "
    ."\n1-16GB"
    ."\n2-32GB"
    ."\n3-64GB"
    ."\n4-128GB"
    ."\n5-256GB"
    ."\n:";
    $qtdeArmazenamento = fgets(STDIN);
    if ($qtdeArmazenamento == 1){
        $celular->setQtdeMemoriaArmazenamento("16GB");
    }
    else if($qtdeArmazenamento == 2){
        $celular->setQtdeMemoriaArmazenamento("32GB");
    }
    else if($qtdeArmazenamento == 3){
        $celular->setQtdeMemoriaArmazenamento("64GB");
    }
    else if($qtdeArmazenamento == 4){
       $celular->setQtdeMemoriaArmazenamento("128GB");
    }
    else if($qtdeArmazenamento == 5){
        $celular->setQtdeMemoriaArmazenamento("256GB");
    }
    else {
        $celular->setQtdeMemoriaArmazenamento("16GB");
    }
}

function requestQuantidadeMemoriaRAM($celular)
{
    echo "Quantidade de Memória RAM:"
    ."\n1-2GB"
    ."\n2-4GB"
    ."\n3-8GB"
    ."\n:";
    $qtdeRAM = fgets(STDIN);
    if ($qtdeRAM == 1){
        $celular->setQtdeMemoriaRAM("2GB");
    }
    else if ($qtdeRAM == 2){
        $celular->setQtdeMemoriaRAM("4GB");
    }
    else if ($qtdeRAM == 3){
        $celular->setQtdeMemoriaRAM("8GB");
    }
    else {
        $celular->setQtdeMemoriaRAM("2GB");
    }
}

function requestSO($celular)
{
    echo "Sistema Operacional: ";
    $celular->setSO(fgets(STDIN));
}
?>