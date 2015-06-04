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


class procap_controller_andamentoController extends  classes_controller_AbstractSystemController {

   function  __construct($controller){
      $this->controller = $controller;
   }

   function execute(){
      $model = new procap_model_andamentoModel($this->controller);

      $form =  $model->getForm( new procap_model_structure_andamentoFormStructure() ,'client' );

      if($form){

         $form->getElement('processo_id')->setValue($_GET['pc']);
         if( $form->elementExists(INSERT_BUTTON_NAME)  ){
            $form->getElement(INSERT_BUTTON_NAME)->setValue('Salvar Andamento');
         }
         if( $form->elementExists(UPDATE_BUTTON_NAME)  ){
            $form->getElement(UPDATE_BUTTON_NAME)->setValue('Salvar Andamento');
         }
         if( $form->elementExists(NEW_BUTTON_NAME)  ){
            $form->getElement(NEW_BUTTON_NAME)->setValue('Novo Andamento');
         }
         if( $form->elementExists(DELETE_BUTTON_NAME)  ){
            $form->getElement(DELETE_BUTTON_NAME)->setValue('Excluir Andamento');
         }
         if( $form->elementExists(LIST_BUTTON_NAME)  ){
            $form->getElement(LIST_BUTTON_NAME)->setValue('Ver Andamentos');
         }
      }

      $this->controller->env->forms['andamentoForm'] =  $form;

      $andamentoList =  $model->getList( new procap_model_structure_andamentoListStructure() );
      $this->controller->env->lists['andamentoList'] =  $andamentoList;

      $this->controller->env->pastaProcesso =  $model->getPastaDeProcesso($_GET['pc']);

      $view = new procap_view_andamentoView($this->controller,$this->env);

   }

}
?>