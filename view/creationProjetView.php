
<?php $title = 'Create a project'; ?>

<?php ob_start(); ?>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create a new project</h1>
      </div>

      <form class="form-signin" method="post" action="index.php?action=createProject">
        
        
        <label for="inputName" class="ticket-label" id="title-ticket">Title</label>
        <input type="text" id="inputTitleProjet" name="inputTitleProjet" class="form-control" placeholder="Title" maxlength="200" required autofocus>

        <?php
            if($_SESSION["is_type"]=="admin" || $_SESSION["is_type"]=="report"){
          ?>
            <label for="inputName"  class="ticket-label">Client ID</label>
            <input type="text" name="inputClientNumber" class="form-control" placeholder="Numéro client ; ecrire null si pas de renseignement" required autofocus>

        <?php } ?>

        <div  id="divDescriptionQuestion">
        <h3>Description : </h3>
        <textarea name="inputDescriptionProjet" class="form-control" maxlength="500"> </textarea> 
        </div>  

        <button id="btnSaveProjet" class="btn btn-lg btn-primary btn-block" type="submit">Save project</button>
       
      </form>

    </main>
 
 <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>