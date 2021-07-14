
<?php $title = 'My customers'; ?>

<?php ob_start(); ?>

  <!-- <meta http-equiv="refresh" content="10">-->

  <script type="text/javascript">
    
//function à appeler sur le onclick : 

function envoiId(clicked_id) {
  var theForm, newInput1;
  // Start by creating a <form>
  theForm = document.createElement('form');
  theForm.action = 'index.php?action=consultOneUser_View'; // on récupére la valeur du lien de la balise <a>
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
        <h1 class="h2">Customers list</h1>
      </div>

      <div class="table-responsive tabTicket">
        <table class="table table-striped table-sm">
          
          <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>E-mail</th>
              <th>Type</th>
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
            while($data = $req->fetch()){
                switch($data['status']){
                  case 0:
                    $status="Admin";
                    break;
                  case 1:
                    $status="Client";
                    break;
                  case 2:
                    $status="Report";
                    break;
                }
              ?>
            <tr>
                <!--La variable action ne passe pas lorsque l'on fait passé deux variables (idT)-->
                <td><button class="lienTab btn btn-success" id="<?php echo $data['idUtilisateur'];?>" onclick="envoiId(this.id)"><?php echo $data['idUtilisateur'];?></button></td>
                <td><?php echo $data['nomUtilisateur'];?></td>
                <td><?php echo $data['prenomUtilisateur'];?></td>
                <td><?php echo $data['emailUtilisateur'];?></td>
                <td><?php echo $status;?></td>
            <tr></a>
            <?php }} ?>           
          </tbody>

        </table>
      </div>
    </main>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>