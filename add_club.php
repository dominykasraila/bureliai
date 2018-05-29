<?php
// php .\add_club.php name supervisor_name
require('bootstrap.php');

if($argc != 3){
	echo "Usage:\n  php .\add_club.php name supervisor_name";
	exit;
}

$supervisor = $entityManager->getRepository('User')->findOneBy([
	'username' => $argv[2]
]);

$club = new Club();
$club->setName($argv[1])
	->setSupervisor($supervisor);
$entityManager->persist($club);
$entityManager->flush();
