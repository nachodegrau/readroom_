<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Readroom\DBBundle\Entity\Admin
 *
 * @ORM\Entity()
 * @ORM\Table(name="Admin")
 */
class Admin
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $login;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $password;

	public function __construct()
	{
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Admin
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
	 * Set the value of login.
	 *
	 * @param string $login
	 * @return \Readroom\DBBundle\Entity\Admin
	 */
	public function setLogin($login)
	{
		$this->login = $login;

		return $this;
	}

	/**
	 * Get the value of login.
	 *
	 * @return string
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * Set the value of password.
	 *
	 * @param string $password
	 * @return \Readroom\DBBundle\Entity\Admin
	 */
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Get the value of password.
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	public function __sleep()
	{
		return array('id', 'login', 'password');
	}
}