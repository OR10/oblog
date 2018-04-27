<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home_page")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/main.html.twig');
    }

    /**
     * @Route("/posts", name="posts_page")
     */
    public function postsAction(Request $request)
    {
        return $this->render('default/test_layout.html');
    }

    /**
     * @Route("/about", name="about_page")
     */
    public function aboutAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
