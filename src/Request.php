<?php
class Request
{
    public function requestCor($celular)
    {
        echo "Cor: ";
        echo "\n1-Preto";
        echo "\n2-Branco";
        echo "\n3-Dourado";
        echo "\n4-Outra";
        echo "\n:";

        $corCelular = fgets(STDIN);
        switch ($corCelular)
        {
            case 1:
                $celular->setCor("Preto");
            break;
            
            case 2:
                $celular->setCor("Branco");
            break;

            case 3:
                $celular->setCor("Dourado");
            break;
            
            case 4:
                $celular->setCor(fgets(STDIN));
            break;

            default:
                $celular->setCor("Preto");
            break;
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
        echo "Quantidade de Memória de Armazenamento: ";
        echo "\n1-16GB";
        echo "\n2-32GB";
        echo "\n3-64GB";
        echo "\n4-128GB";
        echo "\n5-256GB";
        echo "\n:";

        $qtdeArmazenamento = fgets(STDIN);
        switch($qtdeArmazenamento)
        {
            case 1:
                $celular->setQtdeMemoriaArmazenamento("16GB");
            break;
            
            case 2:
                $celular->setQtdeMemoriaArmazenamento("32GB");
            break;
            
            case 3:
                $celular->setQtdeMemoriaArmazenamento("64GB");
            break;

            case 4:
                $celular->setQtdeMemoriaArmazenamento("128GB");
            break;
            
            case 5:
                $celular->setQtdeMemoriaArmazenamento("256GB");
            break;

            default:
                $celular->setQtdeMemoriaArmazenamento("16GB");
            break;
        }
    }

    public function requestQuantidadeMemoriaRAM($celular)
    {
        echo "Quantidade de Memória RAM:";
        echo "\n1-2GB";
        echo "\n2-4GB";
        echo "\n3-8GB";
        echo "\n:";

        $qtdeRAM = fgets(STDIN);
        switch($qtdeRAM)
        {
            case 1:
                $celular->setQtdeMemoriaRAM("2GB");
            break;
            
            case 2:
                $celular->setQtdeMemoriaRAM("4GB");
            break;

            case 3:
                $celular->setQtdeMemoriaRAM("8GB");
            break;
            
            default:
                $celular->setQtdeMemoriaRAM("2GB");
            break;
        }
    }

    public function requestSO($celular)
    {
        echo "Sistema Operacional: ";
        $celular->setSO(fgets(STDIN));
    }
}
?>
