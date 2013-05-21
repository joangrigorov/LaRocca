<?php

namespace App\Controller\Record;

use Quasar\Controller\Controller,
    App\Form\CallRecord,
    App\Mapper\CallRecords,
    App\Model\CallRecordEntity;

class Delete extends Controller
{
    
    /**
     * Record ID is expected
     * 
     * @var array
     */
    protected $paramsMap = array( 'id' => null );
    
    /**
     * Data Mapper for 'call_records' table
     * 
     * @var CallRecords
     */
    protected $mapper;
    
    /**
     * Constructor
     * 
     * Sets Data Mapper instance
     * 
     * @param CallRecords $mapper Data Mapper for 'call_records' table
     */
    public function __construct(CallRecords $mapper)
    {
        $this->mapper = $mapper;
    }
    
    public function execute()
    {
        
        $defaultNamespace = new \Zend_Session_Namespace('Logged');
       
        if (!isset($defaultNamespace->logged) || !isset($defaultNamespace->user)) {
            $baseUrl = dirname($_SERVER['SCRIPT_NAME']) == '/' ? '' : dirname($_SERVER['SCRIPT_NAME']);
                 header('Location: ' . $baseUrl . '/login');
        }
        
       $this->response->user= $defaultNamespace->user;
        
        // retrive record id
        $id = $this->getParam('id');
        
        $result = $this->mapper->deleteById($id);
        print $result;
        if ($result) {
            $baseUrl = dirname($_SERVER['SCRIPT_NAME']) == '/' ? '' : dirname($_SERVER['SCRIPT_NAME']);
                 header('Location: ' . $baseUrl . '/record');
        } 
    }
}