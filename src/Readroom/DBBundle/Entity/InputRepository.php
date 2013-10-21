<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\EntityRepository;

class InputRepository extends EntityRepository{
   
    public function findAllByBookAndSpineInArray($book, $spine) {
        return $this->createQueryBuilder('i')->select()->where('i.book=:idBook AND i.book_spine=:spine')
                ->setParameter("idBook", $book)->setParameter("spine", $spine)->getQuery()->getArrayResult();
    }
   
}

