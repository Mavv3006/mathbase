<link rel="stylesheet" href="/css/header.css"/>
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo logo-wrapper">
            <img id="header-logo" src="/assets/logo/logo.svg"/>
            <div class="logo-text">
                Math<span id="mb-two">base</span>
            </div>
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php 
            if(true){
            ?>
                <li><a class="waves-effect btn" id="login-button">Einloggen</a></li>
                <li><a class="waves-effect waves-light btn">Registrieren</a></li>
            <?php
            }else{
            ?>
                <li><a class="waves-effect waves-light btn">Aufgabe erstellen</a></li>
                <li id="avatar">
                    <a class="avatar"></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>