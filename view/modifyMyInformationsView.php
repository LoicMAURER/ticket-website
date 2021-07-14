<?php $title = 'Modify my informations'; ?>

<?php ob_start(); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modify my informations</h1>
      </div>

      <form class="form-signin" method="post" action="index.php?action=modifyInformations">
        
      <div class="form-group input">
    		<label for="inputName" class="sidebar-label">Name</label>
    		<input type="text" class="form-control" name="inputName" aria-describedby="emailHelp" placeholder="<?php echo $_SESSION['is_name']; ?>" disabled>
  	  </div>

  	  <div class="form-group input">
    		<label for="inputShortName" class="sidebar-label">Short Name</label>
    		<input type="text" class="form-control" name="inputShortName" aria-describedby="emailHelp" placeholder="<?php echo $_SESSION['is_short_name']; ?>" disabled>
  	  </div>

  	  <div class="form-group input">
    		<label for="inputEmail" class="sidebar-label">Email address</label>
    		<input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp" placeholder="<?php echo $_SESSION['is_mail']; ?>" required>
  	  </div>

      <div class="form-group input">
        <label for="inputPassword" class="sidebar-label">Password</label>
        <input type="password" class="form-control" name="inputPassword" aria-describedby="emailHelp" placeholder="Enter your new password" required>
      </div>
        

        <button id="btnSaveModifications" class="btn btn-lg btn-primary btn-block" type="submit">Save modifications</button>
        
      </form>

    </main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>