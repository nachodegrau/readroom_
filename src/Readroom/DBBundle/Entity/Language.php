<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Readroom\DBBundle\Entity\Language
 *
 * @ORM\Entity()
 * @ORM\Table(name="languages")
 */
class Language
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
	protected $name;

	/**
	 * @ORM\Column(type="string", length=45)
	 */
	protected $code;

	/**
	 * @ORM\Column(type="string", length=45, nullable=true)
	 */
	protected $image;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $sort_order;

	/**
	 * @ORM\OneToMany(targetEntity="Book", mappedBy="language")
	 * @ORM\JoinColumn(name="languages_id", referencedColumnName="id", nullable=false)
	 */
	protected $books;

	/**
	 * @ORM\OneToMany(targetEntity="CategoriesDescription", mappedBy="language")
	 * @ORM\JoinColumn(name="language_id", referencedColumnName="id", nullable=false)
	 */
	protected $categoriesDescriptions;

	/**
	 * @ORM\OneToMany(targetEntity="MetaTagsCategory", mappedBy="language")
	 * @ORM\JoinColumn(name="language_id", referencedColumnName="id", nullable=false)
	 */
	protected $metaTagsCategories;

	/**
	 * @ORM\ManyToMany(targetEntity="Reader", inversedBy="languages")
	 * @ORM\JoinTable(name="reader_has_language",
	 *     joinColumns={@ORM\JoinColumn(name="language_id", referencedColumnName="id")},
	 *     inverseJoinColumns={@ORM\JoinColumn(name="reader_id", referencedColumnName="id")}
	 * )
	 */
	protected $readers;

	public function __construct()
	{
		$this->books = new ArrayCollection();
		$this->categoriesDescriptions = new ArrayCollection();
		$this->metaTagsCategories = new ArrayCollection();
		$this->readers = new ArrayCollection();
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Language
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
	 * @return \Readroom\DBBundle\Entity\Language
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

	/**
	 * Set the value of code.
	 *
	 * @param string $code
	 * @return \Readroom\DBBundle\Entity\Language
	 */
	public function setCode($code)
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * Get the value of code.
	 *
	 * @return string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * Set the value of image.
	 *
	 * @param string $image
	 * @return \Readroom\DBBundle\Entity\Language
	 */
	public function setImage($image)
	{
		$this->image = $image;

		return $this;
	}

	/**
	 * Get the value of image.
	 *
	 * @return string
	 */
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * Set the value of sort_order.
	 *
	 * @param integer $sort_order
	 * @return \Readroom\DBBundle\Entity\Language
	 */
	public function setSortOrder($sort_order)
	{
		$this->sort_order = $sort_order;

		return $this;
	}

	/**
	 * Get the value of sort_order.
	 *
	 * @return integer
	 */
	public function getSortOrder()
	{
		return $this->sort_order;
	}

	/**
	 * Add Book entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\Book $book
	 * @return \Readroom\DBBundle\Entity\Language
	 */
	public function addBook(Book $book)
	{
		$this->books[] = $book;

		return $this;
	}

	/**
	 * Get Book entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getBooks()
	{
		return $this->books;
	}

	/**
	 * Add CategoriesDescription entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\CategoriesDescription $categoriesDescription
	 * @return \Readroom\DBBundle\Entity\Language
	 */
	public function addCategoriesDescription(CategoriesDescription $categoriesDescription)
	{
		$this->categoriesDescriptions[] = $categoriesDescription;

		return $this;
	}

	/**
	 * Get CategoriesDescription entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCategoriesDescriptions()
	{
		return $this->categoriesDescriptions;
	}

	/**
	 * Add MetaTagsCategory entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\MetaTagsCategory $metaTagsCategory
	 * @return \Readroom\DBBundle\Entity\Language
	 */
	public function addMetaTagsCategory(MetaTagsCategory $metaTagsCategory)
	{
		$this->metaTagsCategories[] = $metaTagsCategory;

		return $this;
	}

	/**
	 * Get MetaTagsCategory entity collection (one to many).
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getMetaTagsCategories()
	{
		return $this->metaTagsCategories;
	}

	/**
	 * Add Reader entity to collection.
	 *
	 * @param \Readroom\DBBundle\Entity\Reader $reader
	 * @return \Readroom\DBBundle\Entity\Language
	 */
	public function addReader(Reader $reader)
	{
		$reader->addLanguage($this);
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
		return array('id', 'name', 'code', 'image', 'sort_order');
	}
}