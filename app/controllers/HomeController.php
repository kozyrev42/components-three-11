<?php
namespace App\controllers;

use App\QueryBuilder;
use League\Plates\Engine;

class HomeController
{
    private $templates;
    public function __construct()
    {
        // создаём Экземпляр видов, для дальнейшего использования его методов
        $this->templates = new Engine('../app/views'); // передаём путь до моих Видов в views
    }

    public function index($vars)
    {
        // объект подключения к базе
        $db = new QueryBuilder();

        $posts = $db->getAll('email_list');
        //d($posts);exit;
        // Render a template
        echo $this->templates->render('homepage', ['postsInView' => $posts]); // в вид передаём результат вызова из базы ['posts' => $posts]
    }

    public function about($vars)
    {
        // Render a template
        echo $this->templates->render('about', ['name' => 'Jonathan about']);
    }
}
