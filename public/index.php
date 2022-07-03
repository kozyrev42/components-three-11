<?php

require '../vendor/autoload.php';

//echo "11";

// записываем в диспетчер пути, которые будут доступны в приложении  
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    // добавление роута, указываем ('метод-доступа','путь-в-URL-при-котором-вызовем-контроллер','контроллер-обработчик-которая-будет-вызываться')
    $r->addRoute('GET', '/users', 'get_all_users_handler');        //  http://localhost/users
    // {id} must be a number (\d+) // id - должен быть цифрой
    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');    //  http://localhost/user/5
    // The /{title} suffix is optional  // опциональный, не обязательный параметр
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// получение данных из Глобального массива
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);


// в метод dispatch - закидываются нужные данные ("метод-которым-выполнен-запрос","")
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
//d($routeInfo);

// обработка пути из URL
switch ($routeInfo[0]) {    // по умолчание $routeInfo[0]

    case FastRoute\Dispatcher::NOT_FOUND:   // NOT_FOUND - константа содержит "0"
        // кейс в котором - $routeInfo[0] - такой страницы не существует 
        echo '404 страницы не существует';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:      // METHOD_NOT_ALLOWED - константа содержит "2"
        $allowedMethods = $routeInfo[1];
        echo ' 405 Роут вызван не правильным методом';
        break;
    case FastRoute\Dispatcher::FOUND:       // FOUND - константа содержит "1"
        $handler = $routeInfo[1];       // получение "название" обработчика, который прописан в диспетчере 'simpleDispatcher'
        $vars = $routeInfo[2];          // параметры которые пришли с запросом, их можно использовать
        //d($handler);
        d($vars);
        // если путь в диспетчере существует, вызван нужным методом, и передана имя контроллера =>
        // => можем вызвать контроллер(функцию) 

        // вызывает функцию по имени которое ей передали, и передаёт ей параметры
        call_user_func($handler, $vars);
break;
}

// функция которая будет вызываться из Роутера
function get_user_handler($vars) 
{
    echo $vars["id"];
};
