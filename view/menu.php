<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v4.0.1">

  </head>

  <body>
    
    <nav id="navBarTop" class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
        
      <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="index.php?action=accueil">Ticket Manager</a>
      
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" id="signOutMenu" href="index.php?action=destroySession">Sign out</a>
        </li>
      </ul>

    </nav>




<!-- MENU PARTIE 1 -->
<div class="container-fluid">
  <div class="row">

    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      
      <div class="sidebar-sticky pt-3" id="sideBarNav">
        
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span class="titleMenu">CONSULT</span>
        </h6>

        <ul class="nav flex-column">
         </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=myProjects">
              <span data-feather="file"></span>
              My projects
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=myTickets">
              <span data-feather="shopping-cart"></span>
              My tickets
            </a>
          </li>

          <?php
            if($_SESSION["is_type"]=="admin" || $_SESSION["is_type"]=="report"){
          ?>

              <li class="nav-item">
                <a class="nav-link" href="index.php?action=myCustomers">
                  <span data-feather="users"></span>
                  My customers
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="index.php?action=reports">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>

      <?php } ?>
               
        </ul>

<!-- MENU PARTIE 2 -->

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span class="titleMenu">ACTIONS</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=form_createTicket">
              <span data-feather="file-text"></span>
              Create a ticket
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=form_createProject">
              <span data-feather="file-text"></span>
              Create a project
            </a>
          </li>

          <?php
            if($_SESSION["is_type"]=="admin" || $_SESSION["is_type"]=="report"){
          ?>

              <li class="nav-item">
                <a class="nav-link" href="index.php?action=form_addAccount">
                  <span data-feather="users"></span>
                  Create Account
                </a>
              </li>

          <?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="index.php?action=form_modifyInformations">
              <span data-feather="file-text"></span>
              Modify my informations
            </a>
          </li>
        </ul>


        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span class="titleMenu">INFORMATIONS</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=myInformations">
              <span data-feather="file-text"></span>
              My informations
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=aboutTicketManager">
              <span data-feather="file-text"></span>
              About Ticket Manager
            </a>
          </li>
        </ul>

      </div>
    </nav>
    </div>
  </div>
</html>
