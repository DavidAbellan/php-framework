<?php
    namespace Application\Controller;
    use Application\Providers\Doctrine;
    use Application\Models\Entities\User;

    class ContactController{
        protected $doctrine;
        public function __construct(Doctrine $doctrine)
        {


            $this->doctrine = $doctrine;

        }

            public function contact(){
             $user = $this->doctrine->em->getRepository(User::class)->find(4);
             $fecha = $user -> created_at;
             $fechaString = $fecha->format('Y-m-d H:i:s');




            echo('
               <link rel="stylesheet" href="./components/bootstrap/dist/css/bootstrap.css"> 
                  <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
                   <a class="navbar-brand" href="/">PHP Framework</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
                        aria-controls="navbarNav" ariaexpanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                    </button> 
                <div class="collapse navbar-collapse" id="navbarNav"> 
                   <ul class="navbar-nav"> 
                       <li class="nav-item active">
                          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>                      
                       </li>                        
                       <li class="nav-item">                           
                           <a class="nav-link" href="/contacto">Contacto</a>                      
                       </li>                   
                   </ul>
                 </div>
                 </nav>     
                   ');
            echo('<h1>Contacto</h1>');

            \Kint::dump($user);
            \Kint::dump($this -> doctrine);


            echo ('<h3>'.$user->name.'</h3>');
            echo ('<h5>'.$user->email.'</h5>');
            echo ('<p>Fecha creación: '.$fechaString.'</p>');

            ?>
            <form method="post" action="/contacto2">
                Escribe el nombre para modiﬁcar:
                <input type="text" name="nombre">
                <button type="submit">Enviar</button>
            </form>
            <?php









            }


        public function contact2 () {
            echo('       
           <link rel="stylesheet" href="./components/bootstrap/dist/css/bootstrap.css"> 
                  <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
                   <a class="navbar-brand" href="/">PHP Framework</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
                        aria-controls="navbarNav" ariaexpanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                    </button> 
                <div class="collapse navbar-collapse" id="navbarNav"> 
                   <ul class="navbar-nav"> 
                       <li class="nav-item active">
                          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>                      
                       </li>                        
                       <li class="nav-item">                           
                           <a class="nav-link" href="/contacto">Contacto</a>                      
                       </li>                   
                   </ul>
                 </div>
                 </nav>     
                   
                ');

            echo('<h1>Contacto</h1>');
            $user = $this->doctrine->em->getRepository(User::class)->find(4);
            if($_SERVER["REQUEST_METHOD"]=="POST") {
                $nom = $_POST['nombre'];
                $user->name = $nom;
                $this->doctrine->em->persist($user);
                $this->doctrine->em->flush();
                echo ('<h3>Nuevo nombre guardado: '.$nom.'</h3>');
                echo ('<a href=./contacto>Volver</a>');
            }


        }


        }
