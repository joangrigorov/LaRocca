<?php
namespace App\Controller;

use Lib\Paginator\Adapter\Doctrine;

use App\Mapper\CallRecords;

use Quasar\Controller\Controller;

class Record extends Controller
{
    
    protected $mapper;
    
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
        
        $this->response->user = $defaultNamespace->user;
        
        
        $records = $this->mapper->browse();
        $this->response->records = $records;
    }
}