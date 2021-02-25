<?php
session_start();
var_dump($_GET);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/unit2/boutique/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- police du logo -->
    <link href="https://fonts.googleapis.com/css2?family=Dr+Sugiyama&display=swap" rel="stylesheet"> 
    <!-- icones pour l'application -->
    <link rel="stylesheet" href="/unit2/boutique/css/font-awesome/css/font-awesome.min.css">
    
    <title>Sonia | boutique en ligne</title>
</head>
<body>
    <header>
        <?= $contentHeader ?>
    </header>
    <main>
        <?= $contentMain ?>
    </main>
    <footer>
        <?= $contentFooter ?>
    </footer>
</body>
</html>