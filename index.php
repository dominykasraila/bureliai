<?php
require('bootstrap.php');
session_start();
$dev = false;

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

$permissions = [
	'list_clubs' => 'Admin',
	'list_supervisors' => 'Admin',
	'supervisor_form' => 'Admin',
	'supervisor_form_submit' => 'Admin',
];
if (in_array($action, $permissions)) {
	$userRepo = $entityManager->getRepository('User');
	$userHasPermision = (bool) $userRepo->authorizeAs($_SESSION['user'], $permissions[$action]);
	if (!$userHasPermision) {
		$action = 'forbid';
	}
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
		$userRepo = $entityManager->getRepository('User');
		$supervisors = $userRepo->getSupervisors();
		if ($dev) var_dump($supervisors);
		echo $twig->render('list_supervisors.twig', [
			'title' => 'Supervisors',
			'supervisors' => $supervisors,
		]);
		break;
	case 'list_clubs':
		$clubRepo = $entityManager->getRepository('Club');
		$clubs = $clubRepo->findAll();
		if ($dev) var_dump($clubs);
		echo $twig->render('list_clubs.twig', [
			'title' => 'Clubs',
			'clubs' => $clubs,
		]);
		break;
	case 'supervisor_form':
		if(!empty($_GET) && array_key_exists('id', $_GET)) {
			$supervisor = $entityManager->find('User', $_GET['id']);
			$title = 'Edit supervisor';
		} else {
			$supervisor = null;
			$title = 'Add supervisor';
		}
		echo $twig->render('supervisor_form.twig', [
			'title' => 'Edit supervisor',
			'supervisor' => $supervisor,
		]);
		break;
	case 'supervisor_form_submit':
		if (!empty($_POST)) {
			if(array_key_exists('id', $_POST)) {
				$supervisor = $entityManager->find('User', $_POST['id']);
			} else {
				$supervisor = new User();
			}
			$supervisor->setUsername($_POST['username'])
				->setPassword($_POST['password'])
				->setName($_POST['name'])
				->setSurname($_POST['surname'])
				->setRole(
					$entityManager->getRepository('Role')->findOneBy(['name' => 'Supervisor'])
				);
			$entityManager->persist($supervisor);
			$entityManager->flush();
			header('Location: index.php?action=list_supervisors');
		} else {
			header('Location: index.php');
		}
		break;
	case 'club_form':
		if(!empty($_GET) && array_key_exists('id', $_GET)) {
			$club = $entityManager->find('Club', $_GET['id']);
			$title = 'Edit club';
		} else {
			$club = null;
			$title = 'Add club';
		}
		echo $twig->render('club_form.twig', [
			'title' => 'Edit club',
			'club' => $club,
		]);
		break;
	case 'club_form_submit':
		if (!empty($_POST)) {
			if(array_key_exists('id', $_POST)) {
				$club = $entityManager->find('Club', $_POST['id']);
			} else {
				$club = new Club();
			}
			$club->setName($_POST['name'])
				->setSupervisor(
					$entityManager->getRepository('User')->findOneBy(['username' => $_POST['username']])
				);
			$entityManager->persist($club);
			$entityManager->flush();
			header('Location: index.php?action=list_clubs');
		} else {
			header('Location: index.php');
		}
		break;
	case 'forbid':
		echo $twig->render('error.twig', [
			'error_short' => "You don't have permission for that.",
			'error_long' => "Go back to index."
		]);
		break;
}
