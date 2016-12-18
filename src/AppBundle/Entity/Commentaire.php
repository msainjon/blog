<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\commentaireRepository")
 */
class commentaire
{
  /**
  * @ORM\Column(name="id", type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $id;

  /**
  *
  * @ORM\column(name="contenu", type="text")
  * @Assert\NotBlank()
  */
  private $contenu;

  /**
  *
  * @ORM\column(name="auteur", type="string")
  * @Assert\NotBlank()
  */
  private $auteur;

  /**
  *
  * @ORM\column(name="date", type="date")
  */
  private $date;

  /**
  * @ORM\ManyToOne(targetEntity="Article")
  * @ORM\JoinColumn(name="Article_id", referencedColumnName="id")
  */
  private $article_id;

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Contenu
     *
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of Contenu
     *
     * @param mixed contenu
     *
     * @return self
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of Auteur
     *
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of Auteur
     *
     * @param mixed auteur
     *
     * @return self
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param mixed date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }


    /**
     * Get the value of Article Id
     *
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * Set the value of Article Id
     *
     * @param mixed article_id
     *
     * @return self
     */
    public function setArticleId(Article $article_id)
    {
        $this->article_id = $article_id;

        return $this;
    }

}
