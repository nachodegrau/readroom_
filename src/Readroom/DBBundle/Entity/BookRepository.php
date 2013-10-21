<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository{
   
    public function findAllInArray() {
        return $this->createQueryBuilder('b')->orderBy('b.book_name')->getQuery()->getArrayResult();
    }
   
}

