<?php

namespace App\Controller\Record;

use Quasar\Controller\Controller,
    App\Form\CallRecord,
    App\Mapper\CallRecords,
    App\Model\CallRecordEntity;

class Add extends Controller
{
    
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
        /* @var $request \Quasar\Dispatcher\Request\Request */
        $request = $this->request;
        $form = new CallRecord();
        
        if ($request->isPost() && $form->isValid($request->getPost())) {
            $entity = new CallRecordEntity($form->getValues());
            $this->mapper->insert($entity);
            $id = $entity->getId();
            $baseUrl = dirname($_SERVER['SCRIPT_NAME']) == '/' ? '' : dirname($_SERVER['SCRIPT_NAME']);
            header('Location: ' . $baseUrl . '/record/edit/id/' . $id);
            exit;
        }
        
        $this->response->form = $form;
    }
}