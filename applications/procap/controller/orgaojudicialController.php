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


class procap_controller_orgaojudicialController extends classes_controller_AbstractSystemController {    /**     * @var classes_controller_SystemController     */    private $controller;

   function __construct(classes_controller_SystemController $controller) {
      $this->controller = $controller;
   }

   function execute(){
      $model = new procap_model_orgaojudicialModel($this->controller);


      $form =  $model->getForm( new procap_model_structure_orgaojudicialFormStructure() ,'client' );
      $this->controller->getEnv()->forms['orgaojudicialForm'] =  $form;

      // pr($form);


      if(isset($_POST['id'])) {
         $this->controller->getEnv()->request['turmas'] = $model->getTurmasDeOrgaoJudicial($_POST['id']);
      }
      else{
         $this->controller->getEnv()->request['turmas'] = null;
      }

      $orgaojudicialList =  $model->getList( new procap_model_structure_orgaojudicialListStructure() );
      $this->controller->getEnv()->lists['orgaojudicialList'] =  $orgaojudicialList;

      $view = new procap_view_orgaojudicialView($this->controller,$this->getEnv());

   }

}
?>
