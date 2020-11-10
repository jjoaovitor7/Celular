<?php
require_once('./src/Request.php');

function cadastrarCelular($celular)
{
    $request = new Request();

    echo "---Cadastro de Celular\n";
    $request->requestCor($celular);
    $request->requestMarca($celular);
    $request->requestModelo($celular);
    $request->requestQuantidadeMemoriaArmazenamento($celular);
    $request->requestQuantidadeMemoriaRAM($celular);
    $request->requestSO($celular);
    clearScreen();
    
    $celular->infoCelularCadastrado();
    $celular->getInfo($celular);
        
}