<?php

namespace App\Mapper;

use App\Model\CallRecordEntity,
    App\Gateway\CallRecords AS TableGateway;

class CallRecords
{
    
    /**
     * The 'call_records' table data gateway
     * 
     * @var TableGateway
     */
    protected $gateway;
    
    /**
     * Constructor
     * 
     * Sets Table Data Gateway
     * 
     * @param TableGateway $gateway The 'call_records' table data gateway
     */
    public function __construct(TableGateway $gateway)
    {
        $this->gateway = $gateway;
    }
    
    /**
     * Insert new record in the database table
     * 
     * @param CallRecordEntity $entity Entity from which to get infromation
     * @return \App\Mapper\CallRecords Provides fluent interface
     */
    public function insert(CallRecordEntity $entity)
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
     * Delete record call by id
     * 
     * @param integer $id
     * @return \Quasar\Db\TableGateway\Row\Row|null
     */
    public function deleteById($id)
    {
        //$select = $this->gateway->delete()->where('id = ?');
        return $this->gateway->delete(array('id' => $id));
    }
    
}