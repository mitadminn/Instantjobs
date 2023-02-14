<?php

$errors = [];
$data = [];

if (empty($_POST['skills'])) {
    $errors['skills'] = 'skills is required.';
}

if (empty($_POST['intrest'])) {
    $errors['intrest'] = 'skills is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);

?>