
<?php $title = 'Creer un ticket'; ?>

<?php ob_start(); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create a new ticket</h1>
      </div>

      <form class="form-signin" method="post" action="index.php?action=createTicketInProject">
        
        
      <label for="inputName" class="ticket-label" id="title-ticket">Project ID</label>
       
        <input type="hidden" name='inputNumberProject' value="<?php  echo (int)$numProject ?>">
        <input type="text" name="inputNumProject" class="form-control" placeholder="<?php  echo (int)$numProject ?>" disabled>

        <label for="inputName" class="ticket-label">Title</label>
        <input type="text" name="inputTitleTicket" class="form-control" placeholder="Title" required autofocus>

        <label for="inputName" class="ticket-label">Client ID</label>
        <input type="hidden"  name="inputClientNumber" class="form-control" value="<?php  echo (int)$numClient ?>" required autofocus>
        <input type="text"  name="inputClientNum" class="form-control" placeholder="<?php  echo (int)$numClient ?>" disabled>

        
        <div  id="divDescriptionQuestion">
        <h3>Description : </h3>
        <textarea name="inputDescriptionTicket" class="form-control" required autofocus> </textarea> 
        </div>

        <label for="inputName" class="ticket-label">Type</label>
        <select name="ticketDomain" class="form-control">
              <option value="network">Network</option>
              <option value="office">Office</option>
              <option value="development">Development</option>
        </select>
        
        <label for="inputName" class="ticket-label">State</label>
        <select name="ticketStatus"  class="form-control">
              <option value="notStarted">Not started</option>
              <option value="currently">Currently</option>
              <option value="finish">Finish</option>
              <option value="attrAndNotStarted">Attribuate and not started</option>
        </select>



        <button id="btnSaveTicket" class="btn btn-lg btn-primary btn-block" type="submit">Save ticket</button>
        
      </form>

    </main>

 <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>