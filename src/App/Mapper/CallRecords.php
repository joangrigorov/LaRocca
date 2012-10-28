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
        $entity->setId($this->gateway->insert($data));
        return $this;
    }
    
}