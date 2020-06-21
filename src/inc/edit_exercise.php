<?php

/* Benötigte Informationen zum speichern:
    id (int)
    user_id (int)
    description (text)
    solution (varchar(255))
    title (varchar(255))
    category-id (int)
    subcategory-id (int)
    difficulty-id (int)
    picture-path (varchar(255))
*/

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");
require_once($path['auth'] . '/user_info.php');
require_once($path['src'] . '/viewModel/ExerciseViewModel.php');
require_once('./check_type.php');

$user = getActiveUser();

if ($user == null) {
    http_response_code(401); // Unauthorized
    die();
}

if ($_SERVER["REQUEST_METHOD"] == 'POST' && testUserInput()) {
    if (!isAllowedMIMEType($_FILES['file']['type'])) {
        http_response_code(400); // Bad Request
        die();
    }
    updateExercise();
    if ($_FILES['file']['name'] != '') {
        moveFileToTemp($_POST['user_id']);
        moveFileToExercise($_POST['user_id'], $_POST['id']);
        insertFilePathIntoDB($id);
    }
    redirectToUrl("../../www/exercise.php?id=" . $_POST['id']);
} else {
    http_response_code(405); // Method Not Allowed
    die();
}


/**
 * Inserts the path to the exercise picture into the database.
 *
 * @param integer $id The ID of the exercise
 * @return void
 */
function insertFilePathIntoDB(int $id)
{
    global $path;
    $basePath = $path['assets'] . "/exercise/";
    $files = glob($basePath . $id . ".*");
    for ($i = 0; $i < sizeof($files); $i++) {
        $files[$i] = explode("assets/", $files[$i])[1];
    }
    var_dump($files);
    $viewModel = new ExerciseViewModel();
    $viewModel->insertPicture($id, $files[0]);
}

/**
 * This function tests whether the user posted all the information.
 *
 * @return boolean True if every information was posted. False if some information are missing
 */
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
 * @return void
 */
function updateExercise()
{
    $viewModel = new ExerciseViewModel();
    extract($_POST);
    $exercise = new Exercise($id, $user_id, $title, $description, $solution, "", "", $category, $subcategory, $difficulty, "");
    $viewModel->update($exercise);
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
