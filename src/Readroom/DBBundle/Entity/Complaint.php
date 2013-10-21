<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Readroom\DBBundle\Entity\Complaint
 *
 * @ORM\Entity()
 * @ORM\Table(name="complaints", indexes={@ORM\Index(name="book_id_idx", columns={"book_id"}), @ORM\Index(name="customer_id_idx", columns={"reader_id"}), @ORM\Index(name="input_id_idx", columns={"input_id"})})
 */
class Complaint
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $comments;

	/**
	 * @ORM\ManyToOne(targetEntity="Book", inversedBy="complaints")
	 * @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
	 */
	protected $book;

	/**
	 * @ORM\ManyToOne(targetEntity="Reader", inversedBy="complaints")
	 * @ORM\JoinColumn(name="reader_id", referencedColumnName="id", nullable=false)
	 */
	protected $reader;

	/**
	 * @ORM\ManyToOne(targetEntity="Input", inversedBy="complaints")
	 * @ORM\JoinColumn(name="input_id", referencedColumnName="id", nullable=false)
	 */
	protected $input;

	public function __construct()
	{
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Complaint
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
	 * Set the value of comments.
	 *
	 * @param string $comments
	 * @return \Readroom\DBBundle\Entity\Complaint
	 */
	public function setComments($comments)
	{
		$this->comments = $comments;

		return $this;
	}

	/**
	 * Get the value of comments.
	 *
	 * @return string
	 */
	public function getComments()
	{
		return $this->comments;
	}

	/**
	 * Set Book entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Book $book
	 * @return \Readroom\DBBundle\Entity\Complaint
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
	 * Set Reader entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Reader $reader
	 * @return \Readroom\DBBundle\Entity\Complaint
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

	/**
	 * Set Input entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Input $input
	 * @return \Readroom\DBBundle\Entity\Complaint
	 */
	public function setInput(Input $input = null)
	{
		$this->input = $input;

		return $this;
	}

	/**
	 * Get Input entity (many to one).
	 *
	 * @return \Readroom\DBBundle\Entity\Input
	 */
	public function getInput()
	{
		return $this->input;
	}

	public function __sleep()
	{
		return array('id', 'book_id', 'reader_id', 'input_id', 'comments');
	}
}