<?php

     namespace Application\Providers;

     class View {
         protected $twig;

         public function __construct(){

             $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../resource/views');
             $twig = new \Twig_Environment($loader);
             $twigFunctions = new \Twig_SimpleFunction(\TwigFunctions::class,
                 function ($method,$params=[]){

                     return \TwigFunctions::$method($params);

                 });
             $twig->addFunction($twigFunctions);
             $this -> twig=$twig;


         }
         public function render(string $view, array $data = []):string {
             return $this->twig->render($view,$data);

         }
     }