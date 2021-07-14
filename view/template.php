<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
 
        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
        
	    <link href="public\css\report.css" rel="stylesheet">
	    <link href="public\css\bootstrap.css" rel="stylesheet">
	    <link href="public\css\dashboard.css" rel="stylesheet">
        <link rel="icon" href="public/images/ticket.png" />
        
	</head>
        <?php if(isset($_SESSION["is_loged"]) and ($_SESSION["is_loged"] == true) ){require("menu.php");}?>
    <body>
        <?= $content ?>
    </body>
</html>



