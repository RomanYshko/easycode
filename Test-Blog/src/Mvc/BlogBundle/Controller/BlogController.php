<?php

namespace Mvc\BlogBundle\Controller;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Mvc\BlogBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{

    public function em()
    {
        return $this->getDoctrine()->getManager();
    }

    public function save($data)
    {
        $this->em()->persist($data);
        $this->em()->flush();
    }

    public function indexAction(Request $request)
    {
        return $this->getPosts($request);
    }

    public function showAction(Request $request, $slug)
    {
        $post = $this->getDoctrine()->getManager()->getRepository('MvcBlogBundle:Post')->findOneBy(['slug'=>$slug]);

        $form = $this->get('mykees.comment.manager')->createForm($post,[
            'username'=>'Nom:',
            'email'=>'Email:'
        ]);
        $comments = $this->get('mykees.comment.query.manager')->findComments($post);
        $this->get('mk.tag_manager')->findTagRelation($post);

        return $this->render('MvcBlogBundle:Blog:show.html.twig',[
            'post'=>$post,
            'form'=>$form->createView(),
            'comments'=>$comments
        ]);
    }

    public function getPostByCategoryAction($slug,Request $request)
    {
        return $this->getPosts($request,array('c.slug'=>$slug));
    }


    public function sidebarAction()
    {
        $categories = $this->getDoctrine()->getManager()->getRepository('MvcBlogBundle:Category')->findAllWithCount();
        $posts = $this->getDoctrine()->getManager()->getRepository('MvcBlogBundle:Post')->findLast();

        return $this->render('MvcBlogBundle::elements/sidebar.html.twig',['posts'=>$posts,'categories'=>$categories]);
    }


    public function getPosts(Request $request,$conditions=array())
    {
        $p = $this->getDoctrine()->getManager()->getRepository('MvcBlogBundle:Post')->findAllQuery($conditions);
        $this->get('mk.tag_manager')->findTagRelation($p->getResult());
        $posts = $this->paginate($request, $p);

        return $this->render('MvcBlogBundle:Blog:index.html.twig',['posts'=>$posts]);
    }


    protected function paginate(Request $request, $query, $limit = 5){
        $page = (int) $request->get('page') ?: 1;
        $query
            ->setFirstResult(($page-1) * $limit)
            ->setMaxResults($limit)
        ;
        return new Paginator($query, true);
    }

}
