<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/inc/config.php");
require_once($path['config'] . '/config/config.php');

if (!isset($_GET['id'])) {
    // redirect to homepage
    redirect("../main.php");
}

setUserLocation("show", array("id" => $_GET['id']));
getPage();


// get Task based on GET Query
require_once($path['src'] . '/viewModel/ExerciseViewModel.php');
require_once($path['src'] . '/viewModel/UserViewModel.php');
require_once($path['src'] . '/viewModel/DifficultyViewModel.php');
require_once($path['src'] . '/viewModel/CategoryViewModel.php');
require_once($path['src'] . '/viewModel/SubcategoryViewModel.php');

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

$has_picture = $exercise->get_picture() == "" ? false : true;

$username = $user->get_username();

$site_name = $exercise->get_title();
require_once($path['src'] . '/html/head.php');
require_once($path['src'] . '/html/header.php');

?>

<head>
    <link rel="stylesheet" href="/css/exercise.css" />
</head>

<body>

    <div class="container">
        <div class="header">
            <h3><?= $exercise->get_title() ?></h3>
            <div class="edit_icon waves-effect waves-light btn">
                <a href="<?= $_SERVER['DOCUMENT_ROOT'] ?>index.php">
                    <!--TODO update link -->
                    <i class="material-icons">create</i>
                </a>
            </div>
        </div>

        <hr>

        <div class="sub-header">
            <h5 class="category"><?= $category->get_description() ?> - <?= $subcategory->get_description() ?></h5>
            <h6 class="difficulty"><?= $difficulty->get_description() ?></h6>
            <h6 class="username">von <?= $username ?></h6>
        </div>

        <div class="row">
            <?php if ($has_picture) { ?>
                <p class="description col s12 m6"><?= $exercise->get_description() ?></p>
                <p class="exercise-picture col s12 m6">
                    <img src="../<?= $exercise->get_picture() ?>" alt="Bild der Übung">
                </p>
            <?php } else { ?>
                <p class="description col s12"><?= $exercise->get_description() ?></p>
            <?php } ?>
        </div>

        <form action="" method="post" name="solutionForm" id="solutionForm">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <input type="hidden" name="correct_solution" value="<?= $exercise->get_solution() ?>">
            <div class="row">
                <div class="input-field col s12 m5">
                    <input type="text" name="solution" id="solution">
                    <label for="solution" id="solution_label">Antwort</label>
                </div>
                <span class="icon">
                    <span class="done-icon display_none" id="done-icon">
                        <i class="material-icons done">done</i>
                    </span>
                    <span class="clear-icon display_none" id="clear-icon">
                        <i class="material-icons clear">clear</i>
                    </span>
                </span>
            </div>
            <button type="submit" class="waves-effect waves-light btn">Überprüfen</button>
            <div class="waves-effect btn-flat" id="show_solution">Lösung anzeigen</div>
        </form>

    </div>

    <script>
        $('#show_solution').on('click', function() {
            let value = document.getElementById('solution').value;
            let solution = document.solutionForm.elements['correct_solution'].value
            console.log(solution);
            document.getElementById('solution_label').className = "active";
            document.getElementById('solution').value = solution;
        });

        $('#solutionForm').submit(function(event) {
            let user_solution = document.getElementById('solution').value;
            let correct_solution = document.solutionForm.elements['correct_solution'].value
            if (user_solution == correct_solution) {
                document.getElementById('done-icon').classList.remove("display_none");
                document.getElementById('clear-icon').classList.add("display_none");
            } else {
                document.getElementById('clear-icon').classList.remove("display_none");
                document.getElementById('done-icon').classList.add("display_none");
            }
            event.preventDefault();
        })
    </script>

    <?php
    include_once($path['src'] . '/html/footer.php');
    ?>

</body>