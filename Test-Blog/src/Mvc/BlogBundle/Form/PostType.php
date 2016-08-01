<?php

namespace Mvc\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',[
                'label'=>'Name:'
            ])
            ->add('slug','text',[
                'label'=>'Slug:',
                'required'=>false
            ])
            ->add('content','textarea',[
                'label'=>'Content:'
            ])
            ->add('category','entity',[
                'class'=>'MvcBlogBundle:Category',
                'property'=>'name',
                'multiple'=>false,
                'expanded'=>false
            ])
            ->add('user','entity',[
                'class'=>'MvcBlogBundle:User',
                'property'=>'username',
                'multiple'=>false,
                'expanded'=>false
            ])
            ->add('tags','mk_tag',[
                'label'=>'Les Tags:',
            ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mvc\BlogBundle\Entity\Post',
            'em'         => 'Doctrine\Common\Persistence\ObjectManager',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mvc_blogbundle_post';
    }
}
