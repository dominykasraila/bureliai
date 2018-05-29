<?php
require('bootstrap.php');

echo $twig->render('login.twig', [
	'title' => 'Login'
]);
