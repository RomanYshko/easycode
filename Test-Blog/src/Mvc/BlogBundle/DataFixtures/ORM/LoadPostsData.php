<?php
/**
 * Created by PhpStorm.
 * User: Rafidion Michael
 * Date: 05/05/2015
 * Time: 12:52
 */

namespace Mvc\BlogBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mvc\BlogBundle\Entity\Post;

class LoadPostsData implements FixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for($i=1; $i <= 4; $i++)
        {

            $post = new Post();
            $post->setName('title'.$i);
            $post->setSlug('title-'.$i);
            $post->setContent('content '.$i);
            $post->setCreatedAt(new \DateTime());

            $manager->persist($post);
            $manager->flush();

        }
    }
}