<?php

namespace App\Mapper;

use App\Model\UsersEntity,
    App\Gateway\Users AS TableGateway;

class Users
{
    
    /**
     * The 'users' table data gateway
     * 
     * @var TableGateway
     */
    protected $gateway;
    
    /**
     * Constructor
     * 
     * Sets Table Data Gateway
     * 
     * @param TableGateway $gateway The 'users' table data gateway
     */
    public function __construct(TableGateway $gateway)
    {
        $this->gateway = $gateway;
    }
    
    /**
     * Insert new record in the database table
     * 
     * @param UsersEntity $entity Entity from which to get infromation
     * @return \App\Mapper\Users Provides fluent interface
     */
    public function insert(UsersEntity $entity)
    {
        $entity->setId(null);
        $data = $entity->toArray();
        $this->gateway->insert($data);
        $entity->setId($this->gateway->lastInsertId());
        return $this;
    }
    
    /**
     * Find record call by id
     * 
     * @param integer $id
     * @return \Quasar\Db\TableGateway\Row\Row|null
     */
    public function findById($id)
    {
        $select = $this->gateway->select()->where('id = ?');
        return $this->gateway->fetchRow($select, array($id));
    }
    
    /**
     * Browse all call records
     * 
     * @return \Doctrine\DBAL\Query\QueryBuilder
     */
    public function browse()
    {
        return $this->gateway->fetchAll();
    }
    
    /**
     * Authenticate
     */
    public function authenticate(UsersEntity $entity)
    {
       $select = $this->gateway->select()->where('username = ? and password = ?');
       $pass = md5($entity->getPassword());
       $username=  $entity->getUsername();
       $result = $this->gateway->fetchRow($select,array($username,$pass));
       
       //TODO: change this
       $defaultNamespace = new \Zend_Session_Namespace('Logged');
       if (!is_null($result)) {
           $defaultNamespace->logged = true;
           $defaultNamespace->user = $username;
           return true;
       } else {
           $defaultNamespace->logged = false;
           return false;
       }
       
    }
    
}