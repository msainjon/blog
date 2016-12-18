<?php
namespace AppBundle\Twig;
use Doctrine\ORM\EntityManager;

class Commentaire extends \Twig_Extension
{
  private $doctrine;
  public function __construct($doctrine)
  {
      $this->doctrine = $doctrine;
  }

  public function getFunctions()
  {
    return [
        new \Twig_SimpleFunction(
            'Get_Count_Comment',
            [$this, 'GetCountComment']
        )
    ];
  }

  public function GetCountComment($id)
  {
    return $this
      ->doctrine
      ->getRepository('AppBundle:Commentaire')
      ->createQueryBuilder('c')
      ->select('COUNT(c)')
      ->where('c.article_id = :id')
      ->setParameter('id', $id)
      ->getQuery()
      ->getSingleScalarResult();
    ;
  }
}
