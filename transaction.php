<?php
session_start();
require_once('functions_main.php');
verifyUser();

$transactionType=$_GET['type'];


topPage();
displayMainMenu();

if($transactionType=='I'){
	displayAddIncomeForm(getIncomCat($_DB));
}else if($transactionType=='E'){
	displayAddExpenseForm(getExpenseCat($_DB), getPayCat($_DB));
}

bottomPage();
?>