<?php
// php .\add_user.php username password name surname role
require('bootstrap.php');

if ($argc != 6) {
	echo "Usage:\n  php .\add_user.php username password name surname role";
	exit;
}

$role = $entityManager->getRepository('Role')->findOneBy(['name' => $argv[5] ]);

$user = new User();
$user->setUsername($argv[1])
	->setPassword($argv[2])
	->setName($argv[3])
	->setSurname($argv[4])
	->setRole($role);
$entityManager->persist($user);
$entityManager->flush();
