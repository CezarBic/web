<?php include "./templets/head.php"?>


  <main>
    <div class="error">
      <h3 style="text-align: center; color:black; font-size: 20px; margin-top:20px;">
      <?php echo $errors['email'] ?? ''; echo $errors['psw'] ?? ''; ?></h3>
    </div>
  </main>

  <?php $a = new Session; if($a->isLoggedIn()){
    include "./templets/about.php";
  } ?>








  <?php include "./templets/footer.php"?>
