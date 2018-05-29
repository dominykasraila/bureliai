<?php
// php .\add_role.php name
require('bootstrap.php');

if($argc != 2){
	echo "Usage:\n  php .\add_role.php name";
	exit;
}

$role = new Role();
$role->setName($argv[1]);
$entityManager->persist($role);
$entityManager->flush();
