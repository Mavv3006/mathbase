<?php
session_start();
$site_name = "Mathbase";
require_once($_SERVER['DOCUMENT_ROOT'] . '/html/head.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
setUserLocation("index");

$site_name = "Aufgabenliste";
require_once($_SERVER['DOCUMENT_ROOT'] . '/html/head.php');

?>

<head>
    <link rel="stylesheet" href="/css/index.css" />
</head>

<body>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/html/header.php'); ?>

    <div class="introduction">

        <div class="title">
            <h1><b>Mathe</b> üben so einfach wie nie.</h1>
            <h5>So viel Spaß hat Lernen selten gemacht!</h5>
        </div>

        <div class="row">
            <div class="col s10 offset-s1 m2 offset-m2">
                <div class="card">
                    <div class="card-image mb-orange-text waves-effect waves-block waves-light">
                        <i class="large material-icons">access_time</i>
                    </div>
                    <div class="card-content">
                        <span class="card-title">Jederzeit</span>
                        <p>Schulstunden gehen 45 Minuten - Diese Plattform steht Dir 24/7 zur Verfügung.</p>
                    </div>
                </div>
            </div>

            <div class="col s10 offset-s1 m2">
                <div class="card">
                    <div class="card-image mb-orange-text waves-effect waves-block waves-light">
                        <i class="large material-icons">beach_access</i>
                    </div>
                    <div class="card-content">
                        <span class="card-title">Überall</span>
                        <p>Ob am Schreibtisch oder unter Palmen - Du kannst überall lernen.</p>
                    </div>
                </div>
            </div>

            <div class="col s10 offset-s1 m2">
                <div class="card">
                    <div class="card-image mb-orange-text waves-effect waves-block waves-light">
                        <i class="large material-icons">fitness_center</i>
                    </div>
                    <div class="card-content">
                        <span class="card-title">Ohne Druck</span>
                        <p>Nimm Dir die Zeit, die Du brauchst - Keiner sagt Dir, wie schnell Du fit sein musst.</p>
                    </div>
                </div>
            </div>

            <div class="col s10 offset-s1 m2">
                <div class="card">
                    <div class="card-image mb-orange-text waves-effect waves-block waves-light">
                        <i class="large material-icons">redeem</i>
                    </div>
                    <div class="card-content">
                        <span class="card-title">Kostenlos</span>
                        <p>Lernen sollte nichts mit Geld zu tun haben - Deswegen kannst du bei uns kostenlos Mathe üben.</p>
                    </div>
                </div>
            </div>
        </div>


        <h5>
            Teste jetzt <b><span class="mb-prussian-blue-text">Math</span><span class="mb-orange-text">base</span></b> und werde zum Mathe-Champion!
        </h5>

        <div class="button-start">
            <a class="waves-effect waves-light btn" href="/main.php">Jetzt starten</a>
        </div>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer.php'); ?>
</body>