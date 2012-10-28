<?php

namespace App\Model;

use Quasar\Entity\Standard;

class CallRecordEntity extends Standard
{
    
    /**
     * ID
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Person's name
     * 
     * @var string
     */
    protected $name;
    
    /**
     * Person's phone
     * 
     * @var string
     */
    protected $phone;
    
    /**
     * Record description
     * 
     * @var string
     */
    protected $content;
    
    /**
     * Record date
     * 
     * @var string
     */
    protected $date;
    
	/**
     * Getter for CallRecordEntity::$id
     * 
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * Setter for CallRecordEntity::$id
     * 
     * @param number $id
     * @return CallRecordEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

	/**
     * Getter for CallRecordEntity::$name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

	/**
     * Setter for CallRecordEntity::$name
     * 
     * @param string $name
     * @return CallRecordEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

	/**
     * Getter for CallRecordEntity::$phone
     * 
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

	/**
     * Setter for CallRecordEntity::$phone
     * 
     * @param string $phone
     * @return CallRecordEntity
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

	/**
     * Getter for CallRecordEntity::$content
     * 
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

	/**
     * Setter for CallRecordEntity::$content
     * 
     * @param string $content
     * @return CallRecordEntity
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

	/**
     * Getter for CallRecordEntity::$date
     * 
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

	/**
     * Setter for CallRecordEntity::$date
     * 
     * @param string $date
     * @return CallRecordEntity
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
    
    public function __construct(array $data = null)
    {
        if (null !== $data) {
            $this->populate($data);
        }
    }
    
}