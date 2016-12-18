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
use AppBundle\Form\FiltreType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $list_article= $this->getDoctrine()->getRepository('AppBundle:Article')->findlast();

        return $this->render('blog/index.html.twig', [
          'list_article' => $list_article,
        ]);
    }

    /**
     * @Route("/articles/{page}", name="all_article", defaults={"page": "1"},)
     */
    public function AllArticleAction($page, Request $request)
    {
        $list_article= $this->getDoctrine()->getRepository('AppBundle:Article')->MyAllByOrder($page);

        $form = $this->get('form.factory')->create(FiltreType::class);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
          $list_article= $this->getDoctrine()->getRepository('AppBundle:Article')->MyAllFiltrage($page, $form['name']->getData());
        }

        return $this->render('blog/all.html.twig', [
          'list_article' => $list_article,
          'page' => $page,
          'totalpage' => $this->get('app.countarticle')->CountArticle(),
          'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/article/{id}", name="view_article")
     */
    public function ViewArticleAction($id, Request $request)
    {
        $article= $this->getDoctrine()->getRepository('AppBundle:Article')->findbyID($id);

        return $this->render('blog/view_article.html.twig',[
        'article' => $article,
      ]);
    }

}
