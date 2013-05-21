<?php

namespace App\Controller\Record;

use Quasar\Controller\Controller,
    App\Form\CallRecord,
    App\Mapper\CallRecords,
    App\Model\CallRecordEntity;

class Edit extends Controller
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
        
        $callRecord = $this->mapper->findById($id);
        
        if (empty($callRecord)) {
            $this->response->error = 'Записът не е открит';
            return;
        }
        
        $this->response->callRecord = $callRecord;
        
        /* @var $request \Quasar\Dispatcher\Request\Request */
        $request = $this->request;
        $form = new CallRecord;
        
        $form->populate($callRecord->toArray());
        
        $form->getElement('submit')->setLabel('Редакция');
        
        if ($request->isPost() && $form->isValid($request->getPost())) {
            $callRecord->populate($form->getValues())
                       ->save();
            $this->response->success = 'Записът е редактиран успешно';
        }
        
        $this->response->form = $form;
    }
}