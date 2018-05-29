<?php
// php .\add_club.php name supervisor_name
require('bootstrap.php');

if ($argc != 2 && $argc != 3) {
	echo "Usage:\n  php .\add_club.php name supervisor_name";
	exit;
}

if($argc > 1) {
	$club = new Club();
	$club->setName($argv[1]);
}
if ($argc == 3) {
	$supervisor = $entityManager->getRepository('User')->findOneBy([
		'username' => $argv[2]
	]);
	$club->setSupervisor($supervisor);
}
$entityManager->persist($club);
$entityManager->flush();
