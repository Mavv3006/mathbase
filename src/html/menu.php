<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/config.php");

require_once($path['auth'] . '/user_info.php');
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
        <li><a href="profile.php">Profil</a></li>
        <li><a href="<?= '../auth/logout.php' ?>">Ausloggen</a></li>
    </ul>
</div>



<script>
    $(document).ready(function() {
        $(".dropdown-trigger").dropdown({
            coverTrigger: false
        });
    });
</script>