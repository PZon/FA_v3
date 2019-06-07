<?php
require_once('functions_main.php');

function verifyUser(){
	if(!isset($_SESSION['userVerified'])){
		header('location:index.php');
		exit();
	}
}

function getIncomCat($db){
	$sqlQueryI=$db->query("select idCatI, nameCatI from in_cat UNION select idUserCatIn, nameUserCatIn from user_in_cat WHERE idUser={$_SESSION['idUser']}");
	$catI=$sqlQueryI->fetchAll();
	return $catI;
}

function getExpenseCat($db){
	$sqlQueryE=$db->query("select idCatE, nameCatE from ex_cat UNION select idUserCatEx, nameUserCatEx from user_ex_cat WHERE idUser={$_SESSION['idUser']}");
	$catE=$sqlQueryE->fetchAll();
	return $catE;
}

function getPayCat($db){
	$sqlQueryP=$db->query("select idCatPay, nameCatPay from pay_cat UNION select idUserCatPay, nameUserCatPay from user_pay_cat WHERE idUser={$_SESSION['idUser']}");
	$catP=$sqlQueryP->fetchAll();
	return $catP;
}

