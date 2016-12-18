<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CommentaireRepository extends EntityRepository
{
  public function findbyArticle($id)
  {
    return $this->createQueryBuilder('c')
    ->where('c.article_id = :id')
    ->setParameter('id', $id)
    ->getQuery()
    ->getResult();
  }
}
