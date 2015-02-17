<?php

namespace Album\Model;

 use Zend\Db\TableGateway\TableGateway;

 class AlbumTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getAlbum($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveAlbum(Album $album)
     {
         $id = (int) $album->id;

         $imageName = basename($album->arq_imagem['tmp_name']);
         $txtName = basename($album->arq_texto['tmp_name']);
         
         $data = array(
             'artist' => $album->artist,
             'title'  => $album->title,
         );
          
         if(!empty($imageName)){$data['arq_imagem'] = $imageName;}
         if(!empty($txtName)){$data['arq_texto'] = $txtName;}
         
         
         //print_r($this->tableGateway->getSql($this->tableGateway->insert($data)));
         
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getAlbum($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Album id does not exist');
             }
         }
     }

     public function deleteAlbum($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }