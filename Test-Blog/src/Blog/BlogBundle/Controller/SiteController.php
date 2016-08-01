<?php


namespace Blog\BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('Blog/BlogBundle:Site:index.html.twig');
    }

}