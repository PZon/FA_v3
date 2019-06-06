<?php
session_start();
require_once('functions_main.php');
verifyUser();

$transactionType=$_GET['type'];

topPage();
displayMainMenu();

if($transactionType=='I'){
	displayAddIncomeForm();
}else if($transactionType=='E'){
	displayAddExpenseForm();
}

bottomPage();
?>