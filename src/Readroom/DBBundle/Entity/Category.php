<?php

namespace Readroom\DBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Readroom\DBBundle\Entity\Category
 *
 * @ORM\Entity()
 * @ORM\Table(name="categories")
 */
class Category
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $parent_id;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	protected $sort_order;

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $category_status;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $date_added;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $last_modified;

	/**
	 * @ORM\OneToMany(targetEntity="CategoriesDescription", mappedBy="category")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
	 */
	protected $categoriesDescriptions;

	/**
	 * @ORM\OneToMany(targetEntity="MetaTagsCategory", mappedBy="category")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
	 */
	protected $metaTagsCategories;

	/**
	 * @ORM\ManyToMany(targetEntity="Book", inversedBy="categories")
	 * @ORM\JoinTable(name="books_has_categories",
	 *     joinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")},
	 *     inverseJoinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id")}
	 * )
	 */
	protected $books;

	public function __construct()
	{
		$this->categoriesDescriptions = new ArrayCollection();
		$this->metaTagsCategories = new ArrayCollection();
		$this->books = new ArrayCollection();
	}

	/**
	 * Set the value of id.
	 *
	 * @param integer $id
	 * @return \Readroom\DBBundle\Entity\Category
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
	 * Set the value of parent_id.
	 *
	 * @param integer $parent_id
	 * @return \Readroom\DBBundle\Entity\Category
	 */
	public function setParentId($parent_id)
	{
		$this->parent_id = $parent_id;

		return $this;
	}

	/**
	 * Get the value of parent_id.
	 *
	 * @return integer
	 */
	public function getParentId()
	{
		return $this->parent_id;
	}

	/**
	 * Set the value of sort_order.
	 *
	 * @param integer $sort_order
	 * @return \Readroom\DBBundle\Entity\Category
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
	 * Set the value of category_status.
	 *
	 * @param boolean $category_status
	 * @return \Readroom\DBBundle\Entity\Category
	 */
	public function setCategoryStatus($category_status)
	{
		$this->category_status = $category_status;

		return $this;
	}

	/**
	 * Get the value of category_status.
	 *
	 * @return boolean
	 */
	public function getCategoryStatus()
	{
		return $this->category_status;
	}

	/**
	 * Set the value of date_added.
	 *
	 * @param datetime $date_added
	 * @return \Readroom\DBBundle\Entity\Category
	 */
	public function setDateAdded($date_added)
	{
		$this->date_added = $date_added;

		return $this;
	}

	/**
	 * Get the value of date_added.
	 *
	 * @return datetime
	 */
	public function getDateAdded()
	{
		return $this->date_added;
	}

	/**
	 * Set the value of last_modified.
	 *
	 * @param datetime $last_modified
	 * @return \Readroom\DBBundle\Entity\Category
	 */
	public function setLastModified($last_modified)
	{
		$this->last_modified = $last_modified;

		return $this;
	}

	/**
	 * Get the value of last_modified.
	 *
	 * @return datetime
	 */
	public function getLastModified()
	{
		return $this->last_modified;
	}

	/**
	 * Add CategoriesDescription entity to collection (one to many).
	 *
	 * @param \Readroom\DBBundle\Entity\CategoriesDescription $categoriesDescription
	 * @return \Readroom\DBBundle\Entity\Category
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
	 * @return \Readroom\DBBundle\Entity\Category
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
	 * Add Book entity to collection.
	 *
	 * @param \Readroom\DBBundle\Entity\Book $book
	 * @return \Readroom\DBBundle\Entity\Category
	 */
	public function addBook(Book $book)
	{
		$book->addCategory($this);
		$this->books[] = $book;

		return $this;
	}

	/**
	 * Get Book entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getBooks()
	{
		return $this->books;
	}

	public function __sleep()
	{
		return array('id', 'parent_id', 'sort_order', 'category_status', 'date_added', 'last_modified');
	}
}