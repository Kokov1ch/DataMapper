<?php
namespace App\Core;
use App\Controller;
use App\Repository;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
class Application{
    private Controller\mainController $controller;
    private Repository\PersonRepository $repository;
    public function __construct(){
        $loader = new FilesystemLoader(dirname(__DIR__,1) . '/View/');
        $twig = new Environment($loader);
        $this->controller = new Controller\MainController($twig);
        $this->repository = new Repository\PersonRepository();
    }
    public function run(){
        $this->controller->execute();

        if (isset($_GET['getId'])){
            $this->controller->getAll($this->repository->getById($_GET['id']));
        }

        if (isset($_GET['phoneNum'])){
            $this->controller->getAll($this->repository->getByPhoneNumber($_GET['phone']));
        }
        if (isset($_GET['delete'])){
            $this->repository->deleteById($_GET['delId']);
        }

        if (isset($_GET['add'])){
            $this->repository->add($_GET['name'],$_GET['phoneNumb'],$_GET['address']);
        }

        if (isset($_GET['getAll']))
            $this->controller->getAll($this->repository->getAll());

        if (isset($_GET['getById'])) {
            $this->controller->getById();
        }
        if (isset($_GET['getByPhoneNumber']))
            $this->controller->getByPhoneNumber();

        if (isset($_GET['deleteById']))
            $this->controller->delete();

        if (isset($_GET['add']))
            $this->controller->add();
    }

}

