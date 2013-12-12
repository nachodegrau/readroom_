<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Readroom\DBBundle\Entity\Notification
 *
 * @ORM\Entity()
 * @ORM\Table(name="notifications")
 */
class Notification 
{
    
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="NotificationsType", inversedBy="notifications")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=false)
     */
    protected $type;
   
    
    
    public function __construct()
    {
      
    }
    
    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Readroom\DBBundle\Entity\Notification
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Set the value of type.
     *
     * @param integer $type
     * @return \Readroom\DBBundle\Entity\Notification
     */
    public function setType(NotificationsType $type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of type.
     *
     * @return \Readroom\DBBundle\Entity\NotificationsType
     */
    public function getType() {
        return $this->type;
    }
    
    /**
     * Set the value of type.
     *
     * @param integer $type
     * @return \Readroom\DBBundle\Entity\Notification
     */
    public function setReaderMaker(Reader $readerMaker = null) {
        $this->readerMaker = $readerMaker;

        return $this;
    }

    /**
     * Get the value of type.
     *
     * @return \Readroom\DBBundle\Entity\Reader
     */
    public function getReaderMaker() {
        return $this->readerMaker;
    }
    
    /**
     * Set the value of type.
     *
     * @param integer $type
     * @return \Readroom\DBBundle\Entity\Notification
     */
    public function setReaderReceiver(Reader $readerReceiver = null) {
        $this->readerReceiver = $readerReceiver;

        return $this;
    }

    /**
     * Get the value of type.
     *
     * @return \Readroom\DBBundle\Entity\Reader
     */
    public function getReaderReceiver() {
        return $this->readerReceiver;
    }
    
    
}

?>
