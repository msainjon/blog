<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
  public function MyAll()
  {
    return $this->createQueryBuilder('a')
    ->getQuery()
    ->getResult();
  }

  public function MyAllByOrder($page)
  {
    $offset=1*$page;
    if($page==1)  {
      $offset=0;
    }
    else {
      $offset=10*($page-1);
    }
    $limit=10*$page;

    return $this->createQueryBuilder('a')
    ->orderBy("a.id", "DESC")
    ->setFirstResult( $offset )
    ->setMaxResults( $limit )
    ->getQuery()
    ->getResult();
  }

  public function MyByCategorieByOrder($page, $categorie)
  {
    $offset=1*$page;
    if($page==1)  {
      $offset=0;
    }
    else {
      $offset=10*($page-1);
    }
    $limit=10*$page;

    return $this->createQueryBuilder('a')
    ->where('a.categorie = :categorie')
    ->orderBy("a.id", "DESC")
    ->setParameter('categorie', $categorie)
    ->setFirstResult( $offset )
    ->setMaxResults( $limit )
    ->getQuery()
    ->getResult();
  }
  public function MyAllFiltrage($page, $name, $tag)
  {
    $offset=1*$page;
    if($page==1)  {
      $offset=0;
    }
    else {
      $offset=10*($page-1);
    }
    $limit=10*$page;

    if($name!=null)
    {
      if($tag==null){
          $requete = $this->createQueryBuilder('a')
          ->where('a.name like :name')
          ->setParameter('name', '%'.$name.'%')
          ->orderBy("a.id", "DESC")
          ->setFirstResult( $offset )
          ->setMaxResults( $limit )
          ->getQuery()
          ->getResult();
      }
      else {
          $requete = $this->createQueryBuilder('a')
          ->leftjoin('a.tag', 't')
          ->where('t.id = :tag')
          ->setParameter('tag', $tag->getId())
          ->Andwhere('a.name like :name')
          ->setParameter('name', '%'.$name.'%')
          ->orderBy("a.id", "DESC")
          ->setFirstResult( $offset )
          ->setMaxResults( $limit )
          ->getQuery()
          ->getResult();
      }
    }
    else {
      if($tag==null){
        $requete = $this->createQueryBuilder('a')
        ->orderBy("a.id", "DESC")
        ->setFirstResult( $offset )
        ->setMaxResults( $limit )
        ->getQuery()
        ->getResult();
      }
      else {
        $requete = $this->createQueryBuilder('a')
        ->leftjoin('a.tag', 't')
        ->where('t.id = :tag')
        ->setParameter('tag', $tag->getId())
        ->orderBy("a.id", "DESC")
        ->setFirstResult( $offset )
        ->setMaxResults( $limit )
        ->getQuery()
        ->getResult();
      }
    }

    return $requete;
  }

  public function findbyID($id)
  {
    return $this->createQueryBuilder('a')
    ->where('a.id = :id')
    ->setParameter('id', $id)
    ->getQuery()
    ->getSingleResult();
  }

  public function findlast()
  {
    return $this->createQueryBuilder('a')
    ->orderBy("a.id", "DESC")
    ->setMaxResults(5)
    ->getQuery()
    ->getResult();
  }

  public function CountArticle()
  {
    $totalArticle = $this->createQueryBuilder('a')
    ->select('COUNT(a)')
    ->getQuery()
    ->getSingleScalarResult();

    return ceil($totalArticle/10);
  }
}
