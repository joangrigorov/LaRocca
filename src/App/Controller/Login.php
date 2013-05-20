<?php
namespace App\Controller;

use Quasar\Controller\Controller,
    App\Form\LoginForm,
    App\Mapper\Users,
    App\Model\UsersEntity;


class Login extends Controller
{
    
    /**
     * Constructor
     * 
     * Sets Data Mapper instance
     * 
     * @param Users $mapper Data Mapper for 'users' table
     */
    public function __construct(Users $mapper)
    {
        $this->mapper = $mapper;
    }
    
    protected function getNamespace()
    {
        return __NAMESPACE__;
    }
    
    public function execute()
    {
         $this->layout('login-layout');
         $form  = new LoginForm;
         /* @var $request \Quasar\Dispatcher\Request\Request */
            $request = $this->request;
         
         if ($request->isPost() && $form->isValid($request->getPost())) {
             $entity = new UsersEntity($form->getValues());
             $result = $this->mapper->authenticate($entity);
            
             if ($result) {
                 $baseUrl = dirname($_SERVER['SCRIPT_NAME']) == '/' ? '' : dirname($_SERVER['SCRIPT_NAME']);
                 header('Location: ' . $baseUrl . '/index');
             }
         }
         
         $this->response->form = $form;
    }
}