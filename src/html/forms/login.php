<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");
?>

<head>
    <link rel="stylesheet" href="/css/forms.css" />
    <link rel="stylesheet" href="/css/error.css" />
</head>
<!-- Modal Structure -->
<div id="modalLogin" class="modal card white ">
    <div class="modal-content card-content">
        <span class="card-title mb-prussian-blue-text">
            <h2>Einloggen</h2>
        </span>
        <form method="post" action="<?= '../auth/sign_in.php' ?>" id="login_form">

            <div class="input-field">
                <input name="email" type="email">
                <label for="email">E-Mail-Adresse</label>
            </div>

            <div class="input-field">
                <input name="password" type="password" id="login_password">
                <label for="password">Passwort</label>
            </div>

            <div class="error hidden" id="login_error"></div>

            <p>
                <a href="#">
                    Ich habe mein Passwort vergessen...
                </a>
            </p>

            <button class="btn waves-effect waves-light" type="submit" name="action">Einloggen</button>

            <p>
                <a href="#">
                    Noch kein Mitglied? <b>Jetzt registrieren!</b>
                </a>
            </p>
        </form>
    </div>
</div>
<script src="<?= $path['js'] ?>/validatePassword.js"></script>
<script>
    $('#login_form').submit((e) => {
        if (!validatePassword($('#login_password').val())) {
            e.preventDefault();
            console.log("Passwort ist nicht valide: " + $('#login_password').val());
            $('#login_error').text("Gebe ein valides Passwort ein").removeClass('hidden');
        } else {
            $('#login_error').addClass('hidden');
        }
    });
    
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, '');
    });
</script>