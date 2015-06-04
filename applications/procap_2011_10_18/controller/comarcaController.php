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


class procap_controller_comarcaController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){
      $model = new procap_model_comarcaModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_comarcaFormStructure() ,'client' );
      $this->controller->env->forms['comarcaForm'] =  $form;

      $comarcaList =  $model->getList( new procap_model_structure_comarcaListStructure() );
      $this->controller->env->lists['comarcaList'] =  $comarcaList;

      $view = new procap_view_comarcaView($this->controller,$this->env);

   }

}
?>