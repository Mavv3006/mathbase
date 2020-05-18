<head>
    <link rel="stylesheet" href="/css/forms.css" />
</head>
<!-- Modal Structure -->
<div id="modalLogin" class="modal card white ">
    <div class="modal-content card-content">
        <span class="card-title mb-prussian-blue-text">
            <h2>Einloggen</h2>
        </span>
        <form method="post" action="<?= '../auth/sign_in.php' ?>">

            <div class="input-field">
                <input name="email" type="email">
                <label for="email">E-Mail-Adresse</label>
            </div>

            <div class="input-field">
                <input name="password" type="password">
                <label for="password">Passwort</label>
            </div>

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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, '');
    });
</script>