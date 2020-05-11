<?php
$site_name = "Mathbase";
include  $_SERVER['DOCUMENT_ROOT'] . '/html/head.php';
?>

<!-- Modal Structure -->
<div id="modal1" class="modal card white ">
    <div class="modal-content card-content">
        <span class="card-title mb-prussian-blue-text">
            <h2>Einloggen</h2>
        </span>
        <form method="POST" action="#">

            <div class="input-field">
                <input id="username" type="text">
                <label for="username">Benutername</label>
            </div>

            <div class="input-field">
                <input id="password" type="password">
                <label for="password">Passwort</label>
            </div>

            <p style="padding-bottom: 19px">
                <a href="#">
                    Ich habe mein Passwort vergessen...
                </a>
            </p>

            <button class="btn waves-effect waves-light" type="submit" name="action">Einloggen</button>

        </form>
    </div>
    <div class="card-action">
        <a href="#">Noch kein Mitglied? <b>Jetzt registrieren!</b></a>
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