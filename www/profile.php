<?php
session_start();

$site_name = "Profil";
include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");

require_once($path['src'] . '/html/head.php');
require_once($path['config'] . '/config.php');
require_once($path['auth'] . '/user_info.php');
require_once($path['src'] . '/viewModel/UserViewModel.php');
setUserLocation("profile");

$activeUser = getActiveUser();
$user_id = $activeUser->get_id();
$email = $activeUser->get_email();
$username = $activeUser->get_username();
$picture = $activeUser->get_picture();
?>

<head>
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/assets/icons/iconfont/material-icons.css" />
    <?php
    require_once( $path['src'] . '/html/header.php');
    ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col m6 offset-m3">
                <div class="card" id="profile">
                    <span class="card-title" id="profile-title">Profil</span>
                    <div id="profile-avatar-container">
                        <img id="profile-avatar" src="/assets/defaults/pp_default.svg">
                        <a class="waves-effect waves-light btn" id="avatar-button">Bild hochladen</a><br>
                    </div>
                    <div class="card-content">
                        <form method="POST" action="#">
                            <div class="input-field col s10 profile-input">
                                <input disabled id="email" type="email" class="validate" value="<?= $email ?>">
                                <label for="email">E-Mail-Adresse</label>
                            </div>
                            <a class="edit-button waves-effect waves-light btn" onclick="disableInput('email')">
                                <i class="material-icons" id="edit">create</i>
                            </a>
                            <div class="input-field col s10">
                                <input disabled id="username" name="username" type="text" class="validate" value="<?= $username ?>">
                                <label for="username">Benutzername</label>
                            </div>
                            <a class="edit-button waves-effect waves-light btn" onclick="disableInput('username')">
                                <i class="material-icons">create</i>
                            </a>
                            <div class="input-field col s10">
                                <input id="new_password" type="password" class="validate">
                                <label for="new_password">Neues Passwort</label>
                            </div>
                            <div class="input-field col s10">
                                <input id="old_password" type="password" class="validate">
                                <label for="old_password">Altes Passwort</label>
                            </div>
                            <a class="waves-effect waves-light btn" id="save-button" name="save-button" onclick="saveData()">Änderungen speichern</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include $path['src'] . '/html/footer.php';
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

    function saveData() {
        var newEmail = $('#email').val();
        var newPassword = $('#new_password').val();
        var oldPassword = $('#old_password').val();
        var newUsername = $('#username').val();
        
        if(newEmail !== "<?php $email ?>"){
            $.ajax({
                type: "POST",
                url: "/auth/change_email.php",
                data: { 'newEmail': newEmail }
            }).done(function(){
                location.reload();
            })
        }

        if(newPassword !== "" && oldPassword !== "" && newPassword !== oldPassword){
            $.ajax({
                type: "POST",
                url: "/auth/change_password.php",
                data: { 'oldPassword': oldPassword,
                        'newPassword': newPassword }
            }).done(function(){
                location.reload();
            })
        }
    }
</script>