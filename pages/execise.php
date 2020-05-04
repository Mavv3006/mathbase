<?php

if (!isset($_GET['id'])) {
    // redirect to homepage
    die(header('Location: ../index.html'));
}

// get Task based on GET Query
require_once("../viewModel/ExerciseViewModel.php");
$exerciseViewModel = new ExerciseViewModel();

$exercise = $exerciseViewModel->get_by_id($_GET['id']);


$site_name = $exercise->get_title();
include_once("../html/head.php");

?>

<body>

    <div>
        <h1><?= $exercise->get_title() ?></h1>
        <i class="material-icons">create</i>
    </div>

    <hr>

    <p><?= $exercise->get_description() ?></p>

    <p><?= $exercise->get_solution() ?></p>

    <?php

    // include footer

    ?>


</body>