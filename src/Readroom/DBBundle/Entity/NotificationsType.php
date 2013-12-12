<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Readroom\DBBundle\Entity\NotificationsType
 *
 * @ORM\Entity()
 * @ORM\Table(name="notificationsTypes")
 */
class NotificationsType {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $name;
    
    /**
     * @ORM\OneToMany(targetEntity="Notification", mappedBy="notificationsType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=false)
     */
    protected $notifications;
    
    public function __construct()
    {
        $this->notifications = new ArrayCollection();
    }
    
    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Readroom\DBBundle\Entity\NotificationsType
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
     * Set the value of id.
     *
     * @param integer $id
     * @return \Readroom\DBBundle\Entity\NotificationsType
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }
    
    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Readroom\DBBundle\Entity\NotificationsType
     */
    public function addNotifications(Notification $notification) {
        $this->notifications[] = $notification;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotifications() {
        return $this->notifications;
    }
}

?>
