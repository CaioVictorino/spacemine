<?php

namespace Routes;

/* CONTROLLERS LIST */
use Controllers\homeController;
use Controllers\adminController;
use Controllers\brandsController;
use Controllers\categoriesController;
use Controllers\costumerController;
use Controllers\equipmentsController;
use Controllers\pagesController;
use Controllers\servicesController;
use Controllers\utilitiesController;


class routeList{

     public function pathFinder($uri)
     {
          if(!isset($_SERVER['QUERY_STRING'])){
               $params = "";
          } else {
               $params = $_SERVER['QUERY_STRING'];
          }
          
   

          $cGet = count($_GET);

          if(!isset($_GET['id'])){
               $uid = null;
          }

          $routes = [
               "/" => [
                    "class" => homeController::class,
                    "method" => "index",
                    "access" => "public"
               ],

               /* Admin Routes */
               "/admin" => [
                    "class" => adminController::class,
                    "method" => "index",
                    "access" => "admin"
               ],
               "/admin/representante" => [
                    "class" => costumerController::class,
                    "method" => "index",
                    "access" => "admin"
               ],
               "/admin/representante/criar" => [
                    "class" => costumerController::class,
                    "method" => "register",
                    "access" => "admin"
               ],
               "/admin/representante/excluir?".$params => [
                    "class" => costumerController::class,
                    "method" => "delete",
                    "access" => "admin"
               ],
               "/admin/representante/editar?".$params => [
                    "class" => costumerController::class,
                    "method" => "edit",
                    "access" => "admin"
               ],
               "/admin/representante/update" => [
                    "class" => costumerController::class,
                    "method" => "update",
                    "access" => "admin"
               ],
               "/admin/agendamento" => [
                    "class" => costumerController::class,
                    "method" => "update",
                    "access" => "admin"
               ],
               "/admin/utilidades" => [
                    "class" => utilitiesController::class,
                    "method" => "index",
                    "access" => "admin"
               ],
               "/admin/paginas" => [
                    "class" => costumerController::class,
                    "method" => "update",
                    "access" => "admin"
               ],
               "/admin/categorias" => [
                    "class" => categoriesController::class,
                    "method" => "index",
                    "access" => "admin"
               ],
               "/admin/categorias/criar" => [
                    "class" => categoriesController::class,
                    "method" => "register",
                    "access" => "admin"
               ],
               "/admin/categorias/editar?".$params => [
                    "class" => categoriesController::class,
                    "method" => "edit",
                    "access" => "admin"
               ],
               "/admin/categorias/update" => [
                    "class" => categoriesController::class,
                    "method" => "update",
                    "access" => "admin"
               ],
               "/admin/categorias/excluir?".$params => [
                    "class" => categoriesController::class,
                    "method" => "delete",
                    "access" => "admin"
               ],
               "/admin/utilidades" => [
                    "class" => utilitiesController::class,
                    "method" => "index",
                    "access" => "admin"
               ],
               "/admin/utilidades/criar" => [
                    "class" => utilitiesController::class,
                    "method" => "register",
                    "access" => "admin"
               ],
               "/admin/utilidades/editar?".$params => [
                    "class" => utilitiesController::class,
                    "method" => "edit",
                    "access" => "admin"
               ],
               "/admin/utilidades/update" => [
                    "class" => utilitiesController::class,
                    "method" => "update",
                    "access" => "admin"
               ],
               "/admin/utilidades/excluir?".$params => [
                    "class" => utilitiesController::class,
                    "method" => "delete",
                    "access" => "admin"
               ],
               "/admin/paginas" => [
                    "class" => pagesController::class,
                    "method" => "index",
                    "access" => "admin"
               ],
               "/admin/brands" => [
                    "class" => brandsController::class,
                    "method" => "index",
                    "access" => "admin"
               ],
               "/admin/brands/criar" => [
                    "class" => brandsController::class,
                    "method" => "register",
                    "access" => "admin"
               ],
               "/admin/brands/editar?".$params => [
                    "class" => brandsController::class,
                    "method" => "edit",
                    "access" => "admin"
               ],
               "/admin/brands/update" => [
                    "class" => brandsController::class,
                    "method" => "update",
                    "access" => "admin"
               ],
               "/admin/brands/excluir?".$params => [
                    "class" => brandsController::class,
                    "method" => "delete",
                    "access" => "admin"
               ],
               "/admin/equipamentos" => [
                    "class" => equipmentsController::class,
                    "method" => "index",
                    "access" => "admin"
               ],
               "/admin/equipamentos/criar" => [
                    "class" => equipmentsController::class,
                    "method" => "register",
                    "access" => "admin"
               ],
               "/admin/equipamentos/editar?".$params => [
                    "class" => equipmentsController::class,
                    "method" => "edit",
                    "access" => "admin"
               ],
               "/admin/equipamentos/update" => [
                    "class" => equipmentsController::class,
                    "method" => "update",
                    "access" => "admin"
               ],
               "/admin/equipamentos/excluir?".$params => [
                    "class" => equipmentsController::class,
                    "method" => "delete",
                    "access" => "admin"
               ],
               "/admin/servicos" => [
                    "class" => servicesController::class,
                    "method" => "index",
                    "access" => "admin"
               ],
               "/admin/servicos/editar?".$params => [
                    "class" => servicesController::class,
                    "method" => "delete",
                    "access" => "admin"
               ],
               "/admin/servicos/update" => [
                    "class" => servicesController::class,
                    "method" => "delete",
                    "access" => "admin"
               ],
               "/admin/servicos/excluir?".$params => [
                    "class" => servicesController::class,
                    "method" => "delete",
                    "access" => "admin"
               ]
               
          ];

          if(!array_key_exists($uri, $routes))
          {
               http_response_code(404);
               die;
          }
     
          return $routes[$uri];
     }

}