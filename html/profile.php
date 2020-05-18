<?php
$site_name = "Profil";
include  $_SERVER['DOCUMENT_ROOT'] . '/html/head.php';
?>

<head>
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/assets/icons/iconfont/material-icons.css" </head> <body>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/html/header.php';
    ?>
</head>
<div class="row">
    <div class="col s6 offset-s3">
        <div class="card" id="profile">
            <span class="card-title" id="profile-title">Profil</span>
            <div id="profile-avatar-container">
                <img id="profile-avatar" src="/assets/pp_default.svg">
                <div id="avatar-button-container">
                    <a class="waves-effect waves-light btn" id="avatar-button">Bild hochladen</a><br>
                </div>
            </div>
            <div class="card-content">
                <form method="UPDATE" action="#">
                    <div class="input-field col s10 profile-input">
                        <input id="email" type="email" class="validate">
                        <label for="email">E-Mail-Adresse</label>
                    </div>
                    <a class="edit-button waves-effect waves-light btn" href="#">
                        <i class="material-icons" id="edit">create</i>
                    </a>
                    <div class="input-field col s10">
                        <input id="username" type="text" class="validate">
                        <label for="username">Benutzername</label>
                    </div>
                    <a class="edit-button waves-effect waves-light btn" href="#">
                        <i class="material-icons">create</i>
                    </a>
                    <div class="input-field col s10">
                        <input id="password" type="password" class="validate">
                        <label for="password">E-Mail-Adresse</label>
                    </div>
                    <a class="edit-button waves-effect waves-light btn" href="#">
                        <i class="material-icons">create</i>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="../js/bin/materialize.min.js"></script>