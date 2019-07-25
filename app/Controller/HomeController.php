<?php
      namespace Application\Controller ;
      use Application\Providers\Doctrine;
      use Application\Models\Entities\User;
use Application\Providers\View;


class HomeController {
    protected $doctrine;
    public function __construct(Doctrine $doctrine)
    {


        $this->doctrine = $doctrine;

    }


    public function index (View $view) {
        $user = $this->doctrine->em->getRepository(User::class)->find(2);


        echo $view->render('home.twig');

        \Kint::dump($user);
        \Kint::dump($this -> doctrine);

    }
    public function hola(string $nombre,View $view){
        echo $view->render('hola.twig',compact('nombre'));

    }


}


      ?>
