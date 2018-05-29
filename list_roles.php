<?php
require('bootstrap.php');
$roles = $entityManager->getRepository('Role')->findAll();
foreach ($roles as $role) {
	echo $role->getId() . ". " . $role->getName() . "\n";
}
