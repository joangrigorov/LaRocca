<?php

namespace App\Model;

use Quasar\Entity\Standard;

class UsersEntity extends Standard
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
    protected $username;
    
    /**
     * Person's password
     * 
     * @var string
     */
    protected $phone;
    
   
    
	/**
     * Getter for UsersEntity::$id
     * 
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * Setter for UsersEntity::$id
     * 
     * @param number $id
     * @return UsersEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

	/**
     * Getter for UsersEntity::$username
     * 
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

	/**
     * Setter for UsersEntity::$username
     * 
     * @param string $name
     * @return UsersEntity
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

	/**
     * Getter for UsersEntity::$password
     * 
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

	/**
     * Setter for UsersEntity::$password
     * 
     * @param string $password
     * @return UsersEntity
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    
    public function __construct(array $data = null)
    {
        if (null !== $data) {
            $this->populate($data);
        }
    }
    
}