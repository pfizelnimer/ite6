
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
<?php
if (isset($_POST['cusregister_btn'])){
  
  $cususername = $_POST['cususername'];
  $cusemail = $_POST['cusemail'];
  $cuspassword = $_POST['cuspassword'];
  $cuspassword2 = $_POST['cuspassword2'];
  $cususername = md5($cususername);
  $cusemail = md5($cusemail);
  $cuspassword = md5($cuspassword);
  $cuspassword2 = md5($cuspassword2);
  $cusmsg = $cususername . ' : ' . $cusemail . ' : ' . $cuspassword . ' : ' . $cuspassword2;
$cusfp = fopen("file2.txt", "a") or die ("can't open file");
fwrite($cusfp, $cusmsg."\n");
fclose($cusfp);
header("location:customer.php");  //redirect home page
}

?>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
        
    }

?>
</body>
</html>