<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/auth/user_info.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/viewModel/ExerciseViewModel.php');
$user = getActiveUser();
$viewModel = new ExerciseViewModel();

// if ($user == null) {
//     http_response_code(401);
// }

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'POST':
        # code...
        break;
    case 'PUT':
        $viewModel->create(new Exercise(0, 1, "title", "description", "solution", "today", "today", 1, 1, 1));
        break;

    default:
        http_response_code(405);
}
