<head>
    <link rel="stylesheet" href="/css/header.css"/>
</head>
<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo logo-wrapper">
                    <img id="header-logo" src="/assets/logo/logo.svg"/>
                    <div class="logo-text">
                        Math<span id="mb-orange">base</span>
                    </div>
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <?php 
                    if(true){
                    ?>
                        <li><a class="waves-effect btn modal-trigger" id="login-button" href="#modal1">Einloggen</a></li>
                        <li><a class="waves-effect waves-light btn">Registrieren</a></li>
                    <?php
                    }else{
                    ?>
                        <li><a class="waves-effect waves-light btn">Aufgabe erstellen</a></li>
                        <li>
                            <div class="avatar-container">
                                <a class="avatar" href="#">
                                    <img class="avatar" src="/assets/pp_default.svg">
                                </a>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </div>
</body>