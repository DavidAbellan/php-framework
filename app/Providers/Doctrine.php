<?php
namespace Application\Providers;
use Psr\Container\ContainerInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationRegistry;


class Doctrine{
        public $em;
        public function __construct(ContainerInterface $container)
        {
            $dbconfig = $container->get('config.database');

            $paths = [
                __DIR__.'/../../app/Models/Entities',
                __DIR__.'/../../app/Models/Repositories'
            ];
            $isDevMode = true;
            $conﬁg = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null,false);
            $this->em =EntityManager::create($dbconfig,$conﬁg);
            AnnotationRegistry::registerLoader('class_exists');

            //AnnotationRegistry::registerLoader('class_exists');
            //AnnotationRegistry::registerLoader('loadClass');



            \Kint::dump($dbconfig);
        }
    }


