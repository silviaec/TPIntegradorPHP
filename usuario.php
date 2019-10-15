<?php
    class  Usuario{
        
        var $usuario;
        var $nombre;
        var $pass;
        
        function setUsuario($par){
            $this->usuario = $par;
        }
        function getUsuario(){
            return $this->usuario;
        }
        function setNombre($par){
            $this->nombre = $par;     
        }
        function getNombre(){
            return $this->nombre;
        }
        function setPass($par){
            $this->pass = $par;
        }
        function getPass(){
            return $this->pass;
        }
    }
  
    ?>