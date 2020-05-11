<head>
    <link rel="stylesheet" href="/css/header.css" />
</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo logo-wrapper">
                    <img id="header-logo" src="/assets/logo/logo.svg" />
                    <div class="logo-text">
                        Math<span id="mb-orange">base</span>
                    </div>
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <?php
                    if (false) {
                    ?>
                        <li><a class="waves-effect btn modal-trigger" id="login-button" href="#modalLogin">Einloggen</a></li>
                        <li><a class="waves-effect waves-light btn modal-trigger" href="#modalRegister">Registrieren</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a class="waves-effect waves-light btn">Aufgabe erstellen</a></li>
                        <li>
                            <div class="avatar-container">
                                <a class="avatar" href="#">
                                    <img class="avatar" src="/assets/pp_default.svg">
                                </a>
                            </div>
                        </li>
                        <!-- Dropdown Trigger -->
                        <li>
                            <a class="dropdown-trigger" href="#!" data-target="userMenu"><i class="material-icons">arrow_drop_down</i></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <!-- Dropdown Structure -->
            <ul id="userMenu" class="dropdown-content">
                <li>Hallo <b>Nutzer!<b></li>
                <li class="divider"></li>
                <li><a href="#!">Profil</a></li>
                <li><a href="#!">Ausloggen</a></li>
            </ul>
        </nav>
    </div>

    <script>
        $(document).ready(function() {
            $(".dropdown-trigger").dropdown();
        });
    </script>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/html/forms/login.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/html/forms/register.php'; ?>

</body>