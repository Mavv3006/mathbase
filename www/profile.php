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

$action_path = $path['src'] . '/inc/save_profilepic.php';

?>

<head>
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/assets/icons/iconfont/material-icons.css" />
    <?php
    require_once($path['src'] . '/html/header.php');
    ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col m6 offset-m3">
                <form method="POST" action="<?= $action_path ?>" enctype="multipart/form-data" id="form">
                    <div class="card" id="profile">
                        <span class="card-title" id="profile-title">Profil</span>

                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                        <div id="profile-avatar-container">
                            <?php
                            if ($activeUser->get_picture() != null) {
                            ?>
                                <img id="profile-avatar" src="<?= $path['assets'] . '/' .  $picture ?>" alt="Profilbild">
                            <?php } else { ?>
                                <img id="profile-avatar" src="<?= $path['assets'] ?>/defaults/pp_default.svg" alt="Profilbild">
                            <?php } ?>

                            <div class="file-field input-field">
                                <div class="waves-effect waves-light btn" id="avatar-button">
                                    <span class="">Bild hochladen</span>
                                    <input type="file" name="file">
                                </div>
                                <br>
                                <div class="file-path-wrapper">
                                    <input disabled type="text" class="file-path validate" placeholder="Keine Datei ausgewählt.">
                                </div>
                            </div>

                            <br>
                        </div>

                        <div class="card-content">
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
                <!-- TODO: Fix profile_error css -->
                <div class="error hidden" id="profile_error"></div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <?php
    include $path['src'] . '/html/footer.php';
    ?>
</body>

<script src="<?= $path['js'] ?>/validatePassword.js"></script>
<script src="<?= $path['js'] ?>/disableInput.js"></script>
<script>
    /**
     * Saves the data provided in the form.
     */
    function saveData() {
        var newEmail = $('#email').val();
        var newPassword = $('#new_password').val();
        var oldPassword = $('#old_password').val();
        var newUsername = $('#username').val();


        if (newEmail !== "<?= $email ?>") {
            $.ajax({
                type: "POST",
                url: "/auth/change_email.php",
                data: {
                    'newEmail': newEmail
                }
            }).done(function(e) {
                alert(e);
                location.reload();

            })
        }

        if (!validatePassword(newPassword) && newPassword.length > 0) {
            $('#profile_error').text("Das neue Passwort ist nicht valide").removeClass('hidden');
            return;
        }

        $('#profile_error').addClass('hidden');


        if (newPassword !== "" && oldPassword !== "" && newPassword !== oldPassword) {
            $.ajax({
                type: "POST",
                url: "/auth/change_password.php",
                data: {
                    'oldPassword': oldPassword,
                    'newPassword': newPassword
                }
            }).done(function() {
                alert(e);
                location.reload();
            })
        }
        $('#form').submit();
    }
</script>