
<?php if(isset($_SESSION['_id'])){?>  


    <div class="error">
      <h3 style="text-align: center; color:black; font-size: 20px; margin-top:20px;">
      You are logged in!
      </h3>
    </div>

  
<?php }else{ echo "<h3 style='text-align: center; color:black; font-size: 20px; margin-top:20px;'>". "You don't have access!" .'</h3>';}?>