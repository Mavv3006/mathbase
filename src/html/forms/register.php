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
                <input name="email" type="email" id="register_email">
                <label for="email">E-Mail-Addresse</label>
            </div>

            <div class="input-field">
                <input name="username" type="text" id="register_username">
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
        e.preventDefault();
        let email = $('#register_email').val();
        let username = $('#register_username').val();
        let password = $('#register_password').val();
        let password_confirm = $('#register_password_confirm').val();
        let error = document.getElementById('register_error');

        if (email !== "" && username !== "" && password !== "" && password_confirm !== "") {
            if (password == password_confirm && validatePassword(password)) {
                error.classList.add('hidden');
                $.ajax({
                    type: "POST",
                    url: "/auth/sign_up.php",
                    data: {
                        "email": email,
                        "password": password,
                        "username": username
                    }
                }).done((e) => {
                    console.log(e);
                    if (e['sign_up'] = "true") {
                        console.log("Registrieren geglückt");
                        location.reload();
                    } else {
                        error.innerText = e['error'];
                        error.classList.remove('hidden');
                    }
                });
            } else {
                message = [];
                if (password != password_confirm) {
                    message.push("Passwörter stimmen nicht überein.");
                }
                if (!validatePassword(password)) {
                    message.push("Dein Passwort muss folgendes enthalten:\n- 1 Großbuchstabe\n- 1 Kleinbuchstabe\n- 1 Zahl");
                }
                if (message.length > 0) {
                    error.innerText = message.join("\n");
                    error.classList.remove('hidden');
                }
            }
        } else {
            message = [];
            if (email === "") {
                message.push("Bitte geben Sie eine E-Mail-Adresse ein.");
            }
            if (username === "") {
                message.push("Bitte geben Sie einen Benutzernamen ein.");
            }
            if (password === "" || password_confirm === "") {
                message.push("Bitte geben Sie ein Passwort und wiederholen es.");
            }
            if (message.length > 0) {
                error.innerText = message.join("\n");
                error.classList.remove('hidden');
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, '');
    });
</script>