<?php
// if this page is for editing an existing exercise than we need the id
// so $_GET['id'] has to be provided.

require_once($_SERVER['DOCUMENT_ROOT'] . '/viewModel/ExerciseViewModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/viewModel/UserViewModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/viewModel/DifficultyViewModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/viewModel/CategoryViewModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/viewModel/SubcategoryViewModel.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/auth/user_info.php');
$user = getActiveUser();

if ($user == null) { // Zum Testen ein User mit ungültiger ID
    // http_response_code(401);
    // die();
    $user = new User(1, "test_user", "test@user.test");
}

$exerciseViewModel = new ExerciseViewModel();
$userViewModel = new UserViewModel();
$difficultyViewModel = new DifficultyViewModel();
$subcategoryViewModel = new SubCategoryViewModel();
$categoryViewModel = new CategoryViewModel();

$categories = $categoryViewModel->get_all();
$subcategories = $subcategoryViewModel->get_all();
$difficulties = $difficultyViewModel->get_all();

$action_path = '../inc/save_exercise.php';

$site_name = "Neue Aufgabe";
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/head.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/header.php');
?>

<head>
    <link rel="stylesheet" href="../css/new_exercise.css">
</head>

<div class="container">
    <div class="header">
        <h3>Neue Aufgabe erstellen</h3>
    </div>

    <hr>

    <form action="<?= $action_path ?>" method="post">
        <input type="hidden" name="user_id" value="<?= $user->get_id() ?>">
        <div class="row">
            <!-- erste Spalte -->
            <div class="col s12 m6">
                <div class="input-field ">
                    <input type="text" name="title" id="title">
                    <label for="title">Aufgabentitel</label>
                </div>
                <div class="input-field ">
                    <textarea type="text" name="description" id="description" class="materialize-textarea"></textarea>
                    <label for="description">Aufgabenstellung</label>
                </div>
                <div class="input-field ">
                    <input type="text" name="solution" id="solution">
                    <label for="solution">Lösung</label>
                </div>

                <button type="submit" class="waves-effect waves-light btn">Erstellen</button>
            </div>

            <!-- zweite Spalte -->
            <div class="col s12 m6">
                <div class="input-field">
                    <select name="category">
                        <option value="" selected disabled>Bitte etwas auswählen</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category->get_id() ?>"><?= $category->get_description() ?></option>
                        <?php } ?>
                    </select>
                    <label for="category">Kategorie</label>
                </div>
                <div class="input-field">
                    <select name="subcategory">
                        <option value="" selected disabled>Bitte etwas auswählen</option>
                        <?php foreach ($subcategories as $subcategory) { ?>
                            <option value="<?= $subcategory->get_id() ?>"><?= $subcategory->get_description() ?></option>
                        <?php } ?>
                    </select>
                    <label for="category">Unterkategorie</label>
                </div>
                <div class="input-field">
                    <select name="difficulty">
                        <option value="" selected disabled>Bitte etwas auswählen</option>
                        <?php foreach ($difficulties as $difficulty) { ?>
                            <option value="<?= $difficulty->get_id() ?>"><?= $difficulty->get_description() ?></option>
                        <?php } ?>
                    </select>
                    <label for="category">Schwierigkeit</label>
                </div>
                <img src="../assets/pp_default.svg" alt="Bild der Übung">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate" placeholder="Keine Datei ausgewählt.">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/html/footer.php');
?>

<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="../js/bin/materialize.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').formSelect();
    });
    $('#description').show(function() {
        $(this).css('height', '12em');
    });
</script>