<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Readroom\DBBundle\Entity\OrdersBook
 *
 * @ORM\Entity()
 * @ORM\Table(name="orders_books", indexes={@ORM\Index(name="order_id_idx", columns={"order_id"}), @ORM\Index(name="book_id_idx", columns={"book_id"}), @ORM\Index(name="book_tax_id_idx", columns={"book_tax_id"})})
 */
class OrdersBook
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
	protected $book_author;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $book_publication_year;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $book_price;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $book_name;

	/**
	 * @ORM\Column(type="text")
	 */
	protected $book_synopsis;

	/**
	 * @ORM\ManyToOne(targetEntity="Order", inversedBy="ordersBooks")
	 * @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false)
	 */
	protected $order;

	/**
	 * @ORM\ManyToOne(targetEntity="Book", inversedBy="ordersBooks")
	 * @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
	 */
	protected $book;

	/**
	 * @ORM\ManyToOne(targetEntity="Tax", inversedBy="ordersBooks")
	 * @ORM\JoinColumn(name="book_tax_id", referencedColumnName="id", nullable=false)
	 */
	protected $tax;

	public function __construct()
	{
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\OrdersBook
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
	 * Set the value of book_author.
	 *
	 * @param string $book_author
	 * @return \Readroom\DBBundle\Entity\OrdersBook
	 */
	public function setBookAuthor($book_author)
	{
		$this->book_author = $book_author;

		return $this;
	}

	/**
	 * Get the value of book_author.
	 *
	 * @return string
	 */
	public function getBookAuthor()
	{
		return $this->book_author;
	}

	/**
	 * Set the value of book_publication_year.
	 *
	 * @param string $book_publication_year
	 * @return \Readroom\DBBundle\Entity\OrdersBook
	 */
	public function setBookPublicationYear($book_publication_year)
	{
		$this->book_publication_year = $book_publication_year;

		return $this;
	}

	/**
	 * Get the value of book_publication_year.
	 *
	 * @return string
	 */
	public function getBookPublicationYear()
	{
		return $this->book_publication_year;
	}

	/**
	 * Set the value of book_price.
	 *
	 * @param string $book_price
	 * @return \Readroom\DBBundle\Entity\OrdersBook
	 */
	public function setBookPrice($book_price)
	{
		$this->book_price = $book_price;

		return $this;
	}

	/**
	 * Get the value of book_price.
	 *
	 * @return string
	 */
	public function getBookPrice()
	{
		return $this->book_price;
	}

	/**
	 * Set the value of book_name.
	 *
	 * @param string $book_name
	 * @return \Readroom\DBBundle\Entity\OrdersBook
	 */
	public function setBookName($book_name)
	{
		$this->book_name = $book_name;

		return $this;
	}

	/**
	 * Get the value of book_name.
	 *
	 * @return string
	 */
	public function getBookName()
	{
		return $this->book_name;
	}

	/**
	 * Set the value of book_synopsis.
	 *
	 * @param string $book_synopsis
	 * @return \Readroom\DBBundle\Entity\OrdersBook
	 */
	public function setBookSynopsis($book_synopsis)
	{
		$this->book_synopsis = $book_synopsis;

		return $this;
	}

	/**
	 * Get the value of book_synopsis.
	 *
	 * @return string
	 */
	public function getBookSynopsis()
	{
		return $this->book_synopsis;
	}

	/**
	 * Set Order entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Order $order
	 * @return \Readroom\DBBundle\Entity\OrdersBook
	 */
	public function setOrder(Order $order = null)
	{
		$this->order = $order;

		return $this;
	}

	/**
	 * Get Order entity (many to one).
	 *
	 * @return \Readroom\DBBundle\Entity\Order
	 */
	public function getOrder()
	{
		return $this->order;
	}

	/**
	 * Set Book entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Book $book
	 * @return \Readroom\DBBundle\Entity\OrdersBook
	 */
	public function setBook(Book $book = null)
	{
		$this->book = $book;

		return $this;
	}

	/**
	 * Get Book entity (many to one).
	 *
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function getBook()
	{
		return $this->book;
	}

	/**
	 * Set Tax entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Tax $tax
	 * @return \Readroom\DBBundle\Entity\OrdersBook
	 */
	public function setTax(Tax $tax = null)
	{
		$this->tax = $tax;

		return $this;
	}

	/**
	 * Get Tax entity (many to one).
	 *
	 * @return \Readroom\DBBundle\Entity\Tax
	 */
	public function getTax()
	{
		return $this->tax;
	}

	public function __sleep()
	{
		return array('id', 'order_id', 'book_id', 'book_author', 'book_publication_year', 'book_price', 'book_tax_id', 'book_name', 'book_synopsis');
	}
}