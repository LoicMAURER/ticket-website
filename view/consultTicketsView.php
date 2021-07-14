
<?php $title = 'My ticket'; ?>

<?php ob_start(); ?>

  <!-- <meta http-equiv="refresh" content="10">-->

  <script type="text/javascript">
    
//function à appeler sur le onclick : 

function envoiId(clicked_id) {
  var theForm, newInput1;
  // Start by creating a <form>
  theForm = document.createElement('form');
  theForm.action = 'index.php?action=consultOneTicket_View'; // on récupére la valeur du lien de la balise <a>
  theForm.method = 'post';
  // Next create the <input>s in the form and give them names and values
  newInput1 = document.createElement('input');
  newInput1.type = 'hidden';
  var str = clicked_id;
  //str = str.substr(2); 
  newInput1.name = 'input_1';
  newInput1.value = str; // contiendra la variable javascript de récupération de chaine
  // Now put everything together...
  theForm.appendChild(newInput1); // ajoute l'input au formulaire (le parent)
  // ...and it to the DOM...
  document.getElementById(clicked_id).appendChild(theForm);
  // ...and submit it
  theForm.submit();
}

  </script>

  </head>
  <body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> 

     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tickets list</h1>
      </div>

      <form class="form-signin" id="form-filter" method="POST" action="index.php?action=myTickets">

        <select id="statusTicket" class="form-control filter-form" name="statusTicket">
                <option value="all">All</option>
                <option value="notStarted">Not started</option>
                <option value="attrAndNotStarted">Attribuate and not started</option>
                <option value="currently">Currently</option>
                <option value="finish">Finish</option>
        </select>

        <select id="dateCreation" class="form-control filter-form" name="dateCreation">
                <option value="all">All</option>
                <option value="today">Today</option>
                <option value="lessThanWeek">Less than a week</option>
                <option value="lessThanMonth">Less than a month</option>
        </select>

        <button id="btnFilter" class="btn btn-primary" type="submit" name="getAllTicket">Filter</button>
      
      </form>
      
      <div class="table-responsive tabTicket">
        <table class="table table-striped table-sm">
          
          <thead>
            <tr>
              <th>ID</th>
              <th>Date Creation</th>
              <th>Titre</th>
              <th>Client</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
          

          <?php 
          $testVide=$req->rowCount();
          if($testVide==0){?>
            <tr>
              <td>NULL</td>
              <td>NULL</td>
              <td>NULL</td>
              <td>NULL</td>
              <td>NULL</td>
            </tr>
          <?php }
          else{
            while($data = $req->fetch()){?>
            <tr>
                <!--La variable action ne passe pas lorsque l'on fait passé deux variables (idT)-->
                <td><button class="lienTab btn btn-success" id="<?php echo $data['idTicket'];?>" onclick="envoiId(this.id)"><?php echo $data['idTicket'];?></button></td>
                <td><?php echo $data['dateCreation'];?></td>
                <td><?php echo $data['titreTicket'];?></td>
                <td><?php echo $data['emailUtilisateur'];?></td>
                <td class="<?php echo $data['etat'];?>"><?php echo $data['etat'];?></td>
            <tr></a>
            <?php }} ?>           
          </tbody>

        </table>
      </div>
    </main>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>