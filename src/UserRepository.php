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
}
