<?php
require_once('functions_main.php');

function verifyUser(){
 if(!isset($_SESSION['userVerified'])){
  header('location:index.php');
  exit();
 }
}

function getIncomCat($_DB){
 $sqlQueryI=$_DB->query("SELECT idCatI, nameCatI FROM in_cat 
 UNION 
 SELECT idUserCatIn, nameUserCatIn FROM user_in_cat 
 WHERE idUser={$_SESSION['idUser']}");
 $catI=$sqlQueryI->fetchAll();
 return $catI;
}

function getExpenseCat($_DB){
 $sqlQueryE=$_DB->query("SELECT idCatE, nameCatE FROM ex_cat 
 UNION 
 SELECT idUserCatEx, nameUserCatEx FROM user_ex_cat 
 WHERE idUser={$_SESSION['idUser']}");
 $catE=$sqlQueryE->fetchAll();
 return $catE;
}

function getPayCat($_DB){
 $sqlQueryP=$_DB->query("SELECT idCatPay, nameCatPay FROM pay_cat
 UNION 
 SELECT idUserCatPay, nameUserCatPay FROM user_pay_cat 
 WHERE idUser={$_SESSION['idUser']}");
 $catP=$sqlQueryP->fetchAll();
 return $catP;
}

function getIncomesCM($_DB, $currentYM){
 $sqlQueryI=$_DB->query("SELECT i.idIncome, i.idIncomeCat, i.incomeDate, i.incomeAmount, i.incomeDescr, c.nameCatI FROM income i 
 JOIN in_cat c ON (c.idCatI=i.idIncomeCat) 
 WHERE i.idUser={$_SESSION['idUser']} AND i.incomeDate >= '$currentYM'
 UNION
 SELECT i.idIncome, i.idIncomeCat, i.incomeDate, i.incomeAmount, i.incomeDescr, u.nameUserCatIn FROM income i 
 JOIN user_in_cat u ON (u.idUserCatIn=i.idIncomeCat)
 WHERE i.idUser={$_SESSION['idUser']} AND i.incomeDate >= '$currentYM'
 ORDER BY incomeDate");
 $incomes=$sqlQueryI->fetchAll();
 return $incomes;
}

function getExpensesCM($_DB, $currentYM){
 $sqlQueryE=$_DB->query("SELECT e.expenseDate, e.expenseAmount, e.expenseDescr, c.nameCatE, p.nameCatPay FROM expenses e 
 JOIN ex_cat c ON (c.idCatE = e.idExpensesCat) 
 JOIN pay_cat p ON (p.idCatPay = e.userPayMethId) WHERE e.idUser={$_SESSION['idUser']} AND e.expenseDate >= '$currentYM'
 UNION 
 SELECT e.expenseDate, e.expenseAmount, e.expenseDescr, u.nameUserCatEx, a.nameUserCatPay FROM expenses e 
 JOIN user_ex_cat u ON (u.idUserCatEx = e.idExpensesCat) 
 JOIN user_pay_cat a ON (a.idUserCatPay = e.userPayMethId) WHERE e.idUser={$_SESSION['idUser']} AND e.expenseDate >= '$currentYM'
 ORDER BY expenseDate");
 $expenses=$sqlQueryE->fetchAll();
 return $expenses; 
}

function getIncomesPM($_DB, $prevYM, $prevYMEnd){
 $sqlQueryI=$_DB->query("SELECT i.idIncome, i.idIncomeCat, i.incomeDate, i.incomeAmount, i.incomeDescr, c.nameCatI FROM income i 
 JOIN in_cat c ON (c.idCatI=i.idIncomeCat)
 WHERE i.idUser={$_SESSION['idUser']} 
 AND i.incomeDate BETWEEN '$prevYM' AND '$prevYMEnd' 
 UNION
 SELECT i.idIncome, i.idIncomeCat, i.incomeDate, i.incomeAmount, i.incomeDescr, u.nameUserCatIn FROM income i 
 JOIN user_in_cat u ON (u.idUserCatIn=i.idIncomeCat)
 WHERE i.idUser={$_SESSION['idUser']} 
 AND i.incomeDate BETWEEN '$prevYM' AND '$prevYMEnd'ORDER BY incomeDate");
 $incomes=$sqlQueryI->fetchAll();
 return $incomes;
}

function getExpensesPM($_DB, $prevYM, $prevYMEnd){
 $sqlQueryE=$_DB->query("SELECT e.expenseDate, e.expenseAmount, e.expenseDescr, c.nameCatE, p.nameCatPay FROM expenses e 
 JOIN ex_cat c ON (c.idCatE = e.idExpensesCat) 
 JOIN pay_cat p ON (p.idCatPay = e.userPayMethId) WHERE e.idUser={$_SESSION['idUser']} AND
 e.expenseDate BETWEEN '$prevYM' AND '$prevYMEnd'
 UNION 
 SELECT e.expenseDate, e.expenseAmount, e.expenseDescr, u.nameUserCatEx, a.nameUserCatPay FROM expenses e 
 JOIN user_ex_cat u ON (u.idUserCatEx = e.idExpensesCat) 
 JOIN user_pay_cat a ON (a.idUserCatPay = e.userPayMethId) WHERE e.idUser={$_SESSION['idUser']} AND 
 e.expenseDate BETWEEN '$prevYM' AND '$prevYMEnd'ORDER BY expenseDate");
 $expenses=$sqlQueryE->fetchAll();
 return $expenses;
}

function getIncomesCP($_DB, $dateFrom, $dateTo){
 $sqlQueryI=$_DB->query("SELECT i.idIncome, i.idIncomeCat, i.incomeDate, i.incomeAmount, i.incomeDescr, c.nameCatI FROM income i 
 JOIN in_cat c ON (c.idCatI=i.idIncomeCat)
 WHERE i.idUser={$_SESSION['idUser']} 
 AND i.incomeDate BETWEEN '$dateFrom' AND '$dateTo' 
 UNION
 SELECT i.idIncome, i.idIncomeCat, i.incomeDate, i.incomeAmount, i.incomeDescr, u.nameUserCatIn FROM income i 
 JOIN user_in_cat u ON (u.idUserCatIn=i.idIncomeCat)
 WHERE i.idUser={$_SESSION['idUser']} 
 AND i.incomeDate BETWEEN '$dateFrom' AND '$dateTo' ORDER BY incomeDate");
 $incomes=$sqlQueryI->fetchAll();
 return $incomes;
}

function getExpensesCP($_DB, $dateFrom, $dateTo){
 $sqlQueryE=$_DB->query("SELECT e.expenseDate, e.expenseAmount, e.expenseDescr, c.nameCatE, p.nameCatPay FROM expenses e 
 JOIN ex_cat c ON (c.idCatE = e.idExpensesCat) 
 JOIN pay_cat p ON (p.idCatPay = e.userPayMethId) WHERE e.idUser={$_SESSION['idUser']} AND
 e.expenseDate BETWEEN '$dateFrom' AND '$dateTo'
 UNION 
 SELECT e.expenseDate, e.expenseAmount, e.expenseDescr, u.nameUserCatEx, a.nameUserCatPay FROM expenses e 
 JOIN user_ex_cat u ON (u.idUserCatEx = e.idExpensesCat) 
 JOIN user_pay_cat a ON (a.idUserCatPay = e.userPayMethId) WHERE e.idUser={$_SESSION['idUser']} AND 
 e.expenseDate BETWEEN '$dateFrom' AND '$dateTo' ORDER BY expenseDate");
 $expenses=$sqlQueryE->fetchAll();
 return $expenses;
}