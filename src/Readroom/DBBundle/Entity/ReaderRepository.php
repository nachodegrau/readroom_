<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\EntityRepository;
/**
 * Description of UsuarioRepository
 *
 * @author nachodegrau
 */
class ReaderRepository extends EntityRepository{
    
    public function findUserByEmail($mail) {
        return $this->createQueryBuilder('u')->select()->where('u.reader_email=:mail')
                ->setParameter("mail", $mail)->getQuery()->getArrayResult();
    }
    
}

?>
