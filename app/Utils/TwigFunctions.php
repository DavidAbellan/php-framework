<?php
     class TwigFunctions {
         static $container;

         public static function setContainer(
           Psr\Container\ContainerInterface $container
         ){
             self::$container = $container;

         }
     }

     ?>