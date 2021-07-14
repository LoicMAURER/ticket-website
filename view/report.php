<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script type="text/javascript" src="view/js/jquery-3.5.1.min.js" ></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="assets/dist/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <h1>Recherchez un collaborateur</h1>
  <form method="POST" action="">
    <p><input type="text" name="search" id="search"/></p> 
  </form>
  <div id="resultat">
    <ul>

    </ul>
  </div>
  <div id="infos_collaborateur">

  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#search').keyup(function(){
        var search = $(this).val();
        search = $.trim(search);
        if(search == ""){
          $('#resultat ul').hide();
        }
        if(search !== ""){
          $.ajax({
            type: "POST", 
            url: "view/send.php", 
            data: {
              search : $('#search').val()
            },
            async: false,
            success: function(data){
              $('#resultat ul').show();
              $('#resultat ul').html(data);


              $('a').click(function(){

                var lien=$(this).text();
                var tab = lien.split(' ');
                var nom = tab[0];
                var prenom = tab[1];

                $.ajax({
                  type: "POST", 
                  url: "view/show.php", 
                  data: {
                    nom : nom,
                    prenom : prenom
                  },
                  async: false, 
                  success: function(data){
                    $('#resultat ul').hide();
                    $('#infos_collaborateur').html(data);
                      
                  },
                  error:function(xhr, ajaxOptions, thrownError){
                    alert("edit ass error."+"\nstatusText: "+xhr.statusText+"\nthrownError: "+thrownError);
                  }
                });
              });
            },
            error:function(xhr, ajaxOptions, thrownError){
              alert("edit ass error."+"\nstatusText: "+xhr.statusText+"\nthrownError: "+thrownError);
            }
          });
        }
      });
    });
  </script>
</main>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
</main>

<script type="text/javascript">

  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
 
          labels: ['Resolu','Non résolu'],
          datasets: [{
              label: '# of Votes',
              
              <?php include("graphique.php");?>

              backgroundColor: [
                'rgba(0, 255, 0, 1)',
                'rgba(255, 0, 0, 1)'
              ]
          }]
      },
  });
</script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>