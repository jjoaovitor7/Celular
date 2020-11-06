<?php
require_once(__DIR__ . '/Celular.php');
require_once(__DIR__ . '/clearScreen.php');
require_once(__DIR__ . '/Contato.php');

$celular = new Celular();
$contato = new Contato();

clearScreen();

echo "---Cadastro de Celular\n";

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

echo "Marca: ";
$celular->setMarca(fgets(STDIN));

echo "Modelo: ";
$celular->setModelo(fgets(STDIN));

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

echo "Sistema Operacional: ";
$celular->setSO(fgets(STDIN));

clearScreen();

echo "\n ------------------";
echo "\n|Celular cadastrado|";
echo "\n ------------------";
echo "\n|Cor: {$celular->getCor()}\n";
echo "|Marca: {$celular->getMarca()}";
echo "|Modelo: {$celular->getModelo()}";
echo "|Quantidade de Memória de Armazenamento: {$celular->getQtdeMemoriaArmazenamento()}\n";
echo "|Quantidade de Memória RAM: {$celular->getQtdeMemoriaRAM()}\n";
echo "|Sistema Operacional: {$celular->getSO()}";

echo "\nLigar o celular? <S/n>\n";

$ligarCelular = fgets(STDIN);
if (strtok($ligarCelular, "\n") == "S") {
    $celular->ligar();
    $celular->showOptionsHome();

    $isTrue = true;
    while ($isTrue) {
        $showOptionsCond = fgets(STDIN);
        if ($showOptionsCond == 1) {
            clearScreen();
            $celular->showOptionsHome();
        }

        if($showOptionsCond == 2){
            clearScreen();
            $celular->showOptionsContatos();
            $contatosOptions = fgets(STDIN);
            if($contatosOptions == 1){
                clearScreen();
                echo "Nome do Contato: ";
                $nomeContato = fgets(STDIN);
                echo "Número do Contato: ";
                $numContato = fgets(STDIN);

                $contatoAux = array("id" => $contato->id, "nome"=>strtok($nomeContato, "\n"), "numero"=>strtok($numContato, "\n"));
                $contato->addContato($contatoAux);
                $contato->id += 1;
                $celular->showOptionsHome();
            }
            
            if($contatosOptions == 2){
                echo $contato->getContato();
                echo "\n";
                $celular->showOptionsHome();
            }

            if($contatosOptions == 3){
                echo "ID do Contato: ";
                $idContato = fgets(STDIN);
                if(array_key_exists(intval($idContato), $contato->getContatoArray())){
                    echo "Contato Selecionado: ";
                    echo $contato->selectNomeContato(intval($idContato));
                    echo "\n";
                    echo "Número: ";
                    echo $contato->selectNumeroContato(intval($idContato));
                    echo "\n";
                    $celular->showOptionsHome();
                }
                else {
                    echo "Contato não existe!";
                    $celular->showOptionsHome();
                }
            }
        }

        if($showOptionsCond == 3){
            echo "Digite sua mensagem: ";
            $msg = fgets(STDIN);
            echo "Digite o ID do usuário para quem quer enviar: ";
            $idDestinatario = fgets(STDIN);
            if(array_key_exists(intval($idDestinatario), $contato->getContatoArray())){
                $contato->enviarMensagem(strtok($idDestinatario, "\n"), strtok($msg, "\n"));
                $celular->showOptionsHome();
            }
            else {
                echo "Você não tem esse contato adicionado.";
                $celular->showOptionsHome();
            }
        }
    }
} else {
    echo "O celular não será ligado.\n";
}
?>