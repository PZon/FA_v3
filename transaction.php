<?php
session_start();
require_once('functions_main.php');
verifyUser();

$transactionType=$_GET['type'];

/*$sqlQueryI=$db->query("select idCatI, nameCatI from in_cat UNION select idUserCatIn, nameUserCatIn from user_in_cat WHERE idUser={$_SESSION['idUser']}");
$catI=$sqlQueryI->fetchAll();*/

/*$sqlQueryE=$db->query("select idCatE, nameCatE from ex_cat UNION select idUserCatEx, nameUserCatEx from user_ex_cat WHERE idUser={$_SESSION['idUser']}");
$catE=$sqlQueryE->fetchAll();*/



topPage();
displayMainMenu();

if($transactionType=='I'){
	displayAddIncomeForm(getIncomCat($db));
}else if($transactionType=='E'){
	displayAddExpenseForm(getExpenseCat($db), getPayCat($db));
}

bottomPage();
?>