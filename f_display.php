<?php
require_once('functions_main.php');

function topPage(){
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Finance Assistant">
	<meta name="keywords" content="finance, income, expense, budget, money">
	<title>Finance Assistant</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link rel="shortcut icon" href="img/favicon.ico"/>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/swanky-purse/jquery-ui.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/boot_style.css" media=" screen, print" type="text/css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"/>
	<link href="https://fonts.googleapis.com/css?family=Diplomata+SC" rel="stylesheet"/>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script	src="js/boot_scripts.js"></script>
	
	<script>
		jQuery(function($){
		//1h15min odc4 HTML
			$.scrollTo(0);
			$('.scrollUp').click(function(){$.scrollTo($('body'),700);});
			}
		);
		
		$(window).scroll(function(){
				if($(this).scrollTop()>170) $('.scrollUp').fadeIn();
				else $('.scrollUp').fadeOut();	
			}	
		);
	</script>
</head>

<body>
<div class="container">
   <header>
	<div id="top" class="row">
		<div id="logo" class="d-none d-md-inline-block col-md-4 col-lg-2">
		 <a href="index.php" title="Main page"><i class="fas fa-donate"></i></a>
		</div>
		<div id="logo_sm" class="d-xs-block d-md-none col-sm-12">
		 <a href="index.php" title="Main page"><i class="fas fa-donate"></i></a>
		</div>
		<div id="logoTxt" class="d-none d-md-inline-block col-md-8 col-lg-6">
			Finance<br />Assistant
		</div>
		<div id="watch" class="d-none d-lg-inline-block col-lg-4"></div>
	 </div>
   </header>
</div>

<?php
}

function displayCarousel(){
?>
<!-- Carousel -->
  <div id="myCarousel" class="carousel slide mb-3 d-none d-md-block" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="7000">
	  <img src="img/money_1.jpg" class="d-block w-100" alt="image1">
        <div class="container">
          <div class="carousel-caption text-left">
            <h2>The budget is not just a collection of numbers, but an expression of our values and aspirations.</h2>
			<p>Jack Lew</p>
          </div>
        </div>
      </div>
      <div class="carousel-item" data-interval="7000">
	  <img src="img/money_2.jpg" class="d-block w-100" alt="image2">
        <div class="container">
          <div class="carousel-caption">
            <h2>When you're dressing on a budget, simplicity is key.</h2>
			<p>Ne-Yo</p>
          </div>
        </div>
      </div>
      <div class="carousel-item" data-interval="7000">
	  <img src="img/money_3.jpg" class="d-block w-100" alt="image3">
        <div class="container">
          <div class="carousel-caption text-right">
            <h2>A budget tells us what we can't afford, but it doesn't keep us from buying it.</h2>
            <p>William Feather</p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<!-- end carousel -->


<?php
}

function displayRegisterForm(){
?>
<h4>*If you have not account, please register here: 
    <a href="#" title="Register Form" data-toggle="modal" data-target="#registerModal">Register Form</a></h4>
<!--- Register MODAL -->
	<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="registerModalLabel">Register Form:</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form action="registerVeryfication.php" method="post">
			  <div class="form-group">
				<label for="nick" class="col-form-label">*Login:</label>
				<input type="text" class="form-control" id="nick" name="nick"required>
			  </div>
			  <div class="form-group">
				<label for="email" class="col-form-label">*Email:</label>
				<input type="email" class="form-control" id="email" name="email" required>
			  </div>
			  <div class="form-group">
				<label for="password1" class="col-form-label">*Password:</label>
				<input type="password" class="form-control" id="password1" name="pass1" placeholder="at least 8 characters with digit/s" required>
			  </div>
			  <div class="form-group">
				<label for="password2" class="col-form-label">*Repeat Password:</label>
				<input type="password" class="form-control" id="password2" name="pass2" required>
				<small id="registerHelp" class="form-text text-warning">Fields with * are required</small>
			  </div>
			  <div class="form-group">
				<div class="g-recaptcha" data-sitekey="6LfvQacUAAAAAAgYlAuiJsXbddEzXAGpUZ02L0No"></div>
			  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-warning">Register</button>
		  </div>
		 </form></div>
		</div>
	  </div>
	</div>
<!--- end modal -->
<?php
}

function displayMainMenu(){
?>
<div id="mainMenu" class="stickyToTop">
<nav class="navbar navbar-light navbar-expand-md mb-md-5 ">
 <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuToggler" aria-controls="menuToggler" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="menuToggler">
	 <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class='fas fa-landmark'></i> Home</a>
	  </li>
	  <li class="nav-item active">
        <a class="nav-link" href="boot_statements.html?view=cm"><i class='fas fa-chart-line'></i> Statements<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class='fas fa-money-bill'></i> Transaction
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
          <a class="dropdown-item" href="b_transaction.html?type=I">&#9656; Add Income</a>
          <a class="dropdown-item" href="b_transaction.html?type=E">&#9656; Add Expense</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class='fas fa-cog'></i> Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
          <a class="dropdown-item" href="b_settings.html?type=account">&#9656; Account</a>
          <a class="dropdown-item" href="b_settings.html?type=trans">&#9656; Transaction</a>
        </div>
      </li>
     </ul>
	 <span class="navbar-text mr-md-5">
     <a href="logOut.php"><i class='fas fa-minus-circle'></i> Log Out</a>
    </span>
	</div>
   </div>
</nav>
</div>
<?php
}

function bottomPage(){
?>
<footer>
 <div class="f_one">
	&copy; <?=date('Y')?> PZon - 1,21 p3
 </div>
</footer>
	
<a class="scrollUp" href="#" title="Scroll Up">
 <i class="fas fa-chevron-circle-up"></i>
</a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script	src="js/scrollTo.js"></script>
<script>
		$(document).ready(function(){
		var NavY=$('#mainMenu').offset().top;
		var stickyNav=function(){
			var ScrollY=$(window).scrollTop();
			
			if(ScrollY>NavY){
				$('#mainMenu').addClass('stickyToTop');
			}else{
				$('#mainMenu').removeClass('stickyToTop');
			}
		};
		stickyNav();
		$(window).scroll(function(){
			stickyNav();
		});
	});
</script>
</body>
</html>	
<?php
}
?>





