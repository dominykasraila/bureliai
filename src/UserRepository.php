<?php
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function authenticate($username, $password)
    {
        $dql = "SELECT u FROM User u WHERE u.username = :username AND u.password = :password";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('username', $username)
            ->setParameter('password', $password);
        return $query->getOneOrNullResult();
    }

    public function authorizeAs($user_id, $role_name) {
        $dql = "SELECT COUNT(u) FROM User u JOIN u.role r WHERE u.id = :user_id AND r.name = :role_name";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('user_id', $user_id)
            ->setParameter('role_name', $role_name);
        return $query->getSingleScalarResult();
    }

	public function getSupervisors()
    {
        $dql = "SELECT u FROM User u JOIN u.role r WHERE r.name = 'Supervisor'";

        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }

    public function getSupervisor($supervisor_username)
    {
        $dql = "SELECT u FROM User u JOIN u.role r WHERE u.username = :supervisor_username AND r.name = 'Supervisor'";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('superviso_name', $supervisor_username);
        return $query->getOneOrNullResult();
    }
}
