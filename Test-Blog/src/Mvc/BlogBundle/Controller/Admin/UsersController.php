<?php
/**
 * Created by PhpStorm.
 * User: Rafidion Michael
 * Date: 27/03/2015
 * Time: 03:27
 */

namespace Mvc\BlogBundle\Controller\Admin;


use Mvc\BlogBundle\Entity\User;
use Mvc\BlogBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller{

    public function em()
    {
        return $this->getDoctrine()->getManager();
    }

    public function save($data)
    {
        $this->em()->persist($data);
        $this->em()->flush();
    }

    public function indexAction()
    {
        $users = $this->em()->getRepository('MvcBlogBundle:User')->findBy([],['id'=>'desc']);
        return $this->render('MvcBlogBundle:Admin:Users/index.html.twig',['users'=>$users]);
    }

    public function addAction(Request $request)
    {
        $user = new User();
        $form = $this->get('form.factory')->create(
            new UserType(),
            $user,
            [
                'action'=>$this->generateUrl('users_admin_add'),
                'method'=>'POST',
            ]
        );

        if($form->handleRequest($request)->isValid())
        {
            $salt = md5(time());
            $hash = $this->get('security.encoder_factory')->getEncoder($user)->encodePassword($user->getPassword(), $salt);
            $user->setPassword($hash);

            $this->save($user);
            $request->getSession()->getFlashBag()->add('notice', 'User bien enregistré.');

            return $this->redirect($this->generateUrl('users_admin_index'));

        }

        return $this->render('MvcBlogBundle:Admin:Users/add.html.twig',['form'=>$form->createView()]);
    }


    public function updateAction($id, Request $request)
    {
        $user = $this->em()->getRepository('MvcBlogBundle:User')->find($id);
        $currentPassword = $user->getPassword();
        $form = $this->get('form.factory')->create(
            new UserType(),
            $user,
            [
                'action'=>$this->generateUrl('users_admin_update',['id'=>$user->getId()]),
                'method'=>'PUT',
            ]
        );
        if($form->handleRequest($request)->isValid())
        {
            if($user->getPassword())
            {
                $salt = md5(time());
                $hash = $this->get('security.encoder_factory')->getEncoder($user)->encodePassword($user->getPassword(), $salt);
                $user->setPassword($hash);
            }else{
                $user->setPassword($currentPassword);
            }

            $this->save($user);
            $request->getSession()->getFlashBag()->add('notice', 'User bien Modifié.');

            return $this->redirect($this->generateUrl('posts_admin_index'));
        }

        return $this->render('MvcBlogBundle:Admin:Users/add.html.twig',['form'=>$form->createView()]);
    }

    public function deleteAction($id)
    {

    }
}