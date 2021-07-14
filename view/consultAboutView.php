<?php $title = 'About Ticket Manager'; ?>

<?php ob_start(); ?>
    
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> 
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">About Us</h1>
      </div>


      <p id="aboutUsText">
        Ticket Manager is an incident ticket management application for a call center. It is useful for companies wishing to use it internally, or for companies such as call centers.<br><br>
        In the event of incidents, customers can call by phone, send an email, or log in directly to their account, to report bugs and malfunctions. Once a ticket is open, it can be followed by the customer and the person solving the problem through different statuses.<br><br> 
        Everything is managed through an internal company database that is simple to administer and is essentially administered via the web application.
      </p>

    

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>