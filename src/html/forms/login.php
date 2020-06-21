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
        <form method="post" action="#" id="login_form">

            <div class="input-field">
                <input name="email" type="email" id="login_email">
                <label for="email">E-Mail-Adresse</label>
            </div>

            <div class="input-field">
                <input name="password" type="password" id="login_password">
                <label for="password">Passwort</label>
            </div>

            <div class="custom_error hidden" id="login_error"></div>

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
        e.preventDefault();
        let email = $('#login_email').val();
        let password = $('#login_password').val();
        let error = document.getElementById('login_error');

        if (email !== "" && password !== "" && validatePassword(password)) {
            error.classList.add("hidden");
            $.ajax({
                type: "POST",
                url: "/auth/sign_in.php",
                data: {
                    "email": email,
                    "password": password,
                }
            }).done((e) => {
                console.log(e);
                if (e['login'] == "true") {
                    console.log("Einloggen geglückt");
                    location.reload();
                } else {
                    console.log("Falsches Passwort");
                    error.innerText = "Das eingegebene Passwort ist falsch";
                    error.classList.remove('hidden');
                }
            });
        } else {
            message = [];
            if (email === "") {
                console.log("email leer");
                message.push("Bitte geben Sie eine E-Mail-Adresse ein.");
            }
            if (password === "") {
                console.log("passwort leer");
                message.push("Bitte geben Sie ein Passwort ein.");
            } else if (!validatePassword(password)) {
                console.log("passwort nicht valide");
                message.push("Bitte geben Sie ein valides Passwort ein");
            }
            if (message.length > 0) {
                error.innerText = message.join("\n");
                error.classList.remove("hidden");
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, '');
    });
</script>