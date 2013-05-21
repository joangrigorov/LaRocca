<?php
namespace App\Controller;

use Quasar\Controller\Controller;

class Index extends Controller
{
    
    protected function getNamespace()
    {
        return __NAMESPACE__;
    }
    
    public function execute()
    {
        $defaultNamespace = new \Zend_Session_Namespace('Logged');
       
        if (!isset($defaultNamespace->logged) || !isset($defaultNamespace->user)) {
            $baseUrl = dirname($_SERVER['SCRIPT_NAME']) == '/' ? '' : dirname($_SERVER['SCRIPT_NAME']);
                 header('Location: ' . $baseUrl . '/login');
        }
        
       $this->response->user= $defaultNamespace->user;
    }
}