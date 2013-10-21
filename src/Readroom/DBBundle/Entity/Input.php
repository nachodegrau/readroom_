<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Readroom\DBBundle\Entity\Input
 *
 * @ORM\Table(name="inputs", indexes={@ORM\Index(name="book_id_idx", columns={"book_id"}), @ORM\Index(name="customer_id_idx", columns={"reader_id"})})
 * @ORM\Entity(repositoryClass="Readroom\DBBundle\Entity\InputRepository")
 */
class Input
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="bigint", nullable=true)
	 */
	protected $location;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $book_spine;
        
        /**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $type;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $input_quote;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $tag_name;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $input_date;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $source;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $comment;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $start;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $end;

	/**
	 * @ORM\OneToMany(targetEntity="Complaint", mappedBy="input")
	 * @ORM\JoinColumn(name="input_id", referencedColumnName="id", nullable=false)
	 */
	protected $complaints;

	/**
	 * @ORM\OneToMany(targetEntity="Reply", mappedBy="input")
	 * @ORM\JoinColumn(name="input_id", referencedColumnName="id", nullable=false)
	 */
	protected $replies;

	/**
	 * @ORM\ManyToOne(targetEntity="Book", inversedBy="inputs")
	 * @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
	 */
	protected $book;

	/**
	 * @ORM\ManyToOne(targetEntity="Reader", inversedBy="inputs")
	 * @ORM\JoinColumn(name="reader_id", referencedColumnName="id", nullable=false)
	 */
	protected $reader;

	public function __construct()
	{
		$this->complaints = new ArrayCollection();
		$this->replies = new ArrayCollection();
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Input
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
	 * Set the value of location.
	 *
	 * @param integer $location
	 * @return \Readroom\DBBundle\Entity\Input
	 */
	public function setLocation($location)
	{
		$this->location = $location;

		return $this;
	}

	/**
	 * Get the value of location.
	 *
	 * @return integer
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * Set the value of book_spine.
	 *
	 * @param integer $book_spine
	 * @return \Readroom\DBBundle\Entity\Input
	 */
	public function setBookSpine($book_spine)
	{
		$this->book_spine = $book_spine;

		return $this;
	}

	/**
	 * Get the value of book_spine.
	 *
	 * @return integer
	 */
	public function getBookSpine()
	{
		return $this->book_spine;
	}
        
        /**
	 * Set the value of book_spine.
	 *
	 * @param integer $book_spine
	 * @return \Readroom\DBBundle\Entity\Input
	 */
	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get the value of book_spine.
	 *
	 * @return integer
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Set the value of input_quote.
	 *
	 * @param string $input_quote
	 * @return \Readroom\DBBundle\Entity\Input
	 */
	public function setInputQuote($input_quote)
	{
		$this->input_quote = $input_quote;

		return $this;
	}

	/**
	 * Get the value of input_quote.
	 *
	 * @return string
	 */
	public function getInputQuote()
	{
		return $this->input_quote;
	}

	/**
	 * Set the value of tag_name.
	 *
	 * @param string $tag_name
	 * @return \Readroom\DBBundle\Entity\Input
	 */
	public function setTagName($tag_name)
	{
		$this->tag_name = $tag_name;

		return $this;
	}

	/**
	 * Get the value of tag_name.
	 *
	 * @return string
	 */
	public function getTagName()
	{
		return $this->tag_name;
	}

	/**
	 * Set the value of input_date.
	 *
	 * @param datetime $input_date
	 * @return \Readroom\DBBundle\Entity\Input
	 */
	public function setInputDate($input_date)
	{
		$this->input_date = $input_date;

		return $this;
	}

	/**
	 * Get the value of input_date.
	 *
	 * @return datetime
	 */
	public function getInputDate()
	{
		return $this->input_date;
	}

	/**
	 * Set the value of source.
	 *
	 * @param string $source
	 * @return \Readroom\DBBundle\Entity\Input
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
	 * Set the value of comment.
	 *
	 * @param string $comment
	 * @return \Readroom\DBBundle\Entity\Input
	 */
	public function setComment($comment)
	{
		$this->comment = $comment;

		return $this;
	}

	/**
	 * Get the value of comment.
	 *
	 * @return string
	 */
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * Set the value of start.
	 *
	 * @param integer $start
	 * @return \Readroom\DBBundle\Entity\Input
	 */
	public function setStart($start)
	{
		$this->start = $start;

		return $this;
	}

	/**
	 * Get the value of start.
	 *
	 * @return integer
	 */
	public function getStart()
	{
		return $this->start;
	}

	/**
	 * Set the value of end.
	 *
	 * @param integer $end
	 * @return \Readroom\DBBundle\Entity\Input
	 */
	public function setEnd($end)
	{
		$this->end = $end;

		return $this;
	}

	/**
	 * Get the value of end.
	 *
	 * @return integer
	 */
	public function getEnd()
	{
		return $this->end;
	}

	/**
	 * Add Complaint entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Complaint $complaint
	 * @return \Readroom\DBBundle\Entity\Input
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
	 * Add Reply entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Reply $reply
	 * @return \Readroom\DBBundle\Entity\Input
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
	 * Set Book entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Book $book
	 * @return \Readroom\DBBundle\Entity\Input
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
	 * @return \Readroom\DBBundle\Entity\Input
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
		return array('id', 'book_id', 'reader_id', 'location', 'book_spine', 'input_quote', 'tag_name', 'input_date', 'source', 'comment', 'start', 'end');
	}
}