<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['login_btn']))
{
    $username=mysqli_real_escape_string($db, $_POST['username']);
    $password=mysqli_real_escape_string($_POST['password']);
    $password=md5($password); //Remember we hashed password before storing last time
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $sql="SELECT * FROM admin WHERE adusername='$username' AND adpassword='$password'";
    $sql="SELECT * FROM customer WHERE cususername='$username' AND cuspassword='$password'";
    $result=mysqli_query($db, $sql);
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['username']=$username;
        header("location:client.php");
    }
    if(mysqli_num_rows($result)==2)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['adusername']=$adusername;
        header("location:admin.php");
    }
    if(mysqli_num_rows($result)==3)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['cususername']=$cususername;
        header("location:client.php");
    }
   else
   {
                $_SESSION['message']="Username and Password combiation incorrect";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Account</title>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="header">
    <h1>Log in</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<form method="post" action="login.php">
  <table>
     <tr>
           <td>Username : </td>
           <td><input type="text" name="username" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td><a href="index.php"><button type="button" value="Cancel">Cancel</button></a></td>
           <td><input type="submit" name="login_btn" class="Log In"></td>
     </tr>
     <tr>
           <td></td>
           <td></td>
     </tr>
      <tr>
           <td>Don't Have Account?</td>
           <td></td>
     </tr>
      <tr>
           <td>Register <a href="register.php">Here</a></td>
           <td></td>
     </tr>
  
</table>
</form>
</body>
</html>