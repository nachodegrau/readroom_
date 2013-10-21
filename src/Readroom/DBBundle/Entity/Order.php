<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Readroom\DBBundle\Entity\Order
 *
 * @ORM\Entity()
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="customer_id_idx", columns={"reader_id"})})
 */
class Order
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
	protected $reader_city;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $reader_postcode;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $reader_country;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $reader_email;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $reader_telephone;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $payment_method;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $last_modified;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $date_purchased;

	/**
	 * @ORM\OneToMany(targetEntity="OrdersBook", mappedBy="order")
	 * @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false)
	 */
	protected $ordersBooks;

	/**
	 * @ORM\ManyToOne(targetEntity="Reader", inversedBy="orders")
	 * @ORM\JoinColumn(name="reader_id", referencedColumnName="id", nullable=false)
	 */
	protected $reader;

	public function __construct()
	{
		$this->ordersBooks = new ArrayCollection();
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Order
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
	 * @return \Readroom\DBBundle\Entity\Order
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
	 * Set the value of reader_city.
	 *
	 * @param string $reader_city
	 * @return \Readroom\DBBundle\Entity\Order
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
	 * Set the value of reader_postcode.
	 *
	 * @param string $reader_postcode
	 * @return \Readroom\DBBundle\Entity\Order
	 */
	public function setReaderPostcode($reader_postcode)
	{
		$this->reader_postcode = $reader_postcode;

		return $this;
	}

	/**
	 * Get the value of reader_postcode.
	 *
	 * @return string
	 */
	public function getReaderPostcode()
	{
		return $this->reader_postcode;
	}

	/**
	 * Set the value of reader_country.
	 *
	 * @param string $reader_country
	 * @return \Readroom\DBBundle\Entity\Order
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
	 * Set the value of reader_email.
	 *
	 * @param string $reader_email
	 * @return \Readroom\DBBundle\Entity\Order
	 */
	public function setReaderEmail($reader_email)
	{
		$this->reader_email = $reader_email;

		return $this;
	}

	/**
	 * Get the value of reader_email.
	 *
	 * @return string
	 */
	public function getReaderEmail()
	{
		return $this->reader_email;
	}

	/**
	 * Set the value of reader_telephone.
	 *
	 * @param string $reader_telephone
	 * @return \Readroom\DBBundle\Entity\Order
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
	 * Set the value of payment_method.
	 *
	 * @param string $payment_method
	 * @return \Readroom\DBBundle\Entity\Order
	 */
	public function setPaymentMethod($payment_method)
	{
		$this->payment_method = $payment_method;

		return $this;
	}

	/**
	 * Get the value of payment_method.
	 *
	 * @return string
	 */
	public function getPaymentMethod()
	{
		return $this->payment_method;
	}

	/**
	 * Set the value of last_modified.
	 *
	 * @param datetime $last_modified
	 * @return \Readroom\DBBundle\Entity\Order
	 */
	public function setLastModified($last_modified)
	{
		$this->last_modified = $last_modified;

		return $this;
	}

	/**
	 * Get the value of last_modified.
	 *
	 * @return datetime
	 */
	public function getLastModified()
	{
		return $this->last_modified;
	}

	/**
	 * Set the value of date_purchased.
	 *
	 * @param datetime $date_purchased
	 * @return \Readroom\DBBundle\Entity\Order
	 */
	public function setDatePurchased($date_purchased)
	{
		$this->date_purchased = $date_purchased;

		return $this;
	}

	/**
	 * Get the value of date_purchased.
	 *
	 * @return datetime
	 */
	public function getDatePurchased()
	{
		return $this->date_purchased;
	}

	/**
	 * Add OrdersBook entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\OrdersBook $ordersBook
	 * @return \Readroom\DBBundle\Entity\Order
	 */
	public function addOrdersBook(OrdersBook $ordersBook)
	{
		$this->ordersBooks[] = $ordersBook;

		return $this;
	}

	/**
	 * Get OrdersBook entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getOrdersBooks()
	{
		return $this->ordersBooks;
	}

	/**
	 * Set Reader entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Reader $reader
	 * @return \Readroom\DBBundle\Entity\Order
	 */
	public function setReader(Reader $reader = null)
	{
		$this->reader = $reader;

		return $this;
	}

	/**
	 * Get Reader entity (many to one).
	 *
	 * @return \Readroom\DBBundle\Entity\Reader
	 */
	public function getReader()
	{
		return $this->reader;
	}

	public function __sleep()
	{
		return array('id', 'reader_id', 'reader_name', 'reader_city', 'reader_postcode', 'reader_country', 'reader_email', 'reader_telephone', 'payment_method', 'last_modified', 'date_purchased');
	}
}