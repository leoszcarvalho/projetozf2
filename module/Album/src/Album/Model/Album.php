<?php

namespace Album\Model;

 class Album
 {
     public $id;
     public $artist;
     public $title;
     public $arq_imagem;
     public $arq_texto;

     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
         $this->title  = (!empty($data['title'])) ? $data['title'] : null;
         $this->arq_imagem  = (!empty($data['arq_imagem'])) ? $data['arq_imagem'] : null;
         $this->arq_texto  = (!empty($data['arq_texto'])) ? $data['arq_texto'] : null;
     }
     
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }
     
 }