<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/login", name="admin_login")
     */
    public function loginAction(Request $request)
    {
        return $this->render('user/login.html.twig');
    }
    /**
     * @Route("/login_check", name="admin_check")
     */
    public function loginCheckAction(Request $request)
    {
    }

    /**
     * @Route("/logout", name="admin_logout")
     */
    public function logoutAction(Request $request)
    {
    }
}
