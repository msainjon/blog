<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CategorieRepository extends EntityRepository
{
  public function MyAll()
  {
    return $this->createQueryBuilder('c')
    ->getQuery()
    ->getResult();
  }

  public function findbyID($id)
  {
    return $this->createQueryBuilder('c')
    ->where('c.id = :id')
    ->setParameter('id', $id)
    ->getQuery()
    ->getSingleResult();
  }
}
