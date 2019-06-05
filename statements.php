<?php
session_start();
require_once('functions_main.php');

if(!isset($_SESSION['userVerified'])){
	header('location:index.php');
	exit();
}
$view=$_GET['view'];

if($view=='cm'){
 $sqlQuery=$db->query("Select * from income where idUser = {$_SESSION['idUser']} ");
}
$incomes=$sqlQuery->fetchAll();

topPage();
displayMainMenu();
/************************************/
?>
<main>
<article>
<h4>Welcome to Finance Assitant: <?= $_SESSION['userVerified']?></h4>
<hr class="mb-5">
<div id="mainPage" class="container">
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
			 <th><a href=\"#\" title=\"Edit&Remove\" data-toggle=\"modal\" data-target=\"#editTransaction\"><i class='fas fa-edit'></i></a></th>
			</tr>";
		}
	   ?>
	  </tbody>
  </table>
 </div>
</div>
</article>
</main>	
<?php
/************************************/
bottomPage();

?>