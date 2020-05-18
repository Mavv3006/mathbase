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
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, {
            coverTrigger: false
        });
        instance.open();
    });
</script>