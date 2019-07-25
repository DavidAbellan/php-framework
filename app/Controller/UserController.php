<?php
namespace Application\Controller ;
use Application\Providers\Doctrine;
use Application\Models\Entities\User;
use Application\Providers\View;


class UserController {
    protected $doctrine;
    public function __construct(Doctrine $doctrine)
    {


        $this->doctrine = $doctrine;

    }


    public function users (View $view) {
        $users = $this->doctrine->em->getRepository(User::class)->findAll();


        echo $view->render('users.twig',compact('users'));

        \Kint::dump($users);
        \Kint::dump($this -> doctrine);

    }



}