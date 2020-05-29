<?php

/* Benötigte Informationen zum speichern:
    user_id (int)
    description (text)
    solution (varchar(255))
    title (varchar(255))
    category-id (int)
    subcategory-id (int)
    difficulty-id (int)
    picture-path (varchar(255))
*/

require_once($_SERVER['DOCUMENT_ROOT'] . "/inc/config.php");
require_once($path['auth'] . '/user_info.php');
require_once($path['src'] . '/viewModel/ExerciseViewModel.php');

$user = getActiveUser();

if ($user == null) {
    http_response_code(401);
}

if ($_SERVER["REQUEST_METHOD"] == 'POST' && testUserInput()) {
    moveFileToTemp($_POST['user_id']);
    $id = insertExercise();
    moveFileToExercise($_POST['user_id'], $id);
    // TODO: Add routing to the newly created exercise
} else {
    http_response_code(405);
}

function testUserInput(): bool
{
    $user_id = isset($_POST['user_id']);
    $description = isset($_POST['description']);
    $solution = isset($_POST['solution']);
    $title = isset($_POST['title']);
    $category = isset($_POST['category']);
    $subcategory = isset($_POST['subcategory']);
    $difficulty = isset($_POST['difficulty']);
    // $picture = isset($_POST['picture']); // Aktuell noch nicht implementiert

    return $user_id && $description && $solution && $title && $category && $subcategory && $difficulty;
}

/**
 * Moves the uploaded file into assets/temp named after the uploaders user ID.
 *
 * @param integer $user_id The ID of the user who uploaded the file
 * @return void
 */
function moveFileToTemp(int $user_id)
{
    global $path;
    $file_extention = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $destination = $path['assets'] . '/temp/' . $user_id . '.' . $file_extention;
    move_uploaded_file($_FILES['file']['tmp_name'], $destination);
}

/**
 * Inserts a new exercise into the database and returns the ID of it.
 *
 * @return integer The ID of the newly created exercise
 */
function insertExercise(): int
{
    $viewModel = new ExerciseViewModel();
    extract($_POST);
    $exercise = new Exercise(0, $user_id, $title, $description, $solution, "", "", $category, $subcategory, $difficulty, "");
    return $viewModel->create($exercise);
}

/**
 * Moves the uploaded file into assets/exercise named after the corresponding exercise ID in the database.
 *
 * @param integer $user_id The ID of the user who uploaded the file
 * @param integer $id The ID of the corresponding exercise in the database
 * @return void
 */
function moveFileToExercise(int $user_id, int $id)
{
    global $path;
    $file_extention = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $temp = $path['assets'] . '/temp/' . $user_id . '.' . $file_extention;
    $exercise = $path['assets'] . '/exercise/' . $id . '.' . $file_extention;
    rename($temp, $exercise);
}
