<?php
    class  Noticia{
        
        var $titulo;
        var $subtitulo;
        var $fecha;
        var $noticiadesarrollo;
        var $tema;
        
        function setTitulo($par){
            $this->titulo = $par;     
        }
        function getTitulo(){
            return $this->titulo;
        }
        function setSubtitulo($par){
            $this->subtitulo = $par;
        }
        function getSubtitulo(){
            return $this->subtitulo;
        }
        function setFecha($par){
            $this->fecha = $par;     
        }
        function getFecha(){
            return $this->fecha;
        }
        function setNoticiadesarrollo($par){
            $this->noticiadesarrollo = $par;
        }
        function getNoticiadesarrollo(){
            return $this->noticiadesarrollo;
        }
        function setTema($par){
            $this->tema = $par;     
        }
        function getTema(){
            return $this->tema;
        }
    }

    ?>