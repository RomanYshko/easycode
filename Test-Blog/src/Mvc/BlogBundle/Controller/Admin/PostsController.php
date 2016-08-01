<?php
/**
 * Created by PhpStorm.
 * User: Rafidion Michael
 * Date: 26/03/2015
 * Time: 23:53
 */

namespace Mvc\BlogBundle\Controller\Admin;


use Doctrine\ORM\Tools\Pagination\Paginator;
use Mvc\BlogBundle\Entity\Category;
use Mvc\BlogBundle\Entity\Post;
use Mvc\BlogBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PostsController extends Controller{

    public function em()
    {
        return $this->getDoctrine()->getManager();
    }

    public function indexAction(Request $request)
    {
        $p = $this->getDoctrine()->getManager()->getRepository('MvcBlogBundle:Post')->findAllQuery();
        $posts = $this->paginate($request, $p);

        return $this->render('MvcBlogBundle:Admin:Posts/index.html.twig',['posts'=>$posts]);
    }

    public function addAction(Request $request)
    {
        $post = new Post();
        $form = $this->get('form.factory')->create(
            new PostType(),
            $post,
            [
                'action'=>$this->generateUrl('posts_admin_add'),
                'method'=>'POST'
            ]
        );

        if($form->handleRequest($request)->isValid())
        {
            $this->save($post);
            $request->getSession()->getFlashBag()->add('notice', 'Article bien enregistré.');

            return $this->redirect($this->generateUrl('posts_admin_index'));
        }

        return $this->render('MvcBlogBundle:Admin:Posts/add.html.twig',['form'=>$form->createView()]);
    }

    public function updateAction($id, Request $request)
    {
        $post = $this->em()->getRepository('MvcBlogBundle:Post')->find($id);
        $category_id = $post->getCategory() != null ? $post->getCategory()->getId() : null;
        $this->get('mk.tag_manager')->findTagRelation($post);
        $form = $this->get('form.factory')->create(
            new PostType(),
            $post,
            [
                'action'=>$this->generateUrl('posts_admin_update',['id'=>$post->getId()]),
                'method'=>'PUT'
            ]
        );
        if($form->handleRequest($request)->isValid())
        {
            $this->save($post);
            $request->getSession()->getFlashBag()->add('notice', 'Article bien Modifié.');

            return $this->redirect($this->generateUrl('posts_admin_index'));
        }

        return $this->render('MvcBlogBundle:Admin:Posts/add.html.twig',['form'=>$form->createView(),"post"=>$post]);
    }

    public function deleteAction($id)
    {
        $post = $this->em()->getRepository('MvcBlogBundle:Post')->find($id);
        $this->em()->remove($post);
        $this->em()->flush();

        return $this->redirect($this->generateUrl('posts_admin_index'));
    }

    public function save($data)
    {
        $this->em()->persist($data);
        $this->em()->flush();
    }


    protected function paginate(Request $request, $query, $limit = 5){
        $page = (int) $request->get('page') ?: 1;
        $query
            ->setFirstResult(($page-1) * $limit)
            ->setMaxResults($limit)
        ;
        return new Paginator($query, true);
    }
/*
    public function counterCache($category_id=null,$current_category_id=null,$category_delete_id=null)
    {
        if(!$current_category_id)
        {
            $category = $this->em()->getRepository('MvcBlogBundle:Category')->find($category_id);
            $category->setPostCount($category->getPostCount() + 1);

            $this->save($category);

        }elseif($current_category_id && $category_id){

            $category = $this->em()->getRepository('MvcBlogBundle:Category')->find($current_category_id);
            if($category->getId() != $category_id)
            {
                $category->setPostCount($category->getPostCount() - 1);
                $this->save($category);

                $newCategory = $this->em()->getRepository('MvcBlogBundle:Category')->find($category_id);
                $newCategory->setPostCount($newCategory->getPostCount() + 1);
                $this->save($newCategory);

            }elseif($category->getId() == $category_id)
            {
                $countPosts = current($this->em()->getRepository('MvcBlogBundle:Post')->findCountForCategory($category_id));

                if((int) $countPosts["PostCount"] != $category->getPostCount())
                {
                    $category->setPostCount($category->getPostCount() + 1);
                    $this->save($category);
                }
            }
        }elseif(isset($category_delete_id)){
            $category = $this->em()->getRepository('MvcBlogBundle:Category')->find($category_delete_id);
            $category->setPostCount($category->getPostCount() - 1);
            $this->save($category);
        }
    }
*/
}
