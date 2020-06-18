<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");
?>

<head>
    <link rel="stylesheet" href="/css/forms.css" />
    <link rel="stylesheet" href="/css/error.css" />
</head>
<!-- Modal Structure -->
<div id="modalRegister" class="modal card white">
    <div class="modal-content card-content">
        <span class="card-title mb-prussian-blue-text">
            <h2>Registrieren</h2>
        </span>
        <form method="POST" action="<?= '../auth/sign_up.php' ?>" id="register_form">

            <div class="input-field">
                <input name="email" type="email">
                <label for="email">E-Mail-Addresse</label>
            </div>

            <div class="input-field">
                <input name="username" type="text">
                <label for="username">Benutername</label>
            </div>

            <div class="input-field">
                <input name="password" type="password" id="register_password">
                <label for="password">Passwort</label>
            </div>

            <div class="input-field">
                <input name="password_confirm" type="password" id="register_password_confirm">
                <label for="password_confirm">Passwort bestätigen</label>
            </div>

            <div class="error hidden" id="register_error"></div>

            <button class="btn waves-effect waves-light" type="submit" name="action">Registrieren</button>

        </form>
    </div>
</div>

<script src="<?= $path['js'] ?>/validatePassword.js"></script>
<script>
    $('#register_form').submit((e) => {
        if ($('#register_password').val() !== $('#register_password_confirm').val()) {
            e.preventDefault();
            console.log("Passwörter stimmen nicht überein: " + $('#register_password').val() + ", " + $('#register_password_confirm').val());
            $('#register_error').text("Die Passwörter stimmen nicht überein").removeClass('hidden');
            return;
        }

        if (!validatePassword($('#register_password').val())) {
            e.preventDefault();
            console.log("Passwort ist nicht valide: " + $('#register_password').val());
            $('#register_error').text("Gebe ein valides Passwort ein").removeClass('hidden');
            return;
        }

        console.log("alles ist gut");

        $('#register_error').addClass('hidden');
    });

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, '');
    });
</script>