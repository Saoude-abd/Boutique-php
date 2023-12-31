<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Boutique : BackOffice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="inc/css/style.css" rel="stylesheet">
    <link href="inc/css/simple-sidebar.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid ">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <a class="text-white  navbar-brand" href="#">Boutique</a>
                <button class="text-white navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarNav" aria-controls="sidebarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="sidebarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="text-white nav-link" href="<?= URL ?>admin">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="text-white nav-link" href="<?= URL ?>admin/gestion_produits.php">Gestion-produits</a>
                    </li>
                    <li class="nav-item">
                    <a class="text-white nav-link" href="#">Gestion membres</a>
                    </li>
                    <li class="nav-item">
                    <a class="text-white nav-link" href="#">Gestion commandes</a>
                    </li>
                </ul>
                </div>
            </nav>

<div class="col">
        
   