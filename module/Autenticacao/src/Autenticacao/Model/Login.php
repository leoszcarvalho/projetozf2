<?php

namespace Autenticacao\Model;

 class Login
 {
     public $id;
     public $login;
     public $senha;
     public $nivel;
    
     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->login = (!empty($data['login'])) ? $data['login'] : null;
         $this->senha  = (!empty($data['senha'])) ? $data['senha'] : null;
         $this->nivel  = (!empty($data['nivel'])) ? $data['nivel'] : null;
         
     }
     
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }
     
     
     
 }