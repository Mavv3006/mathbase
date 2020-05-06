<?php

if (!isset($_GET['id'])) {
    // redirect to homepage
    die(header('Location: ../index.html'));
}

// get Task based on GET Query
require_once("../viewModel/ExerciseViewModel.php");
require_once("../viewModel/UserViewModel.php");
require_once("../viewModel/DifficultyViewModel.php");
require_once("../viewModel/CategoryViewModel.php");
require_once("../viewModel/SubcategoryViewModel.php");

$exerciseViewModel = new ExerciseViewModel();
$userViewModel = new UserViewModel();
$difficultyViewModel = new DifficultyViewModel();
$subcategoryViewModel = new SubCategoryViewModel();
$categoryViewModel = new CategoryViewModel();

$exercise = $exerciseViewModel->get_by_id($_GET['id']);
$user = $userViewModel->get_by_id($exercise->get_user_id());
$difficulty = $difficultyViewModel->get_by_id($exercise->get_difficulty());
$category = $categoryViewModel->get_by_id($exercise->get_category());
$subcategory = $subcategoryViewModel->get_by_id($exercise->get_subcategory());


$stylesheet_path = "../css/exercise.css";
$site_name = $exercise->get_title();
include_once("../html/head.php");

?>

<body>

    <div class="content">
        <div>
            <h1><?= $exercise->get_title() ?></h1>
            <div class="edit_icon">
                <i class="material-icons">create</i>
            </div>
        </div>

        <hr>
        
        <h5 class="category"><?= $category->get_description() ?> - <?= $subcategory->get_description() ?></h5>
        <h6 class="difficulty"><?= $difficulty->get_description() ?></h6>
        <p class="username"><?= $user->get_username() ?></p>

        <p class="description"><?= $exercise->get_description() ?></p>

        <?php

        // show Bild, wenn vorhanden

        ?>


        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <div class="input-field">
                <input type="text" name="solution" id="solution">
                <label for="solution">Antwort</label>
            </div>
            <button type="submit" class="waves-effect waves-light btn">Überprüfen</button>
            <button class="waves-effect btn-flat">Lösung anzeigen</button>
        </form>

        <?php

        // include footer

        ?>
    </div>

    <script src="../js/bin/materialize.min.js"></script>

</body>