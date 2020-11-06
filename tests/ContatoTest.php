<?php
use PHPUnit\Framework\TestCase;
require_once(getcwd() . "/src/Contato.php");

final class ContatoTest extends TestCase
{
    public function testAddContato()
    {
        $contato = new Contato();
        $this->assertEquals(0, intval(count($contato->getContatoArray())));
        $array = array("nome" => "Teste", "numero" => "(00)00000-0000");
        $contato->addContato($array);
        $this->assertEquals(1, intval(count($contato->getContatoArray())));
    }

    public function testDeleteContato()
    {
        $contato = new Contato();
        $this->assertEquals(0, intval(count($contato->getContatoArray())));
        $array = array("nome" => "Teste", "numero" => "(00)00000-0000");
        $contato->addContato($array);
        $this->assertEquals(1, intval(count($contato->getContatoArray())));
        $contato->deletarContato(0);
        $this->assertEquals(0, intval(count($contato->getContatoArray())));
    }
}
?>