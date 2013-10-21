<?php

namespace Proxies\__CG__\Readroom\DBBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Book extends \Readroom\DBBundle\Entity\Book implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function setId($id)
    {
        $this->__load();
        return parent::setId($id);
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setBookAuthor($book_author)
    {
        $this->__load();
        return parent::setBookAuthor($book_author);
    }

    public function getBookAuthor()
    {
        $this->__load();
        return parent::getBookAuthor();
    }

    public function setBookName($book_name)
    {
        $this->__load();
        return parent::setBookName($book_name);
    }

    public function getBookName()
    {
        $this->__load();
        return parent::getBookName();
    }

    public function setBookSynopsis($book_synopsis)
    {
        $this->__load();
        return parent::setBookSynopsis($book_synopsis);
    }

    public function getBookSynopsis()
    {
        $this->__load();
        return parent::getBookSynopsis();
    }

    public function setPublicationYear($publication_year)
    {
        $this->__load();
        return parent::setPublicationYear($publication_year);
    }

    public function getPublicationYear()
    {
        $this->__load();
        return parent::getPublicationYear();
    }

    public function setSource($source)
    {
        $this->__load();
        return parent::setSource($source);
    }

    public function getSource()
    {
        $this->__load();
        return parent::getSource();
    }

    public function setISBNCode($ISBN_code)
    {
        $this->__load();
        return parent::setISBNCode($ISBN_code);
    }

    public function getISBNCode()
    {
        $this->__load();
        return parent::getISBNCode();
    }

    public function setBookPrice($book_price)
    {
        $this->__load();
        return parent::setBookPrice($book_price);
    }

    public function getBookPrice()
    {
        $this->__load();
        return parent::getBookPrice();
    }

    public function setBookIsFree($book_is_free)
    {
        $this->__load();
        return parent::setBookIsFree($book_is_free);
    }

    public function getBookIsFree()
    {
        $this->__load();
        return parent::getBookIsFree();
    }

    public function setBookFront($book_front)
    {
        $this->__load();
        return parent::setBookFront($book_front);
    }

    public function getBookFront()
    {
        $this->__load();
        return parent::getBookFront();
    }

    public function setDateAdded($date_added)
    {
        $this->__load();
        return parent::setDateAdded($date_added);
    }

    public function getDateAdded()
    {
        $this->__load();
        return parent::getDateAdded();
    }

    public function setLastModified($last_modified)
    {
        $this->__load();
        return parent::setLastModified($last_modified);
    }

    public function getLastModified()
    {
        $this->__load();
        return parent::getLastModified();
    }

    public function setBookTaxId($book_tax_id)
    {
        $this->__load();
        return parent::setBookTaxId($book_tax_id);
    }

    public function getBookTaxId()
    {
        $this->__load();
        return parent::getBookTaxId();
    }

    public function setBookViewed($book_viewed)
    {
        $this->__load();
        return parent::setBookViewed($book_viewed);
    }

    public function getBookViewed()
    {
        $this->__load();
        return parent::getBookViewed();
    }

    public function setMetatagsKeywords($metatags_keywords)
    {
        $this->__load();
        return parent::setMetatagsKeywords($metatags_keywords);
    }

    public function getMetatagsKeywords()
    {
        $this->__load();
        return parent::getMetatagsKeywords();
    }

    public function setOpfName($opf_name)
    {
        $this->__load();
        return parent::setOpfName($opf_name);
    }

    public function getOpfName()
    {
        $this->__load();
        return parent::getOpfName();
    }

    public function addComplaint(\Readroom\DBBundle\Entity\Complaint $complaint)
    {
        $this->__load();
        return parent::addComplaint($complaint);
    }

    public function getComplaints()
    {
        $this->__load();
        return parent::getComplaints();
    }

    public function addInput(\Readroom\DBBundle\Entity\Input $input)
    {
        $this->__load();
        return parent::addInput($input);
    }

    public function getInputs()
    {
        $this->__load();
        return parent::getInputs();
    }

    public function addLoan(\Readroom\DBBundle\Entity\Loan $loan)
    {
        $this->__load();
        return parent::addLoan($loan);
    }

    public function getLoans()
    {
        $this->__load();
        return parent::getLoans();
    }

    public function addOrdersBook(\Readroom\DBBundle\Entity\OrdersBook $ordersBook)
    {
        $this->__load();
        return parent::addOrdersBook($ordersBook);
    }

    public function getOrdersBooks()
    {
        $this->__load();
        return parent::getOrdersBooks();
    }

    public function addPresent(\Readroom\DBBundle\Entity\Present $present)
    {
        $this->__load();
        return parent::addPresent($present);
    }

    public function getPresents()
    {
        $this->__load();
        return parent::getPresents();
    }

    public function setLanguage(\Readroom\DBBundle\Entity\Language $language = NULL)
    {
        $this->__load();
        return parent::setLanguage($language);
    }

    public function getLanguage()
    {
        $this->__load();
        return parent::getLanguage();
    }

    public function setTax(\Readroom\DBBundle\Entity\Tax $tax = NULL)
    {
        $this->__load();
        return parent::setTax($tax);
    }

    public function getTax()
    {
        $this->__load();
        return parent::getTax();
    }

    public function addCategory(\Readroom\DBBundle\Entity\Category $category)
    {
        $this->__load();
        return parent::addCategory($category);
    }

    public function getCategories()
    {
        $this->__load();
        return parent::getCategories();
    }

    public function addReader(\Readroom\DBBundle\Entity\Reader $reader)
    {
        $this->__load();
        return parent::addReader($reader);
    }

    public function getReaders()
    {
        $this->__load();
        return parent::getReaders();
    }


    public function __sleep()
    {
        return array_merge(array('__isInitialized__'), parent::__sleep());
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}