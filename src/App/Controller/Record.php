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
        $select = $this->mapper->browse();
        $adapter = new Doctrine($select);
        $adapter->getCountSelect();
    }
}