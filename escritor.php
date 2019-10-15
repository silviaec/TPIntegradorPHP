<?php
    class  Escritor{
        
        var $nombre;
        var $edad;
        
        function setNombre($par){
            $this->nombre = $par;     
        }
        function getNombre(){
            return $this->nombre;
        }
       function setEdad($par){
            $this->edad = $par;
        }
        function getEdad(){
            return $this->edad;
        }
    }
  
    ?>