
<?php session_start();
include 'db.php'; ?>
<?php

$_SESSION['logged_in']=false;
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];


$query = "SELECT login_pswd,login_uname FROM a3login WHERE login_pswd='$password' AND login_uname='$username'";

$query2 = "SELECT a3users.users_fname,a3users.users_lname FROM a3users INNER JOIN a3login ON a3users.users_id = a3login.login_user_id WHERE a3login.login_uname='$username'";



$result = $conn->query($query);
$_SESSION['loginFailed']=false;


if ($result->num_rows == 1) {

   $_SESSION['logged_in']=true;
   
   $result2 = $conn->query($query2);

   while ($row = $result2->fetch_assoc()) {
		$fname = $row['users_fname'];
		$lname = $row['users_lname'];
		
   }
   echo $fname;
   $_SESSION["logged_in_name"]=$fname.' '.$lname;
   header("Location: ../index.php");
}else{

  $_SESSION['logged_in']=false;
   $_SESSION['loginFailed']=true;
  header("Location: ../loginPage.php");
  


}







?>