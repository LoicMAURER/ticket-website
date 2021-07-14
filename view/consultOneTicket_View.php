
<?php $title = 'Consult Ticket'; ?>

<?php ob_start(); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <?php 
            $data = $req->fetch(PDO::FETCH_ASSOC); 
        ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Consult Ticket #<?php echo $data['idTicket'];?></h1>
      </div>

        

      <form class="form-signin" method="post" action="index.php?action=modifyTicket">
        
        <input type="hidden" id="idTicket" name="idTicket" value="<?php echo $data['idTicket'];?>">

        <label class="sr-only"></label>
        <input type="text" name="inputTitleTicket" class="form-control" value="<?php echo $data['titreTicket'];?>" required>

        
        <div  id="divDescriptionQuestion">
        <h3>Description : </h3>
        <textarea name="inputDescriptionTicket" class="form-control" required autofocus><?php echo $data['description'];?></textarea> 
        </div>
        <select name="ticketStatus" id="ticketStatus" class="form-control">
        <?php 
        switch($data['etat']){
            case "notStarted":
                ?> <option value="notStarted" selected>not started</option>
                    <option value="currently">currently</option>
              <option value="finish">Finish</option>
              <option value="attrAndNotStarted">Attribuate and not started</option><?php
              break;
            case "notStarted":
              ?> <option value="currently" selected>currently</option><?php
              break;
            case "notStarted":
              ?> <option value="finish" selected>finish</option><?php
              break;
            case "notStarted":
              ?> <option value="attrAndNotStarted" selected>Attribuate and not started</option><?php
              break;
        }
         ?>
              <option value="notStarted">not started</option>
              <option value="currently">currently</option>
              <option value="finish">Finish</option>
              <option value="attrAndNotStarted">Attribuate and not started</option>
        </select>


        <button id="btnSaveTicket" class="btn btn-lg btn-primary btn-block" type="submit">Modify Ticket</button>
        
      </form>

    </main>

 <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>