<?php
namespace Kalaweit\Core;

/**
* Gestion de l'application
* @author jeromeklam
*/
class Application
{

    /**
    * La requête
    * @var \Kalaweit\Core\Request
    */
    protected static $request = null;

    /**
    * Config
    * @var \Kalaweit\Core\Config
    */
    protected $config = null;

    /**
    * Constructeur
    *
    * @param \Kalaweit\Core\Config $p_config
    */
    public function __construct(\Kalaweit\Core\Config $p_config)
    {
        $this->config = $p_config;
    }

    /**
    * La requête
    */
    protected function getRequest()
    {
        if (self::$request === null) {
            self::$request = \Kalaweit\Core\Request::getInstance();
        }
        return self::$request;
    }

    /**
    * exécution
    */
    public function handle()
    {
        $request = $this->getRequest();
        // Je récupère l'url pour la décomposer et j'enlève le 1er / pour éviter [0] == ''


        $uri     = ltrim($request->getUri(), '/');

        $parts   = explode('?',$uri);
        $parts   = explode('/', $parts[0]);

        if (is_array($parts) && count($parts) > 1) {
            array_shift($parts);

            switch ($parts[0]) {

                case 'Kalaweit':

                    // Je construit le nom de la classe pour vérification

                    $class = '\\' . ucfirst($parts[0]) . '\\Controller\\' . ucfirst($parts[1]);

                    if (class_exists($class)) {

                        // J'instancie un nouvel élément de la classe
                        $obj = new $class();

                        switch ($parts[2]) {
                            case 'add':
                                if (method_exists($obj, 'add')){
                                    echo $obj->add();
                                };

                            break;

                            case 'get':
                            if (method_exists($obj, 'get')){
                                echo $obj->get($_GET['id']);
                            };
                            break;

                            case 'update':
                            if (method_exists($obj, 'update')){
                                echo $obj->update($parts[2]);
                            };

                            break;

                            case 'list':
                            if (method_exists($obj, 'get_list')){
                                echo $obj->get_list();
                            };
                            break;

                            default:
                                echo 'toto';
                                break;
                        };
                    };

                break;

                default:
                    echo '404.1';
                break;
            }
        } else {
            echo '404.0';
        }
    }
}
