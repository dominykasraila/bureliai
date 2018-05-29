<?php
require('bootstrap.php');
$action = 'login';
if (array_key_exists('action',$_POST)) {
    $action = $_POST['action'];
} else if (array_key_exists('action',$_GET)) {
    $action = $_GET['action'];
}

switch ($action) {
    case 'login':
        echo $twig->render('login.twig', [
            'title' => 'Login'
        ]);
        break;
    case 'authenticate':
        if (!empty($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $entityManager->getRepository('User')->authenticate($username, $password);
            if ($user instanceof User) {
                session_start();
                $_SESSION['user'] = $user->getId();
            } else {
                echo $twig->render('error.twig', [
                    'error_short' => "Invalid username or password.",
                ]);
            }
        } else {
            echo $twig->render('error.twig', [
                'error_short' => "Please login.",
                'error_long' => "Go back to index."
            ]);
        }
        break;
}
