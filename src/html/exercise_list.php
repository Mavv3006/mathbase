<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");

require_once($path['src'] . '/viewModel/ExerciseViewModel.php');
require_once($path['src'] . '/viewModel/DifficultyViewModel.php');
require_once($path['src'] . '/viewModel/CategoryViewModel.php');
require_once($path['src'] . '/viewModel/SubcategoryViewModel.php');

$exerciseViewModel = new ExerciseViewModel();
$difficultyViewModel = new DifficultyViewModel();
$subcategoryViewModel = new SubCategoryViewModel();
$categoryViewModel = new CategoryViewModel();

$exercises = $exerciseViewModel->get_all();

$site_name = "Aufgabenliste";
require_once($path['src'] . '/html/head.php');

?>

<head>
    <link rel="stylesheet" href="/css/exercise_list.css" />
</head>

<div class="container">

    <div class="header">
        <h1>Neue Aufgaben</h1>
    </div>

    <hr>

    <div class="exercise-grid">
        <?php foreach ($exercises as $exercise) {
            $difficulty = $difficultyViewModel->get_by_id($exercise->get_difficulty());
            $category = $categoryViewModel->get_by_id($exercise->get_category());
            $subcategory = $subcategoryViewModel->get_by_id($exercise->get_subcategory());
        ?>
            <a href=" <?= 'exercise.php?id=' . $exercise->get_id() ?>">
                <div class="exercise hoverable">
                    <p class="category col-content">
                        <span class="main_category"><?= $category->get_description() ?></span>
                        -
                        <span class="sub_category"><?= $subcategory->get_description() ?></span>
                    </p>
                    <p class="title col-content"><?= $exercise->get_title() ?></p>
                    <div class="short-text col-content"><?= $exercise->get_description() ?></div>
                    <p class="difficulty col-content"><?= $difficulty->get_description() ?></p>
                </div>
            </a>
        <?php } ?>
    </div>

</div>