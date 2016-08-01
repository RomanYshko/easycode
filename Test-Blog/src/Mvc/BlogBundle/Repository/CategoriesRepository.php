<?php
/**
 * Created by PhpStorm.
 * User: Rafidion Michael
 * Date: 27/03/2015
 * Time: 21:18
 */

namespace Mvc\BlogBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CategoriesRepository extends EntityRepository {


    public function findAllWithCount()
    {
        return $this->createQueryBuilder('c')
            ->select('p, c, COUNT(p) AS postCount')
            ->leftJoin('c.posts','p')
            ->groupBy('c.id')
            ->getQuery()
            ->getResult()
        ;
    }
}