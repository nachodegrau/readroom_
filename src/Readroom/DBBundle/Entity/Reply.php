<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Readroom\DBBundle\Entity\Reply
 *
 * @ORM\Entity()
 * @ORM\Table(name="replies", indexes={@ORM\Index(name="reader_fk_idx", columns={"reader_id"}), @ORM\Index(name="input_fk_idx", columns={"input_id"})})
 */
class Reply
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
         * * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $coment;

	/**
	 * @ORM\ManyToOne(targetEntity="Reader", inversedBy="replies")
	 * @ORM\JoinColumn(name="reader_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
	 */
	protected $reader;

	/**
	 * @ORM\ManyToOne(targetEntity="Input", inversedBy="replies")
	 * @ORM\JoinColumn(name="input_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
	 */
	protected $input;

	public function __construct()
	{
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Reply
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
	 * Set the value of coment.
	 *
	 * @param string $coment
	 * @return \Readroom\DBBundle\Entity\Reply
	 */
	public function setComent($coment)
	{
		$this->coment = $coment;

		return $this;
	}

	/**
	 * Get the value of coment.
	 *
	 * @return string
	 */
	public function getComent()
	{
		return $this->coment;
	}

	/**
	 * Set Reader entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Reader $reader
	 * @return \Readroom\DBBundle\Entity\Reply
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
	 * @return \Readroom\DBBundle\Entity\Reply
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
		return array('id', 'reader_id', 'input_id', 'coment');
	}
}