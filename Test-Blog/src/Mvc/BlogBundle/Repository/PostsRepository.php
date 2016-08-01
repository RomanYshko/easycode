<?php
/**
 * Created by PhpStorm.
 * User: Rafidion Michael
 * Date: 27/03/2015
 * Time: 19:05
 */

namespace Mvc\BlogBundle\Repository;


use Doctrine\ORM\EntityRepository;


class PostsRepository extends EntityRepository{


    public function findAllQuery($conditions=array())
    {
        $query = $this->createQueryBuilder('p')
            ->select('p, c, u')
            ->leftJoin('p.category','c')
            ->leftJoin('p.user','u')
            ->orderBy('p.createdAt', 'DESC')
        ;
        foreach($conditions as $k=>$v)
        {
            $query->andWhere("$k = '$v'");
        }

        return $query->getQuery();
    }


    public function findLast($limit=2)
    {
        return $this->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }


    public function findById($id)
    {
        return $this->createQueryBuilder('p')
            ->select('p,u,c')
            ->leftJoin('p.category','c')
            ->leftJoin('p.user','u')
            ->where('p.id = :id')
            ->setParameter('id',$id)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

//    public function findCountForCategory($category_id)
//    {
//        $query = $this->createQueryBuilder('p')
//            ->select('COUNT(p) as PostCount')
//            ->leftJoin('p.category', 'c')
//            ->where('c.id = :category_id')
//            ->setParameter('category_id', $category_id)
//            ->getQuery();
//
//        return $query->getResult();
//    }
}