<?php

/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package LiteFrame - lightWeight FrameWork
 * @version 1.0
 * @since   1.0
 * @author  Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright  2010 Anselmo S Ribeiro
 * @licence LGPL
 */


class procap_controller_relatoriosController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){


      $model = new procap_model_ultimosAndamentosModel($this->controller);
      $this->controller->env->listClientes = $model->getClientes($this->controller->user->getProperty('office_id'));


      $view = new procap_view_relatoriosView($this->controller,$this->env);

   }

}
?>