<?php include  "./autoloader.php"; ?>

<?php
session_start();
if(isset($_POST['login'])){
  $val = new ValidationLogin($_POST);
  $errors =  $val->validateLogin();

}else if(isset($_POST['logout'])){
  $logout = new Logout;
  $logout->userLogout();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Cache-control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  ?></title>
  <link href="./assets/style/style.css" rel="stylesheet">

</head>
<body>
  <div class="nav">
    <a class="active" href="#home">Home</a>
    <a href="./templets/about.php">About</a>
    <a href="#contact">Tutorials</a>

    <?php if(isset($_SESSION['_id'])){ ?>

      <div class="logout-container"> </div>
        <form action="#" method="POST">
          <button class="logout" type="submit" name="logout" style="float:right; 
          margin-top:8px; padding: 6px 10px; background-color:#F5F5F5; color: black; 
          cursor: pointer; border: none; margin-right: 16px; font-size:16px;">Logout</button> 
        <form>
      </div>
  </div>
    <?php }else{?>
    <div class="login-container">
    <form action="#" method="POST">
      <input type="email" placeholder="E-mail" name="email" 
      value="<?php echo htmlspecialchars($_POST['email']) ?? ''; ?>">

      <input type="password" placeholder="Password" name="psw">
      <button type="submit" name="login">Login</button> 
      <a href="#Singup">Creaza cont</a>
      <a href="#Singup">Am uitat parola</a>
    </form>
    </div>
    <?php } ?>
  </div>
