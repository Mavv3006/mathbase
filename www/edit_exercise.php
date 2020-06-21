<?php
session_start();

// if this page is for editing an existing exercise than we need the id
// so $_GET['id'] has to be provided.

include_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");

require_once($path['config'] . '/config.php');

require_once($path['src'] . '/viewModel/ExerciseViewModel.php');
require_once($path['src'] . '/viewModel/UserViewModel.php');
require_once($path['src'] . '/viewModel/DifficultyViewModel.php');
require_once($path['src'] . '/viewModel/CategoryViewModel.php');
require_once($path['src'] . '/viewModel/SubcategoryViewModel.php');

require_once($path['auth'] . '/user_info.php');

setUserLocation("edit");

$user = getActiveUser();

if ($user == null) { // Zum Testen ein User mit ungültiger ID
    // http_response_code(401);
    // die();
    $user = new User(1, "test_user", "test@user.test", "assets/pp_default.svg");
}

$user_id = $user->get_id();

$exerciseViewModel = new ExerciseViewModel();
$userViewModel = new UserViewModel();
$difficultyViewModel = new DifficultyViewModel();
$subcategoryViewModel = new SubCategoryViewModel();
$categoryViewModel = new CategoryViewModel();

$exercise = $exerciseViewModel->get_by_id($_GET['id']);

// only the author of the exercise should be able to edit the exercise
if ($exercise->get_user_id() != $user_id) {
    http_response_code(404);
    die();
}

$hasPicture = $exercise->get_picture() != "";

$categories = $categoryViewModel->get_all();
$subcategories = $subcategoryViewModel->get_all();
$difficulties = $difficultyViewModel->get_all();

$action_path = $path['src'] . '/inc/edit_exercise.php';

$site_name = $exercise->get_title();
include_once($path['src'] . '/html/head.php');
include_once($path['src'] . '/html/header.php');
?>

<head>
    <link rel="stylesheet" href="/css/new_exercise.css">
    <link rel="stylesheet" href="/css/edit_exercise.css">
    <link rel="stylesheet" href="/css/error.css">
</head>

<div class="container">
    <div class="header">
        <h3>Aufgabe bearbeiten</h3>
    </div>

    <hr>

    <div id="error" class="hidden error"></div>

    <form action="<?= $action_path ?>" method="post" enctype="multipart/form-data" id="form">
        <input type="hidden" name="user_id" value="<?= $user_id ?>">
        <input type="hidden" name="id" value="<?= $exercise->get_id() ?>">

        <div class="row">
            <!-- erste Spalte -->
            <div class="col s12 m6">
                <div class="input-field ">
                    <input type="text" name="title" id="title" value="<?= $exercise->get_title() ?>">
                    <label for="title">Aufgabentitel</label>
                </div>
                <div class="input-field ">
                    <textarea type="text" name="description" id="description" class="materialize-textarea"><?= $exercise->get_description() ?></textarea>
                    <label for="description">Aufgabenstellung</label>
                </div>
                <div class="input-field tooltipped" data-position="bottom" data-tooltip="Die Lösung sollte nur aus Zahlen (auf zwei Nachkommastellen gerundet) oder möglichst wenigen Wörtern bestehen.">
                    <input type="text" name="solution" id="solution" value="<?= $exercise->get_solution() ?>">
                    <label for="solution">Lösung</label>
                </div>
                <button type="submit" class="waves-effect waves-light btn">Speichern</button>
            </div>

            <!-- zweite Spalte -->
            <div class="col s12 m6">
                <div class="input-field">
                    <select name="category" id="categorySelect">

                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category->get_id() ?>" <?php if ($category->get_id() == $exercise->get_category()) {
                                                                            echo "selected";
                                                                        } ?>>
                                <?= $category->get_description() ?>
                            </option>
                        <?php } ?>

                    </select>
                    <label for="category">Kategorie</label>
                </div>
                <div class="input-field">
                    <select name="subcategory" id="subcategorySelect">
                        <option value="" selected>Bitte etwas auswählen</option>

                        <?php foreach ($subcategories as $subcategory) { ?>
                            <option value="<?= $subcategory->get_id() ?>" <?php if ($subcategory->get_id() == $exercise->get_subcategory()) {
                                                                                echo "selected";
                                                                            } ?>>
                                <?= $subcategory->get_description() ?>
                            </option>
                        <?php } ?>

                    </select>
                    <label for="category">Unterkategorie</label>
                </div>
                <div class="input-field">
                    <select name="difficulty" id="difficultySelect">
                        <option value="" selected>Bitte etwas auswählen</option>

                        <?php foreach ($difficulties as $difficulty) { ?>
                            <option value="<?= $difficulty->get_id() ?>" <?php if ($difficulty->get_id() == $exercise->get_difficulty()) {
                                                                                echo "selected";
                                                                            } ?>>
                                <?= $difficulty->get_description() ?>
                            </option>
                        <?php } ?>

                    </select>
                    <label for="category">Schwierigkeit</label>
                </div>
                <?php if ($hasPicture) { ?>
                    <img src="<?= $path['assets'] . '/' . $exercise->get_picture() ?>" alt="Bild der Übung">
                <?php } ?>
                <div class="file-field input-field">
                    <div class="btn blue-btn waves-effect waves-light">
                        <span class="">anderes Bild hochladen</span>
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate" placeholder="Keine neue Datei ausgewählt." id="file_name">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
require_once($path['src'] . '/html/footer.php');
?>

<script>
    $(document).ready(function() {
        $('select').formSelect();
        $('.tooltipped').tooltip();
    });

    $('#description').show(function() {
        $(this).css('height', '12em');
    });

    // form validation
    const categorySelect = document.getElementById('categorySelect');
    const subcategorySelect = document.getElementById('subcategorySelect');
    const difficultySelect = document.getElementById('difficultySelect');
    const title = document.getElementById('title');
    const solution = document.getElementById('solution');
    const description = document.getElementById('description');
    const error = document.getElementById("error");
    const file = document.getElementById("file_name");

    $("#form").submit((e) => {
        messages = [];

        if (title.value == "") {
            messages.push("Bitte geben Sie einen Titel an.");
        }
        if (description.value == "") {
            messages.push("Bitte geben Sie eine Aufgabenstellung an.");
        }
        if (solution.value == "") {
            messages.push("Bitte geben Sie eine Lösung an.");
        }
        if (categorySelect.value == "") {
            messages.push("Bitte geben Sie eine Kategorie an.");
        }
        if (subcategorySelect.value == "") {
            messages.push("Bitte wählen Sie eine Unterkategorie aus.");
        }
        if (difficultySelect.value == "") {
            messages.push("Bitte wählen Sie eine Schwierigkeit aus.");
        }
        if (file.value != "") {
            if (!isValidType(file.value)) {
                messages.push("Bitte nur Bilder mit den Endungen .jpg, .jpeg, .png oder .gif hochladen.");
            }
        }

        if (messages.length > 0) {
            e.preventDefault();
            error.innerText = messages.join("\n");
            $("#error").removeClass("hidden");
        }
    });

    function isValidType(file_name) {
        if (file_name.includes(".")) {
            let endung = file_name.split(".")[1];
            switch (endung) {
                case 'gif':
                case 'png':
                case 'jpg':
                case 'jped':
                    return true;
                default:
                    return false;
            }
        } else {
            return false;
        }
    }
</script>