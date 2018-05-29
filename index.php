<?php
require('bootstrap.php');
session_start();
$dev = true;

if (array_key_exists('user',$_SESSION) && isset($_SESSION['user'])) {
    $user = $entityManager->find(User::class, $_SESSION['user']);

    if (! $user instanceof User) {
        $_SESSION['user'] = null;
        $action = 'login';
    }

    $action = 'dashboard';
} else {
    $action = 'login';
}

if (array_key_exists('action',$_POST)) {
    $action = $_POST['action'];
} else if (array_key_exists('action',$_GET)) {
    $action = $_GET['action'];
}
if ($dev) var_dump($_POST, $_GET, $_SESSION, $action);
switch ($action) {
    case 'login':

        $users = $dev ? $entityManager->getRepository('User')->findAll() : null;
        echo $twig->render('login.twig', [
            'title' => 'Login',
            'users' => $users
        ]);
        break;
    case 'authenticate':
        if (!empty($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $entityManager->getRepository('User')->authenticate($username, $password);
            if ($user instanceof User) {
                $_SESSION['user'] = $user->getId();
                header("Location: index.php?action=dashboard");
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
    case 'logout':
        $_SESSION['user'] = null;
        header("Location: index.php");
        break;
    case 'dashboard':
        echo $twig->render('dashboard.twig', [
            'title' => 'Dashboard',
            'user' => $user
        ]);
        break;
    case 'list_supervisors':
        // check for permission
        //
}
