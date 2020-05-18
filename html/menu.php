<head>
    <link rel="stylesheet" href="/css/menu.css" />
</head>

<div class="menu">
    <!-- Dropdown Structure -->
    <ul id="userMenu" class="dropdown-content">
        <li><span>Hallo <b>Nutzer!</b></span></li>
        <li class="divider"></li>
        <li><a href="#!">Profil</a></li>
        <li><a href="#!">Ausloggen</a></li>
    </ul>
</div>



<script>
    $(document).ready(function() {
            $(".dropdown-trigger").dropdown({coverTrigger: false});
        });
</script>