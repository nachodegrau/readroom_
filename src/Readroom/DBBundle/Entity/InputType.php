<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Readroom\DBBundle\Entity\InputType
 *
 * @ORM\Entity()
 * @ORM\Table(name="input_types")
 */
class InputType
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $name;

	public function __construct()
	{
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\InputType
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
	 * Set the value of name.
	 *
	 * @param string $name
	 * @return \Readroom\DBBundle\Entity\InputType
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of name.
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	public function __sleep()
	{
		return array('id', 'name');
	}
}