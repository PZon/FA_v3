<?php
require_once('functions_main.php');
session_start();

	if(isset($_POST['nick'])){
	 $nick=filter_input(INPUT_POST,'nick',FILTER_SANITIZE_STRING);
	 $nick=strtoupper($nick);
	 $pass=filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING);
	 
	 $query=$db->prepare('select * from users where Nick = :nick');
	 $query->bindValue(':nick', $nick, PDO::PARAM_STR);
	 $query->execute();
	 
	 //echo $query->rowCount();
	 $user=$query->fetch();
	 if($user && password_verify($pass, $user['Password'])){
	  $_SESSION['userVerified']=$user['Nick'];
	  $_SESSION['idUser']=$user['idUser'];
	  unset($_SESSION['logInError']);
	  header('Location:statements.php?view=cm');
	 }else{
		 $_SESSION['logInError']='<small class="text-danger">Incorrect Login or Password. Please try again</small>';
		 header ('Location:index.php');
		 exit();
	 }
	}else{
	 header('Location:index.php');
	 exit();
	}


?>