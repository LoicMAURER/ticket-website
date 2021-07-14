<?php $title = 'My Projects'; ?>

<?php ob_start(); ?>

  <script type="text/javascript">
    
    //function à appeler sur le onclick : 
/*
      function envoiId(clicked_id) {
      var theForm, newInput1;
      // Start by creating a <form>
      theForm = document.createElement('form');
      theForm.action = 'index.php?action=consultOneProject'; // on récupére la valeur du lien de la balise <a>
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
*/
    function envoiId(clicked_id, idClient) {
      var theForm, newInput1;
      // Start by creating a <form>
      theForm = document.createElement('form');
      theForm.action = 'index.php?action=consultOneProject'; // on récupére la valeur du lien de la balise <a>
      theForm.method = 'post';
      // Next create the <input>s in the form and give them names and values
      newInput1 = document.createElement('input');
      newInput1.type = 'hidden';
      newInput2 = document.createElement('input');
      newInput2.type = 'hidden';

      var str = clicked_id;
      var str2 = idClient;
      //str = str.substr(2); 
      newInput1.name = 'input_1';
      newInput1.value = str; // contiendra la variable javascript de récupération de chaine

      newInput2.name = 'input_2';
      newInput2.value = str2;

      // Now put everything together...
      theForm.appendChild(newInput1); // ajoute l'input au formulaire (le parent)
      theForm.appendChild(newInput2);
      // ...and it to the DOM...
      document.getElementById(clicked_id).appendChild(theForm);
      //document.getElementById(idClient).appendChild(theForm);
      // ...and submit it
      theForm.submit();
    }

  </script>
    
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> 

     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Projects List</h1>
      </div>
      
      <form class="form-signin" id="form-filter" method="POST" action="index.php?action=myProjects">

        <select id="dateProjet" class="form-control filter-form" name="dateCreation">
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
              <th>Nom</th>
              <th>Description</th>
              <th>Date</th>
              <th>Client</th>
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
                    <td><a class="lienTab btn btn-success" id="<?php echo $data['idProjet'];?>" onclick="envoiId(this.id,<?php echo $data['idClient'] ?>)"><?php echo $data['idProjet'];?></a></td>
                    <td><?php echo $data['nomProjet'];?></td>
                    <td><?php echo $data['description'];?></td>
                    <td><?php echo $data['dateProjet'];?></td>
                    <td><?php echo $data['emailUtilisateur'];?></td>
                <tr>
            <?php }} ?>
          </tbody>

        </table>
      </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>






