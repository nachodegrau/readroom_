<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Readroom\DBBundle\Entity\Loan
 *
 * @ORM\Entity()
 * @ORM\Table(name="loans", indexes={@ORM\Index(name="book_id_idx", columns={"book_id"}), @ORM\Index(name="origin_customer_id_idx", columns={"source_reader_id"})})
 */
class Loan
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $target_reader_id;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $target_reader_email;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $date;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $expire_time;

	/**
	 * @ORM\ManyToOne(targetEntity="Book", inversedBy="loans")
	 * @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
	 */
	protected $book;

	/**
	 * @ORM\ManyToOne(targetEntity="Reader", inversedBy="loans")
	 * @ORM\JoinColumn(name="source_reader_id", referencedColumnName="id", nullable=false)
	 */
	protected $reader;

	public function __construct()
	{
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Loan
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
	 * Set the value of target_reader_id.
	 *
	 * @param integer $target_reader_id
	 * @return \Readroom\DBBundle\Entity\Loan
	 */
	public function setTargetReaderId($target_reader_id)
	{
		$this->target_reader_id = $target_reader_id;

		return $this;
	}

	/**
	 * Get the value of target_reader_id.
	 *
	 * @return integer
	 */
	public function getTargetReaderId()
	{
		return $this->target_reader_id;
	}

	/**
	 * Set the value of target_reader_email.
	 *
	 * @param string $target_reader_email
	 * @return \Readroom\DBBundle\Entity\Loan
	 */
	public function setTargetReaderEmail($target_reader_email)
	{
		$this->target_reader_email = $target_reader_email;

		return $this;
	}

	/**
	 * Get the value of target_reader_email.
	 *
	 * @return string
	 */
	public function getTargetReaderEmail()
	{
		return $this->target_reader_email;
	}

	/**
	 * Set the value of date.
	 *
	 * @param datetime $date
	 * @return \Readroom\DBBundle\Entity\Loan
	 */
	public function setDate($date)
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * Get the value of date.
	 *
	 * @return datetime
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * Set the value of expire_time.
	 *
	 * @param datetime $expire_time
	 * @return \Readroom\DBBundle\Entity\Loan
	 */
	public function setExpireTime($expire_time)
	{
		$this->expire_time = $expire_time;

		return $this;
	}

	/**
	 * Get the value of expire_time.
	 *
	 * @return datetime
	 */
	public function getExpireTime()
	{
		return $this->expire_time;
	}

	/**
	 * Set Book entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Book $book
	 * @return \Readroom\DBBundle\Entity\Loan
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
	 * @return \Readroom\DBBundle\Entity\Loan
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
		return array('id', 'book_id', 'source_reader_id', 'target_reader_id', 'target_reader_email', 'date', 'expire_time');
	}
}