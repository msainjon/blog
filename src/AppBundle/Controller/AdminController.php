<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Tag;
use AppBundle\Form\TagType;
use AppBundle\Entity\Categorie;
use AppBundle\Form\CategorieType;
use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;

class AdminController extends Controller
{
    /**
     * @Route("/administration", name="menu_admin")
     */
    public function MenuAdminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('admin/menu.html.twig');
    }

    /**
     * @Route("/administration/article", name="admin_article")
     */
    public function ArticleMenuAction(Request $request)
    {
        $list_article= $this->getDoctrine()->getRepository('AppBundle:Article')->MyAll();

        return $this->render('admin/menu_article.html.twig' ,[
          'list_article' => $list_article,
        ]);
    }

    /**
     * @Route("/administration/article/delete/{id}", name="delete_article")
     */
    public function ArticleDeleteAction($id,Request $request)
    {
      $article = $this->getDoctrine()->getRepository('AppBundle:Article')->findbyID($id);
      $em = $this->getDoctrine()->getEntityManager();
      $em->remove($article);
      $em->flush();

      return $this->redirectToRoute('admin_article');
    }

    /**
     * @Route("/administration/create/article", name="create_article")
     */
    public function ArticleCreateAction(Request $request)
    {
        $Article = new Article();
        $form = $this->get('form.factory')->create(ArticleType::class, $Article);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
          $em = $this->getDoctrine()->getManager();
          $Article->setAuteur($this->getUser());

          $em->persist($Article);
          $em->flush($Article);

          return $this->redirectToRoute('admin_article');
        }

        return $this->render('admin/create_article.html.twig',[
          'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/administration/categorie", name="admin_categorie")
     */
    public function CategorieMenuAction(Request $request)
    {
        $Categorie = new Categorie();
        $form = $this->get('form.factory')->create(CategorieType::class, $Categorie);

        $list_categorie= $this->getDoctrine()->getRepository('AppBundle:Categorie')->MyAll();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
          $em = $this->getDoctrine()->getManager();
          $em->persist($Categorie);
          $em->flush($Categorie);

          return $this->redirectToRoute('admin_categorie');
        }
        return $this->render('admin/menu_categorie.html.twig', [
          'form' => $form->createView(),
          'list_categorie' => $list_categorie,
        ]);
    }

    /**
     * @Route("/administration/categorie/delete/{id}", name="delete_categorie")
     */
    public function categorieDeleteAction($id,Request $request)
    {
      $categorie = $this->getDoctrine()->getRepository('AppBundle:Categorie')->findbyID($id);
      $em = $this->getDoctrine()->getEntityManager();
      $em->remove($categorie);
      $em->flush();

      return $this->redirectToRoute('admin_categorie');
    }

    /**
     * @Route("/administration/tag", name="admin_tag")
     */
    public function TagMenuAction(Request $request)
    {
        $tag = new tag();
        $form = $this->get('form.factory')->create(TagType::class, $tag);

        $list_tag= $this->getDoctrine()->getRepository('AppBundle:Tag')->MyAll();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
          $em = $this->getDoctrine()->getManager();
          $em->persist($tag);
          $em->flush($tag);

          return $this->redirectToRoute('admin_tag');
        }

        return $this->render('admin/menu_tag.html.twig', [
          'form' => $form->createView(),
          'list_tag' => $list_tag,
        ]);
    }

    /**
     * @Route("/administration/tag/delete/{id}", name="delete_tag")
     */
    public function TagDeleteAction($id,Request $request)
    {
      $tag = $this->getDoctrine()->getRepository('AppBundle:Tag')->findbyID($id);
      $em = $this->getDoctrine()->getEntityManager();
      $em->remove($tag);
      $em->flush();

      return $this->redirectToRoute('admin_tag');
    }


}
