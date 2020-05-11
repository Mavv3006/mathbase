<?php
$site_name = "Mathbase";
include  $_SERVER['DOCUMENT_ROOT'] . '/html/head.php';
?>

<head>
    <link rel="stylesheet" href="/css/forms.css" />
</head>
<!-- Modal Structure -->
<div id="modalRegister" class="modal card white">
    <div class="modal-content card-content">
        <span class="card-title mb-prussian-blue-text">
            <h2>Registrieren</h2>
        </span>
        <form method="POST" action="#">

            <div class="input-field">
                <input id="email" type="text">
                <label for="email">E-Mail-Addresse</label>
            </div>

            <div class="input-field">
                <input id="username" type="text">
                <label for="username">Benutername</label>
            </div>

            <div class="input-field">
                <input id="password" type="password">
                <label for="password">Passwort</label>
            </div>

            <div class="input-field">
                <input id="password_confirm" type="password">
                <label for="password_confirm">Passwort bestätigen</label>
            </div>

            <button class="btn waves-effect waves-light" type="submit" name="action">Registrieren</button>

        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, '');
    });
</script>

<script src="../js/bin/materialize.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>