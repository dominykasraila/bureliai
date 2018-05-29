<?php
require('bootstrap.php');
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
