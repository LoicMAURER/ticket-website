<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
    
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> 

     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Home page</h1>
      </div>
      
       <div class="album py-5">
    <div class="container">

      <div class="row">
        <div class="col-md-6">
          <div class="card mb-2">
            
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
              <rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">"<?php echo $req['countTicket'] ?>" Tickets</text>
            </svg>

            <div class="card-body">
              <p class="card-text">This is the total number off ticket saved in the application</p>
              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="index.php?action=myTickets"><button type="button" class="btn btn-sm btn-outline-secondary">See all tickets</button></a>
                </div>
              </div>
            
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card mb-2">
            
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
              <rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">"<?php echo $req['countProject'] ?>" Projects</text>
            </svg>
            
            <div class="card-body">
              <p class="card-text">This is the total number off projects saved in the application</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="index.php?action=myProjects"><button type="button" class="btn btn-sm btn-outline-secondary">See all projects</button></a>
                </div>
              </div>
            </div>
          
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>






