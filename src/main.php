<?php
require_once(__DIR__ . '/Celular.php');
require_once(__DIR__ . '/clearScreen.php');
require_once(__DIR__ . '/Contato.php');

$celular = new Celular();
$contato = new Contato();

clearScreen();
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
    }
} else {
    echo "O celular não será ligado.";
}
?>