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

    <div class="container">
        <div class="header">
            <h1><?= $exercise->get_title() ?></h1>
            <div class="edit_icon waves-effect waves-light btn">
                <a href="../index.php">
                    <!--TODO update link -->
                    <i class="material-icons">create</i>
                </a>
            </div>
        </div>

        <hr>

        <div class="sub-header">
            <h5 class="category"><?= $category->get_description() ?> - <?= $subcategory->get_description() ?></h5>
            <h6 class="difficulty"><?= $difficulty->get_description() ?></h6>
            <h6 class="username">von <?= $user->get_username() ?></h6>
        </div>

        <div class="row">
            <p class="description col s12 l8"><?= $exercise->get_description() ?></p>
            <p class="exercise-picture col s12 l4">Bild der Übung</p>
        </div>

        <?php

        // show Bild, wenn vorhanden

        ?>

        <form action="" method="post" name="solutionForm">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>" >
            <input type="hidden" name="correct_solution" value="<?= $exercise->get_solution() ?>" >
            <div>
                <div class="input-field">
                    <input type="text" name="solution" id="solution">
                    <label for="solution" id="solution_label">Antwort</label>
                </div>
                <span class="icon">
                    <span class="done-icon ">
                        <i class="material-icons done">done</i>
                    </span>
                    <span class="clear-icon">
                        <i class="material-icons clear">clear</i>
                    </span>
                </span>
            </div>
            <button type="submit" class="waves-effect waves-light btn">Überprüfen</button>
            <div class="waves-effect btn-flat" id="show_solution">Lösung anzeigen</div>
        </form>

        <?php

        // include footer

        ?>

    </div>

    <script src="../js/bin/materialize.min.js"></script>
    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>

    <script>
        $('#show_solution').on('click', function() {
            let value = document.getElementById('solution').value;
            let id = document.solutionForm.elements['id'].value;
            let solution = document.solutionForm.elements['correct_solution'].value
            console.log(solution);
            document.getElementById('solution_label').className = "active";
            document.getElementById('solution').value = solution;
        });
    </script>

</body>