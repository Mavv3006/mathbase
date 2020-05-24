<?php
require($_SERVER['DOCUMENT_ROOT'] .  '/auth/user_info.php');

$activeUser = getActiveUser();
?>

<head>
    <link rel="stylesheet" href="/css/header.css" />
</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="/" class="brand-logo logo-wrapper">
                    <img id="header-logo" src="/assets/logo/logo.svg" />
                    <div class="logo-text">
                        Math<span class="mb-orange-text">base</span>
                    </div>
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <?php
                    if ($activeUser == null) {
                    ?>
                        <li><a class="waves-effect btn modal-trigger" id="login-button" href="#modalLogin">Einloggen</a></li>
                        <li><a class="waves-effect waves-light btn modal-trigger" href="#modalRegister">Registrieren</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a class="waves-effect waves-light btn">Aufgabe erstellen</a></li>
                        <li>
                            <div class="avatar-container">
                                <a class="avatar" href="/html/profile.php">
                                    <img class="avatar" src="/assets/pp_default.svg">
                                </a>
                            </div>
                        </li>
                        <!-- Dropdown Trigger -->
                        <li>
                            <a class="dropdown-trigger" href="#!" data-target="userMenu"><i class="material-icons mb-orange-text">arrow_drop_down</i></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </div>


    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/html/forms/login.php'); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/html/forms/register.php'); ?>

</body>