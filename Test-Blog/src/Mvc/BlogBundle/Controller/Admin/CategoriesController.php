<?php
/**
 * Created by PhpStorm.
 * User: Rafidion Michael
 * Date: 27/03/2015
 * Time: 02:55
 */

namespace Mvc\BlogBundle\Controller\Admin;


use Mvc\BlogBundle\Entity\Category;
use Mvc\BlogBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoriesController extends Controller{

    public function em()
    {
        return $this->getDoctrine()->getManager();
    }

    public function indexAction()
    {
        $categories = $this->em()->getRepository('MvcBlogBundle:Category')->findBy([],['id'=>'desc']);
        return $this->render('MvcBlogBundle:Admin:Categories/index.html.twig',['categories'=>$categories]);
    }

    public function addAction(Request $request)
    {
        $category = new Category();
        $form = $this->get('form.factory')->create(
            new CategoryType(),
            $category,
            [
                'action'=>$this->generateUrl('categories_admin_add'),
                'method'=>'POST',
            ]
        );

        if($form->handleRequest($request)->isValid())
        {
            $this->save($category);
            $request->getSession()->getFlashBag()->add('notice', 'Categorie bien enregistré.');

            return $this->redirect($this->generateUrl('categories_admin_index'));
        }

        return $this->render('MvcBlogBundle:Admin:Categories/add.html.twig',['form'=>$form->createView()]);
    }

    public function updateAction($id)
    {

    }

    public function deleteAction($id)
    {

    }


    public function save($data)
    {
        $this->em()->persist($data);
        $this->em()->flush();
    }
}