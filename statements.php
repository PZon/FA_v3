<?php
session_start();
require_once('functions_main.php');

verifyUser();

$view=$_GET['view'];

$currentYear=date('Y');
$currentMonth=date('m');
$prevMonth=date('m')-1;
$currentYM=$currentYear.'-'.$currentMonth.'-01';
$prevYM=$currentYear.'-'.$prevMonth.'-01';
$prevYMEnd=$currentYear.'-'.$prevMonth.'-31';

if($view=='cm'||($view=='cp' && !isset($_POST['dateFrom']))){
 $incomes=getIncomesCM($_DB, $currentYM);
 $expenses=getExpensesCM($_DB, $currentYM);
}else if($view=='pm'){
 $incomes=getIncomesPM($_DB, $prevYM, $prevYMEnd);
 $expenses=getExpensesPM($_DB, $prevYM, $prevYMEnd);
}else if($view=='cp' && isset($_POST['dateFrom'])){
 $dateFrom=$_POST['dateFrom'];
 $dateTo=$_POST['dateTo'];
 $incomes=getIncomesCP($_DB, $dateFrom, $dateTo);
 $expenses=getExpensesCP($_DB, $dateFrom, $dateTo);
}

topPage();
displayMainMenu();
/************************************/
?>
<main>
<div id="mainPage" class="container">
 <div class="row mb-5">
   <div class="col-sm-12 col-md-8">
    <h5>Welcome to Finance Assitant: <br /><?= $_SESSION['userVerified']?></h5>
   </div>
   <div class="col-sm-12 col-md-4">
    <div class="dropdown">
	  <button class="btn btn-warning dropdown-toggle" type="button" id="menuStatement" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fas fa-chart-line'></i> Statements</button>
	  <div class="dropdown-menu" aria-labelledby="menuStatement">
	   <a class="dropdown-item" href="statements.php?view=cm">&#9656; Current Month</a>
	   <a class="dropdown-item" href="statements.php?view=pm">&#9656; Previous Month</a>
	   <a class="dropdown-item" href="statements.php?view=cp">&#9656; Custom Period</a>
	  </div>
    </div>
   </div>
  </div>
<?php
	if($view=='cp'){
		displayStatementDatepicker();
	}
?>
<hr>
  <div class="row">
	<table class="table table-hover table-bordered">
	  <thead>
		<tr class="bg-success">
		  <th class="tbStyle" colspan="5">INCOMES</th>
		</tr>
		<tr class="bg-dark">
		  <th scope="col">Date</th>
		  <th scope="col">Amount</th>
		  <th scope="col">Category</th>
		  <th scope="col">Description</th>
		  <th scope="col">Options</th>
		</tr>
	  </thead>
	  <tbody>
	   <?php
		foreach($incomes as $row){
			echo"<tr>
			 <td>{$row['incomeDate']}</td>
			 <td>{$row['incomeAmount']}</td>
			 <td>{$row['nameCatI']}</td>
			 <td>{$row['incomeDescr']}</td>
			 <th>";
			 echo editTransactionIcon()."</th>
			</tr>";
		}
	   ?>
	  </tbody>
  </table>
 </div>
 <div class="row">
	<table class="table table-hover table-bordered">
	  <thead >
	  <tr class="bg-danger">
		  <th class="tbStyle" colspan="6">EXPENSES</th>
	  </tr>
		<tr class="bg-dark" >
		  <th scope="col">Date</th>
		  <th scope="col">Amount</th>
		  <th scope="col">Category</th>
		  <th scope="col">Description</th>
		  <th scope="col">Payment type</th>
		  <th scope="col">Options</th>
		</tr>
	  </thead>
	  <tbody>
	   <?php
		foreach($expenses as $row){
			echo"<tr>
			 <td>{$row['expenseDate']}</td>
			 <td>{$row['expenseAmount']}</td>
			 <td>{$row['nameCatE']}</td>
			 <td>{$row['expenseDescr']}</td>
			 <td>{$row['nameCatPay']}</td>
			 <th>";
			 echo editTransactionIcon();"</th>
			</tr>";
		}
	   ?>
	  </tbody>
  </table>
 </div>
<?php displayTransactionButtons($_DB) ?>  
</div>
</article>
</main>	
<?php
/************************************/
bottomPage();
?>