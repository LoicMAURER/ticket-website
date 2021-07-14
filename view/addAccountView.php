<?php $title = 'Add new account'; ?>

<?php ob_start(); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add new account</h1>
      </div>

      <form class="form-signin" method="post" action="index.php?action=addAccount">
      
      <label for="inputName" class="sidebar-label">Account Type</label>
      <?php
            if($_SESSION["is_type"]=="admin"){
          ?>

          <select name="inputStatus" id="inputStatus" class="form-control">
              <option value="0">admin</option>
              <option value="2">report</option>
              <option value="1">client</option>
          </select>

      <?php } ?>

      <?php
            if($_SESSION["is_type"]=="report"){
          ?>

          <select name="inputStatus" id="inputStatus" class="form-control">
              <option value="2">report</option>
              <option value="1">client</option>
          </select>

      <?php } ?>

      <div class="form-group input">
    		<label for="inputName" class="sidebar-label">Name</label>
    		<input type="text" class="form-control" name="inputName" aria-describedby="emailHelp" placeholder="Enter your new name" maxlength="200" required>
  	  </div>

  	  <div class="form-group input">
    		<label for="inputShortName" class="sidebar-label">Short Name</label>
    		<input type="text" class="form-control" name="inputShortName" aria-describedby="emailHelp" placeholder="Enter your new shortname" maxlength="200" required>
  	  </div>

  	  <div class="form-group input">
    		<label for="inputEmail" class="sidebar-label">Email address</label>
    		<input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter your new email adress" maxlength="200" required>
  	  </div>

      <div class="form-group input">
        <label for="inputPassword" class="sidebar-label">Password</label>
        <input type="password" class="form-control" name="inputPassword" aria-describedby="emailHelp" placeholder="Enter your new password" maxlength="200" required>
      </div>

        <button id="btnSaveModifications" class="btn btn-lg btn-primary btn-block" type="submit">Add account</button>
        
      </form>

    </main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>