
<?php $title = 'Create a ticket'; ?>

<?php ob_start(); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create a new ticket</h1>
      </div>

      <form class="form-signin" method="post" action="index.php?action=createTicket">
        
        
        <label for="inputName" class="ticket-label" id="title-ticket">Title</label>
        <input type="text" name="inputTitleTicket" class="form-control" placeholder="Title" maxlength="50" required autofocus>

        <?php
            if($_SESSION["is_type"]=="admin" || $_SESSION["is_type"]=="report"){
          ?>
            <label for="inputName"  class="ticket-label">Client ID</label>
            <input type="text" name="inputClientNumber" class="form-control" placeholder="Numéro client ; ecrire null si pas de renseignement" required autofocus>

        <?php } ?>
        
        <div  id="divDescriptionQuestion">
        <h3>Description : </h3>
        <textarea name="inputDescriptionTicket" class="form-control" maxlength="500" required autofocus> </textarea> 
        </div>
        
        <label for="inputName" class="ticket-label">Type of ticket</label>
        <select name="ticketDomain" class="form-control">
              <option value="network">Network</option>
              <option value="office">Office</option>
              <option value="development">Development</option>
        </select>
        
        <label for="inputName" class="ticket-label">State</label>
        <select name="ticketStatus" class="form-control">
              <option value="notStarted">Not Started</option>
              <option value="currently">Currently</option>
              <option value="finish">Finish</option>
              <option value="attrAndNotStarted">Attribuate and not started</option>
        </select>

        <button id="btnSaveTicket" class="btn btn-lg btn-primary btn-block" type="submit">Save ticket</button>
        
      </form>

    </main>

 <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>