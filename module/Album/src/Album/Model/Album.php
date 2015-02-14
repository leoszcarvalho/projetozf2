<?php

namespace Album\Model;

 class Album
 {
     public $id;
     public $artist;
     public $title;
     public $imagefile;
     public $txt;

     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
         $this->title  = (!empty($data['title'])) ? $data['title'] : null;
         $this->imagefile  = (!empty($data['imagefile'])) ? $data['imagefile'] : null;
         $this->txt  = (!empty($data['txt'])) ? $data['txt'] : null;
     }
     
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }
     
 }