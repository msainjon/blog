<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository
{
  public function MyAll()
  {
    return $this->createQueryBuilder('t')
    ->getQuery()
    ->getResult();
  }

  public function findbyID($id)
  {
    return $this->createQueryBuilder('t')
    ->where('t.id = :id')
    ->setParameter('id', $id)
    ->getQuery()
    ->getSingleResult();
  }
}
