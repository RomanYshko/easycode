<?php
/**
 * Created by PhpStorm.
 * User: Rafidion Michael
 * Date: 30/03/2015
 * Time: 23:42
 */

namespace Mvc\BlogBundle\Repository;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class TagsRepository extends EntityRepository{


    public function getData($ref_id)
    {
        if($ref_id)
        {
            return $this
                ->createQueryBuilder('t')
                ->leftJoin('t.tagRelation','tr')
                ->where('tr.refId = :ref_id')
                ->setParameter('ref_id',$ref_id)
                ->getQuery()
                ->getResult()
                ;
        }else{
            return null;
        }
    }

}