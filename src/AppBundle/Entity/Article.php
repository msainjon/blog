<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="Article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{
  /**
  * @ORM\Column(name="id", type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $id;

  /**
  * @var string
  *
  * @ORM\column(name="name", type="string", length=200)
  * @Assert\NotBlank()
  * @Assert\length(max="200")
  */
  private $name;

  /**
  * @var string
  *
  * @ORM\column(name="contenu", type="text")
  * @Assert\NotBlank()
  */
  private $contenu;

  /**
  * @ORM\ManyToOne(targetEntity="User")
  * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
  */
  private $auteur;

  /**
  * @var string
  *
  * @ORM\column(name="date", type="date")
  * @Assert\NotBlank()
  */
  private $date;

  /**
  * @ORM\ManyToOne(targetEntity="Categorie")
  * @ORM\JoinColumn(name="Categorie_id", referencedColumnName="id")
  */
  private $categorie;

  /**
   * Many Users have Many Groups.
   * @ORM\ManyToMany(targetEntity="Tag")
   * @ORM\JoinTable(name="article_tag",
   *      joinColumns={@ORM\JoinColumn(name="article_id", referencedColumnName="id")},
   *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
   *      )
   */
  private $tag;

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
     * Get the value of Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param string name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Contenu
     *
     * @return text
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of Contenu
     *
     * @param text contenu
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
    public function setAuteur(User $auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param date date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of Categorie
     *
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of Categorie
     *
     * @param mixed Categorie
     *
     * @return self
     */
    public function setCategorie(categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function __construct()
    {
      $this->tag = new ArrayCollection();
    }

    // Notez le singulier, on ajoute une seule catégorie à la fois
    public function addTag(Tag $tag)
    {
      // Ici, on utilise l'ArrayCollection vraiment comme un tableau
      $this->tag[] = $tag;
    }

    public function removeTag(Tag $tag)
    {
      // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
      $this->tag->removeElement($tag);
    }

    // Notez le pluriel, on récupère une liste de catégories ici !
    public function getTag()
    {
      return $this->tag;
    }

}
