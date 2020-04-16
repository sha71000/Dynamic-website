<?php 
     session_start();
	require 'includes/db.php';
	require 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo getWebsiteName(); ?></title>
		<meta charset="utf-8">
		<!-- Bootstrap core CSS -->
		<!-- Used from https://www.getbootstrap.com, 29 January 2019 -->
		<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

		<!-- Custom CSS styles -->
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>

		<header>
			<div class="container">
				<nav class="navbar navbar-dark bg-dark">
					<a class="navbar-brand" href="index.php"><?php echo getWebsiteName(); ?></a>
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="theforce.php">The Force</span></a>
						</li>
					</ul>
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="loginPage.php">Login</span></a>
						</li>
					</ul>
					</ul>
				</nav>


					<!-- jQuery and Bootstrap JavaScript links -->
					<!-- Used from https://www.getbootstrap.com, 29 January 2019 -->
					<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
					<script src="js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
			</div>

			<div class="container">
				<div class="jumbotron">
					<h1 class="display-3 text-center">Login</h1>
				</div>
			</div>
		</header>
		<main>
			<div id="login">

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="includes/login.php" method="post">
                            
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">

                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Log in" >
                            </div>
                            
                        </form>
                    </div>
                    <?php 
                  if($_SESSION['loginFailed']){
                  	echo '<p style="color:red;">Login credentials are wrong.Try again</p>';
                  	$_SESSION['loginFailed']=false;
                  }

                  ?> 
                </div>
               
            </div>
                  
         </div>


		</main>


<?php include 'includes/footer.php'; ?>


