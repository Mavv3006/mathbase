<?php
$site_name = "Profil";
include  $_SERVER['DOCUMENT_ROOT'] . '/src/html/head.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
setUserLocation("profile");
?>

<head>
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/assets/icons/iconfont/material-icons.css" />
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/src/html/header.php';
    ?>
</head>

<body>
    <div class="row">
        <div class="col m6 offset-m3">
            <div class="card" id="profile">
                <span class="card-title" id="profile-title">Profil</span>
                <div id="profile-avatar-container">
                    <img id="profile-avatar" src="/assets/pp_default.svg">
                    <a class="waves-effect waves-light btn" id="avatar-button">Bild hochladen</a><br>
                </div>
                <div class="card-content">
                    <form method="UPDATE" action="#">
                        <div class="input-field col s10 profile-input">
                            <input disabled id="email" type="email" class="validate">
                            <label for="email">E-Mail-Adresse</label>
                        </div>
                        <a class="edit-button waves-effect waves-light btn" onclick="disableInput('email')">
                            <i class="material-icons" id="edit">create</i>
                        </a>
                        <div class="input-field col s10">
                            <input disabled id="username" type="text" class="validate">
                            <label for="username">Benutzername</label>
                        </div>
                        <a class="edit-button waves-effect waves-light btn" onclick="disableInput('username')">
                            <i class="material-icons">create</i>
                        </a>
                        <div class="input-field col s10">
                            <input disabled id="password" type="password" class="validate">
                            <label for="password">Passwort</label>
                        </div>
                        <a class="edit-button waves-effect waves-light btn" onclick="disableInput('password')">
                            <i class="material-icons">create</i>
                        </a>
                    </form>
                    <a class="waves-effect waves-light btn" id="save-button">Änderungen speichern</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/src/html/footer.php';
    ?>
</body>
<script>
    function disableInput(element) {
        if (document.getElementById(element).disabled) {
            document.getElementById(element).disabled = false;
        } else {
            document.getElementById(element).disabled = true;
        }
    }
</script>