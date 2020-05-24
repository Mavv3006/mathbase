<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/auth/user_info.php');
$user = getActiveUser();

?>

<head>
    <link rel="stylesheet" href="/css/menu.css" />
</head>

<div class="menu">
    <!-- Dropdown Structure -->
    <ul id="userMenu" class="dropdown-content">
        <li><span>Hallo <b><?= $user == null ? "" : $user->get_username() ?></b></span></li>
        <li class="divider"></li>
        <li><a href="/html/profile.php">Profil</a></li>
        <li><a href="auth/logout.php">Ausloggen</a></li>
    </ul>
</div>



<script>
    $(document).ready(function() {
        $(".dropdown-trigger").dropdown({
            coverTrigger: false
        });
    });
</script>