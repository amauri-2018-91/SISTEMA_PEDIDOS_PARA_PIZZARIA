<?php

//primeiro vem aqui pra definir ____ SEARCH
//SEGUNDO ai INCLUI autocompletar.class.php  ___para pesquisar o SEARCH no BANCO D


$selecao;

header("Content-Type: text/html; charset=utf-8", true);  //padrao brasil --acentua e ��


//SE EXISTE REQUISICAO

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') 
{
	require_once("../autocompletar.class.php");
	
	//SEARCH � igual ...
	$search = $_POST["autocomplete"];
	
		$selecao = $_POST["selecao"]; //saber se prod e int ou middle fazer filtragem busca no BD



	$autocompletar = new Autocompletar();
	$autocompletar->findData($search, $selecao);
}