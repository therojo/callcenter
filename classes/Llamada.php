<?php
/**
 * Description of Llamada
 *
 * @author itinajero
 */
class Llamada {
   private $id;
   private $fecha;
   private $idUsuario;
   private $idExtension;
   
   function __construct() {
      
   }

   public function getId() {
     return $this->id;
   }

   public function setId($id) {
     $this->id = $id;
   }

   public function getFecha() {
     return $this->fecha;
   }

   public function setFecha($fecha) {
     $this->fecha = $fecha;
   }

   public function getIdUsuario() {
     return $this->idUsuario;
   }

   public function setIdUsuario($idUsuario) {
     $this->idUsuario = $idUsuario;
   }

   public function getIdExtension() {
     return $this->idExtension;
   }

   public function setIdExtension($idExtension) {
     $this->idExtension = $idExtension;
   }


}
