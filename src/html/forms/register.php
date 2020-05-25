<head>
    <link rel="stylesheet" href="/css/forms.css" />
</head>
<!-- Modal Structure -->
<div id="modalRegister" class="modal card white">
    <div class="modal-content card-content">
        <span class="card-title mb-prussian-blue-text">
            <h2>Registrieren</h2>
        </span>
        <form method="POST" action="<?= '../auth/sign_up.php' ?>">

            <div class="input-field">
                <input name="email" type="email">
                <label for="email">E-Mail-Addresse</label>
            </div>

            <div class="input-field">
                <input name="username" type="text">
                <label for="username">Benutername</label>
            </div>

            <div class="input-field">
                <input name="password" type="password">
                <label for="password">Passwort</label>
            </div>

            <div class="input-field">
                <input name="password_confirm" type="password">
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