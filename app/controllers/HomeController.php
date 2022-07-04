<?php
namespace App\controllers;

use App\QueryBuilder;

class HomeController
{
    public function index($vars)
    {
        $db = new QueryBuilder();
        $db->update(['title'=>'new post' ], 3, 'email_list');
    }
}
