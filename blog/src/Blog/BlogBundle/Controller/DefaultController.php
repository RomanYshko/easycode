<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use 

class DefaultController extends Controller
{
    public function showAction($productId)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findOneByIdJoinedToCategory($productId);

        $category = $product->getCategory();

        // ...
    
        return $this->render('BlogBlogBundle:Default:index.html.twig');
    }
}
