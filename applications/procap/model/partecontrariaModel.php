<?php

/**
 * Este arquivo � parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */


class procap_model_partecontrariaModel extends classes_model_AbstractModel {



   function __construct(classes_controller_SystemController $controller){
      parent::__construct($controller);
   }


   public function formConfiguration(){

      $this->form->addFormRule($this,'formValidate') ;


   }



   function formValidate($fields) {

      $ret = true;

      $action = $this->controller->getAction()->getCrudAction() ;
      if($action == 'insert' || $action == 'update' ){

         if( isset($_POST['partecontraria'])  && $_POST['partecontraria']=='pessoa_fisica'){
            if(empty($fields['nome']) ) {
               $this->controller->getEnv()->formErrorMessages['nome'] = ' n�o pode ser vazio ' ;
               $this->form->getElement('nome')->setAttribute('class','error') ;
               $ret =  false;
            }
            if(empty($fields['sexo']) ) {
               $this->controller->getEnv()->formErrorMessages['sexo'] = ' n�o pode ser vazio ' ;
               $this->form->getElement('sexo')->setAttribute('class','error') ;
               $ret = false;
            }
         }

         elseif( isset($_POST['partecontraria'])  && $_POST['partecontraria']=='pessoa_juridica'){
            if(empty($fields['nome_fantasia']) ) {
               $this->controller->getEnv()->formErrorMessages['nome_fantasia'] = ' n�o pode ser vazio ' ;
               $this->form->getElement('nome_fantasia')->setAttribute('class','error') ;
               $ret =  false;
            }
            else{
               $this->form->getElement('nome')->setValue('');
            }
         }
         else{
            $this->controller->messages->addErrorMessage('Escolha Pessoa F�sica ou Pessoa Jur�dica.');
            $ret =  false;
         }
      }

      return $ret  ;

   }



   function getPaises(){
      return $this->facade->getPaises();
   }



   function getEstados($country_id){
      return $this->facade->getEstados($country_id);
   }


   function getCidades($estadoCodigo){
      return $this->facade->getCidades($estadoCodigo);
   }


   function getTipoPessoaDopartecontraria($partecontrariaId){
      return $this->facade->getDao('procap_dao_partecontrariaDAO')->getTipoPessoaDopartecontraria($partecontrariaId);
   }


}


?>