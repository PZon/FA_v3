<?php
session_start();
require_once('functions_main.php');

if(!isset($_SESSION['userVerified'])){
	header('location:index.php');
	exit();
}
$view=$_GET['view'];

$currentYear=date('Y');
$currentMonth=date('m');
$prevMonth=date('m')-1;
$currentYM=$currentYear.'-'.$currentMonth.'-01';
$prevYM=$currentYear.'-'.$prevMonth.'-01';
$prevYMEnd=$currentYear.'-'.$prevMonth.'-31';

if($view=='cm'){
 $sqlQuery=$db->query("Select * from income where idUser = {$_SESSION['idUser']} and incomeDate >= '$currentYM'");
}else if($view=='pm'){
 $sqlQuery=$db->query("Select * from income where idUser = {$_SESSION['idUser']} and incomeDate BETWEEN '$prevYM' AND '$prevYMEnd'");	
}else if($view=='cp'){
	//?????
}
$incomes=$sqlQuery->fetchAll();

topPage();
displayMainMenu();
/************************************/
?>
<main>
<div id="mainPage" class="container">
 <div class="row mb-5">
   <div class="col-sm-12 col-md-7">
    <h5>Welcome to Finance Assitant: <?= $_SESSION['userVerified']?></h5>
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

<hr>
  <div class="row">
	<table class="table table-hover table-bordered">
	  <thead class="bg-dark">
		<tr>
		  <th scope="col">Id</th>
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
			 <td>{$row['idIncome']}</td>
			 <td>{$row['incomeDate']}</td>
			 <td>{$row['incomeAmount']}</td>
			 <td>{$row['idUserCatIn']}</td>
			 <td>{$row['incomeDescr']}</td>
			 <th>";
			 echo editTransactionIcon()."</th>
			</tr>";
		}
	   ?>
	  </tbody>
  </table>
 </div>
<?php displayTransactionButtons() ?>  
</div>
</article>
</main>	
<?php
/************************************/
bottomPage();
?>