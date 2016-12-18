<?php
namespace AppBundle\Services;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;

class CountArticle
{
  private $doctrine;
  public function __construct($doctrine)
  {
      $this->doctrine = $doctrine;
  }

  public function CountArticle()
  {
    return $this
        ->doctrine
        ->getRepository('AppBundle:Article')
        ->CountArticle()
    ;
  }

}
