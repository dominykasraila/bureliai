<?php
use Doctrine\ORM\EntityRepository;

class ClubRepository extends EntityRepository
{
    public function getClubBySupervisor($supervisor_id)
    {
        $dql = "SELECT c FROM Club c JOIN c.supervisor s WHERE s.id = :supervisor_id";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('supervisor_id', $supervisor_id);
        return $query->getOneOrNullResult();
    }
}
