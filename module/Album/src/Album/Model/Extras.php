<?php

namespace Album\Model;

class Extras 
{

    public function determinaOrdem($ordem)
     {
         if($ordem == 'ASC')
         {
             $ordem = 'DESC';
         }
         else if($ordem == 'DESC')
         {
             $ordem = 'ASC';
         }
         else
         {
             $ordem = false;
         }
         
         return $ordem;
     }
    
     
     public function existe($tipo)
     {
         switch ($tipo) 
         {
           case "title":$tipo=true;break;
           case "artist":$tipo=true;break;
           case "tipo":$tipo=true;break;
           default:$tipo=false;break;
       
         }
         
         return $tipo;
     
         
    }
     
}
