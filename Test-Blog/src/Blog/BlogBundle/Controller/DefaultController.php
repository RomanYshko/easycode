<?php

namespace Blog\BlogBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;




use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Blog\BlogBundle\Entity\Category;


class DefaultController extends Controller
{
    public function indexAction()
    {

        $categories = $this->getDoctrine()->getManager()->getRepository('BlogBlogBundle:Category')->findAll();
        $products = $this->getDoctrine()->getManager()->getRepository('BlogBlogBundle:Product')->findAll();

    
        return $this->render('BlogBlogBundle:Default:index.html.twig',[
            'categories' => $categories,
            'products' => $products,
        ]);
    }

//    public function getPostByCategoryAction($slug,Request $request)
//    {
//        return $this->getProduct($request,array('c.slug'=>$slug));
//    }
}


