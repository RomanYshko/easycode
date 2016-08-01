<?php
// src/YourProject/YourBundle/Entity/Comment.php

namespace Mvc\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mykees\CommentBundle\Entity\Comment as CommentParent;

/**
* @ORM\Entity
 * @ORM\Entity(repositoryClass="Mykees\CommentBundle\Repository\CommentRepository")
* @ORM\HasLifecycleCallbacks
*/
class Comment extends CommentParent
{
    /**
    * @var integer
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;


    /**
    * Get id
    *
    * @return integer
    */
    public function getId()
    {
        return $this->id;
    }
}