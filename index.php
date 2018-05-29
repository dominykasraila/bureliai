<?php
require('bootstrap.php');

echo $twig->render('base.twig', [
	'title' => "This is a test."
]);
