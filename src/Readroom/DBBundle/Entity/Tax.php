<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Readroom\DBBundle\Entity\Tax
 *
 * @ORM\Entity()
 * @ORM\Table(name="taxes")
 */
class Tax
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $tax_name;

	/**
	 * @ORM\Column(type="float")
	 */
	protected $tax_percentage;

	/**
	 * @ORM\OneToMany(targetEntity="Book", mappedBy="tax")
	 * @ORM\JoinColumn(name="tax_id", referencedColumnName="id")
	 */
	protected $books;

	/**
	 * @ORM\OneToMany(targetEntity="OrdersBook", mappedBy="tax")
	 * @ORM\JoinColumn(name="book_tax_id", referencedColumnName="id", nullable=false)
	 */
	protected $ordersBooks;

	public function __construct()
	{
		$this->books = new ArrayCollection();
		$this->ordersBooks = new ArrayCollection();
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Tax
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
	 * Set the value of tax_name.
	 *
	 * @param string $tax_name
	 * @return \Readroom\DBBundle\Entity\Tax
	 */
	public function setTaxName($tax_name)
	{
		$this->tax_name = $tax_name;

		return $this;
	}

	/**
	 * Get the value of tax_name.
	 *
	 * @return string
	 */
	public function getTaxName()
	{
		return $this->tax_name;
	}

	/**
	 * Set the value of tax_percentage.
	 *
	 * @param float $tax_percentage
	 * @return \Readroom\DBBundle\Entity\Tax
	 */
	public function setTaxPercentage($tax_percentage)
	{
		$this->tax_percentage = $tax_percentage;

		return $this;
	}

	/**
	 * Get the value of tax_percentage.
	 *
	 * @return float
	 */
	public function getTaxPercentage()
	{
		return $this->tax_percentage;
	}

	/**
	 * Add Book entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Book $book
	 * @return \Readroom\DBBundle\Entity\Tax
	 */
	public function addBook(Book $book)
	{
		$this->books[] = $book;

		return $this;
	}

	/**
	 * Get Book entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getBooks()
	{
		return $this->books;
	}

	/**
	 * Add OrdersBook entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\OrdersBook $ordersBook
	 * @return \Readroom\DBBundle\Entity\Tax
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

	public function __sleep()
	{
		return array('id', 'tax_name', 'tax_percentage');
	}
}