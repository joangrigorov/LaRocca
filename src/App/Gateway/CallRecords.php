<?php

namespace App\Gateway;

use Quasar\Db\TableGateway\TableGateway;

class CallRecords extends TableGateway
{
    protected $table = 'call_records';
}