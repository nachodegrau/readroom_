<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Readroom\DBBundle\Entity\MetaTagsCategory
 *
 * @ORM\Entity()
 * @ORM\Table(name="meta_tags_categories", indexes={@ORM\Index(name="fk_categories_id_idx", columns={"category_id"}), @ORM\Index(name="fk_language_idx", columns={"language_id"})})
 */
class MetaTagsCategory
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="text")
	 */
	protected $metatags_keywords;

	/**
	 * @ORM\ManyToOne(targetEntity="Category", inversedBy="metaTagsCategories")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
	 */
	protected $category;

	/**
	 * @ORM\ManyToOne(targetEntity="Language", inversedBy="metaTagsCategories")
	 * @ORM\JoinColumn(name="language_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
	 */
	protected $language;

	public function __construct()
	{
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\MetaTagsCategory
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
	 * Set the value of metatags_keywords.
	 *
	 * @param string $metatags_keywords
	 * @return \Readroom\DBBundle\Entity\MetaTagsCategory
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
	 * Set Category entity (many to one).
	 *
	 * @param \Readroom\DBBundle\Entity\Category $category
	 * @return \Readroom\DBBundle\Entity\MetaTagsCategory
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
	 * @return \Readroom\DBBundle\Entity\MetaTagsCategory
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
		return array('id', 'category_id', 'language_id', 'metatags_keywords');
	}
}