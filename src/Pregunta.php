<?php

Namespace ExamenMultipleChoice;

class Pregunta {

    protected $items;
    protected $correctas;
    protected $incorrectas;
    protected $agregar;
    protected $opciones=[];
    protected $enunciado;
    protected $bandera;
    public function __construct($items){
        $this->items= $items;
        $this->correctas = $this->items["respuestas_correctas"];
        $this->incorrectas = $this->items["respuestas_incorrectas"];
        $this->agregar= [];
        $keys = array_keys($items);
    
        $bandera1=0;
        for ($i=0; $i<count($keys); $i++){
            if($keys[$i]=="ocultar_opcion_todas_las_anteriores"){
                $bandera1=1;
            }
        }
        $bandera2=0;
        for ($i=0; $i<count($keys); $i++){
            if($keys[$i]=="ocultas_opcion_ninguna_de_las_anteriores"){
                $bandera2=1;
            }
        }
        if ($bandera1==0) {
            $this->agregar[]="Todas las anteriores";
        }
        if ($bandera==2) {
            $this->agregar[]="Ninguna de las anteriores";
        }
        $this->opciones= array_merge($this->agregar, $this->correctas, $this->incorrectas);
        
        if(count($this->correctas)==0) {
            $this->correctas[]="Ninguna de las anteriores";
        }
        if ((count($this->incorrectas))==0) {
            $this->correctas[]="Todas las anteriores";
        }
        $this->enunciado = $this->items["descripcion"];
    }

    public function obtenerItems(){
        $this->items[0] = $this->enunciado;
        $this->items[1] = $this->mezclarOpciones();
        $this->items[2] = $this->correctas;
        return $this->items;
    }

    public function mezclarOpciones(){
        return shuffle($this->opciones);
    }

    public function obtenerCorrectas(){
        return $this->correctas;
    }

    public function obtenerEnunciado(){
        return $this->enunciado;
    }

    public function mostrarItems(){
        print_r($this->items);
    }
}