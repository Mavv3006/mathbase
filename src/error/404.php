<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <link rel="stylesheet" href="../../css/materialize.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>

<body>
    <?php require_once($path['src'] . '/html/header.php'); ?>

    <div class="container">
        <div class="header">
            <h3>404 | Not Found</h3>
        </div>
        <p>Die angefragte URL ist nicht verfügbar</p>
    </div>

    <?php require_once($path['src'] . '/html/footer.php'); ?>
</body>

</html>