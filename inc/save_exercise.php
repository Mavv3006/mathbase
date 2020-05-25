<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/inc/config.php");

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

require_once($path['auth'] . '/user_info.php');
require_once($path['src'] . '/viewModel/ExerciseViewModel.php');
$user = getActiveUser();
$viewModel = new ExerciseViewModel();

if ($user == null) {
    http_response_code(401);
}

if ($_SERVER["REQUEST_METHOD"] == 'POST' && testUserInput()) {
    extract($_POST);
    // moveFile();
    // $exercise = new Exercise(0, $user_id, $title, $description, $solution, "", "", $category, $subcategory, $difficulty, $file);
    // $viewModel->create($exercise);
    // $viewModel->create(new Exercise(0, 1, "title", "description", "solution", "today", "today", 0, 0, 0));

} else {
    http_response_code(405);
}

function testUserInput(): bool
{
    var_dump($_POST);
    var_dump($_FILES);
    moveFile();
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

function getFileName(): string
{
    global $path;
    $index = 0;
    $dir = $path['assets'] . "/exercise";
    do {
        $filename = scandir($dir, 1)[$index];
        $filename = pathinfo(basename($filename), PATHINFO_FILENAME);
        $index++;
    } while ($filename == '');
    $newfilename = intval($filename);
    return "" . ++$newfilename;
}

/**
 * Moves the uploaded file to the destination.
 *
 * @return string The path to the 
 */
function moveFile() //:string
{
    if (!isset($_FILES)) {
        return "";
    }

    global $path;
    $dir = $path['assets'] . "/exercise/";
    $filename = getFileName();
    $file =  basename($_FILES["file"]['name']);
    var_dump(pathinfo($file, PATHINFO_EXTENSION));
    var_dump(getimagesize($_FILES["file"]['tmp_name']));
}
