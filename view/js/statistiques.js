var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Resolu','Non résolu'],
    datasets: [{
      label: '# of Votes',
        var str = "<?php include_once("../graphique.php"); ?>";

        backgroundColor: [
        'rgba(0, 255, 0, 1)',
        'rgba(255, 0, 0, 1)'
        ]
      }]
    },
});

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
        url: "send.php", 
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
                url: "show.php", 
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