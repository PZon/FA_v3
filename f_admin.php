<?php
function verifyUser(){
	if(!isset($_SESSION['userVerified'])){
		header('location:index.php');
		exit();
	}
}
