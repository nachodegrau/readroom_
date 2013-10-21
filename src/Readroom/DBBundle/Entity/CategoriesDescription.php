<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Readroom\DBBundle\Entity\CategoriesDescription
 *
 * @ORM\Entity()
 * @ORM\Table(name="categories_description", indexes={@ORM\Index(name="category_id_idx", columns={"category_id"}), @ORM\Index(name="language_id_idx", columns={"language_id"})})
 */
class CategoriesDescription
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	protected $category_id;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	protected $language_id;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $category_name;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $category_description;

	/**
	 * @ORM\ManyToOne(targetEntity="Category", inversedBy="categoriesDescriptions")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
	 */
	protected $category;

	/**
	 * @ORM\ManyToOne(targetEntity="Language", inversedBy="categoriesDescriptions")
	 * @ORM\JoinColumn(name="language_id", referencedColumnName="id", nullable=false)
	 */
	protected $language;

	public function __construct()
	{
	}

	/**
	 * Set the value of category_id.
	 *
	 * @param integer $category_id
	 * @return \Readroom\DBBundle\Entity\CategoriesDescription
	 */
	public function setCategoryId($category_id)
	{
		$this->category_id = $category_id;

		return $this;
	}

	/**
	 * Get the value of category_id.
	 *
	 * @return integer
	 */
	public function getCategoryId()
	{
		return $this->category_id;
	}

	/**
	 * Set the value of language_id.
	 *
	 * @param integer $language_id
	 * @return \Readroom\DBBundle\Entity\CategoriesDescription
	 */
	public function setLanguageId($language_id)
	{
		$this->language_id = $language_id;

		return $this;
	}

	/**
	 * Get the value of language_id.
	 *
	 * @return integer
	 */
	public function getLanguageId()
	{
		return $this->language_id;
	}

	/**
	 * Set the value of category_name.
	 *
	 * @param string $category_name
	 * @return \Readroom\DBBundle\Entity\CategoriesDescription
	 */
	public function setCategoryName($category_name)
	{
		$this->category_name = $category_name;

		return $this;
	}

	/**
	 * Get the value of category_name.
	 *
	 * @return string
	 */
	public function getCategoryName()
	{
		return $this->category_name;
	}

	/**
	 * Set the value of category_description.
	 *
	 * @param string $category_description
	 * @return \Readroom\DBBundle\Entity\CategoriesDescription
	 */
	public function setCategoryDescription($category_description)
	{
		$this->category_description = $category_description;

		return $this;
	}

	/**
	 * Get the value of category_description.
	 *
	 * @return string
	 */
	public function getCategoryDescription()
	{
		return $this->category_description;
	}

	/**
	 * Set Category entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Category $category
	 * @return \Readroom\DBBundle\Entity\CategoriesDescription
	 */
	public function setCategory(Category $category = null)
	{
		$this->category = $category;

		return $this;
	}

	/**
	 * Get Category entity (many to one).
	 *
	 * @return \Readroom\DBBundle\Entity\Category
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * Set Language entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Language $language
	 * @return \Readroom\DBBundle\Entity\CategoriesDescription
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

	public function __sleep()
	{
		return array('category_id', 'language_id', 'category_name', 'category_description');
	}
}