<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/src/inc/config.php");
require_once($path['auth'] . '/user_info.php');
require_once($path['src'] . '/viewModel/UserViewModel.php');

$user = getActiveUser();

if ($user == null) {
    http_response_code(401);
}

if ($_SERVER["REQUEST_METHOD"] == 'POST' && testUserInput()) {
    moveFileToTemp($_POST['user_id']);
    moveFileToUser($_POST['user_id']);
    insertFilePathIntoDB($_POST['user_id']);
    redirectToUrl("../../www/profile.php");
} else {
    //http_response_code(405);
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
    $basePath = $path['assets'] . "/profilepic/";
    $files = glob($basePath . $id . ".*");
    for ($i = 0; $i < sizeof($files); $i++) {
        $files[$i] = explode("assets/", $files[$i])[1];
    }
    var_dump($files);
    $viewModel = new UserViewModel();
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
    var_dump($_POST['picture']);
    //$picture = isset($_POST['picture']);
    return $user_id;
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
    var_dump($_FILES['file']['name']);
    $file_extention = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    
    $destination = $path['assets'] . '/temp/' . $user_id . '.' . $file_extention;
    move_uploaded_file($_FILES['file']['tmp_name'], $destination);
}

/**
 * Moves the uploaded file into assets/exercise named after the corresponding exercise ID in the database.
 *
 * @param integer $user_id The ID of the user who uploaded the file
 * @return void
 */
function moveFileToUser(int $user_id)
{
    global $path;
    $file_extention = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $temp = $path['assets'] . '/temp/' . $user_id . '.' . $file_extention;
    $user = $path['assets'] . '/profilepic/' . $user_id . '.' . $file_extention;
    rename($temp, $user);
}
?>