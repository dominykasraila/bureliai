<?php
require('bootstrap.php');
$users = $entityManager->getRepository('User')->findAll();
foreach ($users as $user) {
	echo $user->getId() . ". "
	. $user->getName() . ' '
	. $user->getSurname() . ' '
	. $user->getUsername() . ' '
	. $user->getPassword() . ' '
	. $user->getRole()->getName();
}
