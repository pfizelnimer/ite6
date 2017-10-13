<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['cusregister_btn']))
{
    $cususername=mysqli_real_escape_string($db, $_POST['cususername']);
    $cusemail=mysqli_real_escape_string($_POST['cusemail']);
    $cuspassword=mysqli_real_escape_string($_POST['cuspassword']);
    $cuspassword2=mysqli_real_escape_string($_POST['cuspassword2']);  
     if($cuspassword==$cuspassword2)
     {           //Create User
            $cuspassword=md5($cuspassword); //hash password before storing for security purposes
            $sql="INSERT INTO customer(username,email,password) VALUES('$cususername','$cusemail','$cuspassword')";
            mysqli_query($db,$sql);  
            $_SESSION['message']="You are now logged in"; 
            $_SESSION['username']=$cususername;
            header("location:customer.php");  //redirect home page
    }
    else
    {
      $_SESSION['message']="The two password do not match";   
     }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign up as Customer</title>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="header">
    <h1>Sign up as Customer</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<form method="post" action="regcustomer.php">
  <table>
     <tr>
           <td>Username : </td>
           <td><input type="text" name="cususername" class="textInput"></td>
     </tr>
     <tr>
           <td>Email : </td>
           <td><input type="email" name="cusemail" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="cuspassword" class="textInput"></td>
     </tr>
      <tr>
           <td>Confirm Password: </td>
           <td><input type="password" name="cuspassword2" class="textInput"></td>
     </tr>
      <tr>
           <td><a href="index.php"><button type="button" value="Cancel">Cancel</button></a></td>
           <td><input type="submit" name="cusregister_btn" class="Register"></td>
     </tr>
  
</table>
<br />
<table>
  <tr>
           <td><a href="regadmin.php"><button type="button" value="adminsign">Admin Sign Up</button></a></td>
           
  </tr>
  <tr>
           <td><a href="regcustomer.php"><button type="button" value="cussign">Customer Sign Up</button></a></td>
           
  </tr>

</table>
</form>
</body>
</html>