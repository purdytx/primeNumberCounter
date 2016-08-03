<?php
/**
* boostrap file
* prime numbers project
* August 2016
* Purdy
*
* Phalcon boostrap loader file
* sets up MVC structure under the ../app folder
*
* for future notes and elaboration:
*     custom routing
*     session iniation (via native or redis, etc)
*     database connection
*     etc should all start here utilizing phalcon's dependency injection
*/
//use Phalcon\Mvc\Router;
//use Phalcon\Session\Adapter\Files as Session;

try {
    //Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/'
    ))->register();

    //Create a DI
    $di = new Phalcon\DI\FactoryDefault();

    //Setup the view component
    $di->set('view', function(){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

    //Setup a base URI
    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/');

        return $url;
    });

    $di->set('modelsManager', function() {
        return new Phalcon\Mvc\Model\Manager();
    });

    //Handle the request
    $application = new \Phalcon\Mvc\Application($di);
  
    if (!empty($_SERVER['PATH_INFO'])) {
       $pathInfo = $_SERVER['PATH_INFO'];
    } else {
       $pathInfo = '/';
    }

    echo $application->handle($pathInfo)->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}

