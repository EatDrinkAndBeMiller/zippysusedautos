<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy's Used Cars</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>
   <main class="container">
   <header class="backgrnd">
        <h1 class="text-center">Zippy's Used Autos</h1><br>
    </header>

    <div class="row">
        <div class="col">
            <?php if($action == 'logout' || $action == 'register') { ?>
                <h4 class="text-end"></h4>
            <?php } else { ?>
                <h4><a href="./admin/index.php">Admin Site login</a></h4>
            <?php } ?>
        </div>
        <div class="col">
            <!--conditional for what to display in the corner-->
            <?php if($action !== 'register' && !isset($_SESSION['userid'])) { ?>
                <h4 class="text-end"><a href='.?action=register'>Register</a></h4>
            
            <?php } else if($action == 'logout' || $action == 'register') { ?>
                <h4 class="text-end"></h4>

            <?php } else if(isset($_SESSION['userid']) && $action !== 'register' || $action !== 'logout') { ?>
                <h4 class="text-end">Welcome, <?=$_SESSION['userid']?> &#40;<a href='.?action=logout'>logout</a> &#41; </h4>
            
            <?php } ?>
        </div>
    </div>
    <hr>