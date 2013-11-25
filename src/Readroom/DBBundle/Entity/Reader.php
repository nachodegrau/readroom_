<?php

namespace Readroom\DBBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Readroom\DBBundle\Entity\Reader
 *
 * @ORM\Table(name="readers")
 * @ORM\Entity(repositoryClass="Readroom\DBBundle\Entity\ReaderRepository")
 */
class Reader extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $reader_name;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $reader_second_name;

        /**
	 * @ORM\Column(type="string", length=250, nullable=true)
	 */
	protected $reader_image = "undefined.jpg";

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $reader_city;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $reader_country;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $reader_telephone;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $is_facebook = 0;

	/**
	 * @ORM\OneToMany(targetEntity="Complaint", mappedBy="reader")
	 * @ORM\JoinColumn(name="reader_id", referencedColumnName="id", nullable=false)
	 */
	protected $complaints;

	/**
	 * @ORM\OneToMany(targetEntity="Input", mappedBy="reader")
	 * @ORM\JoinColumn(name="reader_id", referencedColumnName="id", nullable=false)
	 */
	protected $inputs;

	/**
	 * @ORM\OneToMany(targetEntity="Loan", mappedBy="reader")
	 * @ORM\JoinColumn(name="source_reader_id", referencedColumnName="id", nullable=false)
	 */
	protected $loans;

	/**
	 * @ORM\OneToMany(targetEntity="Order", mappedBy="reader")
	 * @ORM\JoinColumn(name="reader_id", referencedColumnName="id", nullable=false)
	 */
	protected $orders;

	/**
	 * @ORM\OneToMany(targetEntity="Present", mappedBy="reader")
	 * @ORM\JoinColumn(name="source_reader_id", referencedColumnName="id", nullable=false)
	 */
	protected $presents;

	/**
	 * @ORM\OneToMany(targetEntity="Reply", mappedBy="reader")
	 * @ORM\JoinColumn(name="reader_id", referencedColumnName="id", nullable=false)
	 */
	protected $replies;

	/**
	 * @ORM\ManyToMany(targetEntity="Book", mappedBy="readers")
	 */
	protected $books;

	/**
	 * @ORM\ManyToMany(targetEntity="Language", mappedBy="readers")
	 */
	protected $languages;
        
        /**
        * @ORM\ManyToMany(targetEntity="Reader", mappedBy="myFriends")
        **/
       private $friendsWithMe;

       /**
        * @ORM\ManyToMany(targetEntity="reader", inversedBy="friendsWithMe")
        * @ORM\JoinTable(name="friends",
        *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
        *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
        *      )
        **/
       private $myFriends;

	public function __construct()
	{
                parent::__construct();
		$this->complaints = new ArrayCollection();
		$this->inputs = new ArrayCollection();
		$this->loans = new ArrayCollection();
		$this->orders = new ArrayCollection();
		$this->presents = new ArrayCollection();
		$this->replies = new ArrayCollection();
		$this->books = new ArrayCollection();
		$this->languages = new ArrayCollection();
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of id.
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of reader_name.
	 *
	 * @param string $reader_name
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function setReaderName($reader_name)
	{
		$this->reader_name = $reader_name;

		return $this;
	}

	/**
	 * Get the value of reader_name.
	 *
	 * @return string
	 */
	public function getReaderName()
	{
		return $this->reader_name;
	}

	/**
	 * Set the value of reader_second_name.
	 *
	 * @param string $reader_second_name
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function setReaderSecondName($reader_second_name)
	{
		$this->reader_second_name = $reader_second_name;

		return $this;
	}

	/**
	 * Get the value of reader_second_name.
	 *
	 * @return string
	 */
	public function getReaderSecondName()
	{
		return $this->reader_second_name;
	}

        /**
	 * Set the value of password.
	 *
	 * @param string password
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function setReaderImage($reader_imafe)
	{
		$this->reader_image = $reader_imafe;

		return $this;
	}

	/**
	 * Get the value of password.
	 *
	 * @return string
	 */
	public function getReaderImage()
	{
		return $this->reader_image;
	}

	/**
	 * Set the value of reader_city.
	 *
	 * @param string $reader_city
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function setReaderCity($reader_city)
	{
		$this->reader_city = $reader_city;

		return $this;
	}

	/**
	 * Get the value of reader_city.
	 *
	 * @return string
	 */
	public function getReaderCity()
	{
		return $this->reader_city;
	}

	/**
	 * Set the value of reader_country.
	 *
	 * @param string $reader_country
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function setReaderCountry($reader_country)
	{
		$this->reader_country = $reader_country;

		return $this;
	}

	/**
	 * Get the value of reader_country.
	 *
	 * @return string
	 */
	public function getReaderCountry()
	{
		return $this->reader_country;
	}

	/**
	 * Set the value of reader_telephone.
	 *
	 * @param string $reader_telephone
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function setReaderTelephone($reader_telephone)
	{
		$this->reader_telephone = $reader_telephone;

		return $this;
	}

	/**
	 * Get the value of reader_telephone.
	 *
	 * @return string
	 */
	public function getReaderTelephone()
	{
		return $this->reader_telephone;
	}

	/**
	 * Set the value of is_facebook.
	 *
	 * @param integer $is_facebook
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function setIsFacebook($is_facebook)
	{
		$this->is_facebook = $is_facebook;

		return $this;
	}

	/**
	 * Get the value of is_facebook.
	 *
	 * @return integer
	 */
	public function getIsFacebook()
	{
		return $this->is_facebook;
	}

	/**
	 * Add Complaint entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Complaint $complaint
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function addComplaint(Complaint $complaint)
	{
		$this->complaints[] = $complaint;

		return $this;
	}

	/**
	 * Get Complaint entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getComplaints()
	{
		return $this->complaints;
	}

	/**
	 * Add Input entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Input $input
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function addInput(Input $input)
	{
		$this->inputs[] = $input;

		return $this;
	}

	/**
	 * Get Input entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getInputs()
	{
		return $this->inputs;
	}

	/**
	 * Add Loan entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Loan $loan
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function addLoan(Loan $loan)
	{
		$this->loans[] = $loan;

		return $this;
	}

	/**
	 * Get Loan entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getLoans()
	{
		return $this->loans;
	}

	/**
	 * Add Order entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Order $order
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function addOrder(Order $order)
	{
		$this->orders[] = $order;

		return $this;
	}

	/**
	 * Get Order entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getOrders()
	{
		return $this->orders;
	}

	/**
	 * Add Present entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Present $present
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function addPresent(Present $present)
	{
		$this->presents[] = $present;

		return $this;
	}

	/**
	 * Get Present entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getPresents()
	{
		return $this->presents;
	}

	/**
	 * Add Reply entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Reply $reply
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function addReply(Reply $reply)
	{
		$this->replies[] = $reply;

		return $this;
	}

	/**
	 * Get Reply entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getReplies()
	{
		return $this->replies;
	}

	/**
	 * Add Book entity to collection.
	 *
	 * @param \Readroom\DBBundle\Entity\Book $book
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function addBook(Book $book)
	{
		$this->books[] = $book;

		return $this;
	}

	/**
	 * Get Book entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getBooks()
	{
		return $this->books;
	}

	/**
	 * Add Language entity to collection.
	 *
	 * @param \Readroom\DBBundle\Entity\Language $language
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function addLanguage(Language $language)
	{
		$this->languages[] = $language;

		return $this;
	}

	/**
	 * Get Language entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getLanguages()
	{
		return $this->languages;
	}
        
        /**
	 * Add Coleccion entity to collection.
	 *
	 * @param \Witbeat\DBBundle\Entity\Usuario $friend
	 * @return \Witbeat\DBBundle\Entity\Usuario
	 */
	public function addFriendWithMe(Usuario $friend)
	{
		$this->friendsWithMe[] = $friend;

		return $this;
	}

	/**
	 * Get Coleccion entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getFriendWithMe()
	{
		return $this->friendsWithMe;
	}
        
        /**
	 * Add Coleccion entity to collection.
	 *
	 * @param \Witbeat\DBBundle\Entity\Usuario $friend
	 * @return \Witbeat\DBBundle\Entity\Usuario
	 */
	public function addMyFriends(Usuario $friend)
	{
		$this->myFriends[] = $friend;

		return $this;
	}

	/**
	 * Get Coleccion entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getMyFriends()
	{
		return $this->myFriends;
	}

	public function __sleep()
	{
		return array('id', 'reader_name', 'reader_second_name', 'reader_email', 'reader_city', 'reader_country', 'reader_telephone', 'is_facebook');
	}
}