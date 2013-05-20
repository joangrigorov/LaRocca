<?php

namespace App\Gateway;

use Quasar\Db\TableGateway\TableGateway;

class Users extends TableGateway
{
    protected $table = 'users';
}