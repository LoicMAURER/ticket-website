<?php $title = 'User informations'; ?>

<?php ob_start(); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User informations</h1>
      </div>

      <?php while($data = $req->fetch()){?>
      
      <form class="form-signin" method="post">
       
        <div class="form-group input">
      		<label for="inputName" class="sidebar-label">Name</label>
      		<input type="text" class="form-control" name="inputName" aria-describedby="emailHelp" placeholder="<?php echo $data['nomUtilisateur']; ?>" disabled>
    	  </div>

    	  <div class="form-group input">
      		<label for="inputShortName" class="sidebar-label">Short Name</label>
      		<input type="text" class="form-control" name="inputShortName" aria-describedby="emailHelp" placeholder="<?php echo $data['prenomUtilisateur']; ?>" disabled>
    	  </div>

  	  <div class="form-group input">
    		<label for="inputEmail" class="sidebar-label">Email address</label>
    		<input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp" placeholder="<?php echo  $data['emailUtilisateur']; ?>" disabled>
  	  </div>

      <div class="form-group input">
        <label for="inputPassword" class="sidebar-label">Account type</label>
        <?php
        switch($data['status']){
          case 0 : 
            $type="admin";
            break;
          case 1 : 
            $type="client";
            break;
          case 2 : 
            $type="report";
            break;
        }
        ?>
        <input ttype="text" class="form-control" name="inputType" aria-describedby="emailHelp" placeholder="<?php echo  $type; ?>" disabled>
      </div>
        
      </form>
    <?php } ?>
    </main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>