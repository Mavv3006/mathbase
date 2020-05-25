<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/viewModel/UserViewModel.php');

$user_view_model = new UserViewModel();

$user_view_model->change_username($_POST['id'], $_POST['new_username']);

?>