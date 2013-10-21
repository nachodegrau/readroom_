<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Readroom\DBBundle\Entity\Book
 *
 * @ORM\Table(name="books", indexes={@ORM\Index(name="tax_id_idx", columns={"tax_id"}), @ORM\Index(name="fk_books_languages1_idx", columns={"languages_id"})})
 * @ORM\Entity(repositoryClass="Readroom\DBBundle\Entity\BookRepository")
 */
class Book
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
	 * @ORM\Column(type="string", length=45)
	 */
	protected $book_name;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $book_synopsis;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $publication_year;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $source;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $ISBN_code;

	/**
	 * @ORM\Column(type="float", nullable=true)
	 */
	protected $book_price;

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $book_is_free;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $book_front;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $date_added;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $last_modified;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $book_tax_id;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $book_viewed;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $metatags_keywords;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $opf_name;

	/**
	 * @ORM\OneToMany(targetEntity="Complaint", mappedBy="book")
	 * @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
	 */
	protected $complaints;

	/**
	 * @ORM\OneToMany(targetEntity="Input", mappedBy="book")
	 * @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
	 */
	protected $inputs;

	/**
	 * @ORM\OneToMany(targetEntity="Loan", mappedBy="book")
	 * @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
	 */
	protected $loans;

	/**
	 * @ORM\OneToMany(targetEntity="OrdersBook", mappedBy="book")
	 * @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
	 */
	protected $ordersBooks;

	/**
	 * @ORM\OneToMany(targetEntity="Present", mappedBy="book")
	 * @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
	 */
	protected $presents;

	/**
	 * @ORM\ManyToOne(targetEntity="Language", inversedBy="books")
	 * @ORM\JoinColumn(name="languages_id", referencedColumnName="id", nullable=false)
	 */
	protected $language;

	/**
	 * @ORM\ManyToOne(targetEntity="Tax", inversedBy="books")
	 * @ORM\JoinColumn(name="tax_id", referencedColumnName="id")
	 */
	protected $tax;

	/**
	 * @ORM\ManyToMany(targetEntity="Category", mappedBy="books")
	 */
	protected $categories;

	/**
	 * @ORM\ManyToMany(targetEntity="Reader", inversedBy="books")
	 * @ORM\JoinTable(name="reader_has_book",
	 *     joinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id")},
	 *     inverseJoinColumns={@ORM\JoinColumn(name="reader_id", referencedColumnName="id")}
	 * )
	 */
	protected $readers;

	public function __construct()
	{
		$this->complaints = new ArrayCollection();
		$this->inputs = new ArrayCollection();
		$this->loans = new ArrayCollection();
		$this->ordersBooks = new ArrayCollection();
		$this->presents = new ArrayCollection();
		$this->categories = new ArrayCollection();
		$this->readers = new ArrayCollection();
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Book
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
	 * @return \Readroom\DBBundle\Entity\Book
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
	 * Set the value of book_name.
	 *
	 * @param string $book_name
	 * @return \Readroom\DBBundle\Entity\Book
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
	 * @return \Readroom\DBBundle\Entity\Book
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
	 * Set the value of publication_year.
	 *
	 * @param integer $publication_year
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setPublicationYear($publication_year)
	{
		$this->publication_year = $publication_year;

		return $this;
	}

	/**
	 * Get the value of publication_year.
	 *
	 * @return integer
	 */
	public function getPublicationYear()
	{
		return $this->publication_year;
	}

	/**
	 * Set the value of source.
	 *
	 * @param string $source
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setSource($source)
	{
		$this->source = $source;

		return $this;
	}

	/**
	 * Get the value of source.
	 *
	 * @return string
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * Set the value of ISBN_code.
	 *
	 * @param string $ISBN_code
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setISBNCode($ISBN_code)
	{
		$this->ISBN_code = $ISBN_code;

		return $this;
	}

	/**
	 * Get the value of ISBN_code.
	 *
	 * @return string
	 */
	public function getISBNCode()
	{
		return $this->ISBN_code;
	}

	/**
	 * Set the value of book_price.
	 *
	 * @param float $book_price
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setBookPrice($book_price)
	{
		$this->book_price = $book_price;

		return $this;
	}

	/**
	 * Get the value of book_price.
	 *
	 * @return float
	 */
	public function getBookPrice()
	{
		return $this->book_price;
	}

	/**
	 * Set the value of book_is_free.
	 *
	 * @param boolean $book_is_free
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setBookIsFree($book_is_free)
	{
		$this->book_is_free = $book_is_free;

		return $this;
	}

	/**
	 * Get the value of book_is_free.
	 *
	 * @return boolean
	 */
	public function getBookIsFree()
	{
		return $this->book_is_free;
	}

	/**
	 * Set the value of book_front.
	 *
	 * @param string $book_front
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setBookFront($book_front)
	{
		$this->book_front = $book_front;

		return $this;
	}

	/**
	 * Get the value of book_front.
	 *
	 * @return string
	 */
	public function getBookFront()
	{
		return $this->book_front;
	}

	/**
	 * Set the value of date_added.
	 *
	 * @param string $date_added
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setDateAdded($date_added)
	{
		$this->date_added = $date_added;

		return $this;
	}

	/**
	 * Get the value of date_added.
	 *
	 * @return string
	 */
	public function getDateAdded()
	{
		return $this->date_added;
	}

	/**
	 * Set the value of last_modified.
	 *
	 * @param string $last_modified
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setLastModified($last_modified)
	{
		$this->last_modified = $last_modified;

		return $this;
	}

	/**
	 * Get the value of last_modified.
	 *
	 * @return string
	 */
	public function getLastModified()
	{
		return $this->last_modified;
	}

	/**
	 * Set the value of book_tax_id.
	 *
	 * @param integer $book_tax_id
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setBookTaxId($book_tax_id)
	{
		$this->book_tax_id = $book_tax_id;

		return $this;
	}

	/**
	 * Get the value of book_tax_id.
	 *
	 * @return integer
	 */
	public function getBookTaxId()
	{
		return $this->book_tax_id;
	}

	/**
	 * Set the value of book_viewed.
	 *
	 * @param integer $book_viewed
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setBookViewed($book_viewed)
	{
		$this->book_viewed = $book_viewed;

		return $this;
	}

	/**
	 * Get the value of book_viewed.
	 *
	 * @return integer
	 */
	public function getBookViewed()
	{
		return $this->book_viewed;
	}

	/**
	 * Set the value of metatags_keywords.
	 *
	 * @param string $metatags_keywords
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setMetatagsKeywords($metatags_keywords)
	{
		$this->metatags_keywords = $metatags_keywords;

		return $this;
	}

	/**
	 * Get the value of metatags_keywords.
	 *
	 * @return string
	 */
	public function getMetatagsKeywords()
	{
		return $this->metatags_keywords;
	}

	/**
	 * Set the value of opf_name.
	 *
	 * @param string $opf_name
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setOpfName($opf_name)
	{
		$this->opf_name = $opf_name;

		return $this;
	}

	/**
	 * Get the value of opf_name.
	 *
	 * @return string
	 */
	public function getOpfName()
	{
		return $this->opf_name;
	}

	/**
	 * Add Complaint entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Complaint $complaint
	 * @return \Readroom\DBBundle\Entity\Book
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
	 * @return \Readroom\DBBundle\Entity\Book
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
	 * @return \Readroom\DBBundle\Entity\Book
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
	 * Add OrdersBook entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\OrdersBook $ordersBook
	 * @return \Readroom\DBBundle\Entity\Book
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
	 * Add Present entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Present $present
	 * @return \Readroom\DBBundle\Entity\Book
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
	 * Set Language entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Language $language
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function setLanguage(Language $language = null)
	{
		$this->language = $language;

		return $this;
	}

	/**
	 * Get Language entity (many to one).
	 *
	 * @return \Readroom\DBBundle\Entity\Language
	 */
	public function getLanguage()
	{
		return $this->language;
	}

	/**
	 * Set Tax entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Tax $tax
	 * @return \Readroom\DBBundle\Entity\Book
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

	/**
	 * Add Category entity to collection.
	 *
	 * @param \Readroom\DBBundle\Entity\Category $category
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function addCategory(Category $category)
	{
		$this->categories[] = $category;

		return $this;
	}

	/**
	 * Get Category entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCategories()
	{
		return $this->categories;
	}

	/**
	 * Add Reader entity to collection.
	 *
	 * @param \Readroom\DBBundle\Entity\Reader $reader
	 * @return \Readroom\DBBundle\Entity\Book
	 */
	public function addReader(Reader $reader)
	{
		$reader->addBook($this);
		$this->readers[] = $reader;

		return $this;
	}

	/**
	 * Get Reader entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getReaders()
	{
		return $this->readers;
	}

	public function __sleep()
	{
		return array('id', 'book_author', 'book_name', 'book_synopsis', 'languages_id', 'publication_year', 'source', 'ISBN_code', 'book_price', 'tax_id', 'book_is_free', 'book_front', 'date_added', 'last_modified', 'book_tax_id', 'book_viewed', 'metatags_keywords', 'opf_name');
	}
}