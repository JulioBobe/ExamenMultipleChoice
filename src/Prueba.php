<?php

Namespace ExamenMultipleChoice;

require_once __DIR__.'/../vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Twig\Twig;
class Prueba {

    protected $archivo;
    protected $preguntas;
    protected $examenes=[];

    public function __construct($direccion=""){
        $yaml = new Parser();
        $this->archivo = $yaml->parse(file_get_contents($direccion));
        $this->preguntas= [];
        for($i=0; $i<count($this->archivo["preguntas"]); $i++){
            $this->preguntas[$i]= new Pregunta($this->archivo["preguntas"][$i]);
        }
    }
    public function obtenerArchivo(){
        return $this->archivo;
    }

    public function obtenerPreguntas(){
        return $this->preguntas;
    }

    public function mezclarPreguntas(){
       return shuffle($this->preguntas);
    }

    public function htmlPrueba($i, $j){
/* {{<html>
  <head>
    <title>Exam</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name=viewport content="width=device-width, initial-scale=1">

    <style>
      .question {
          border: 1px solid gray;
          padding: 0.3em;
      }
      .number {
          float: left;
          margin-right: 0.5em;
          font-weight: bold;
      }
      .options {
          display: flex;
          flex-direction: column;
      }
      .short {
          display: grid;
          grid-template-columns: 1fr 1fr;
          grid-gap: 1em;
      }
      .questions {
          display: grid;
          grid-template-columns: 1fr 1fr;
          grid-gap: 1em 1em;
      }
      .header {
          display: flex;
          justify-content: space-between;
          margin-bottom: 1em;
      }
      .description {
          margin-bottom: 0.5em;
          font-weight: bold;
      }
      body {
        font-size: 12px;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <strong>Nombre y Apellido _____________________________________________ </strong>
      <strong>Evaluación número {{$i}}</strong>
      <strong>TEMA {{$j}}</strong>
    </div>
    <div class="questions">
      <div class='question'>
        <div class='number'>1)______</div>
        <div class='description'>{{$this->preguntas[0]->obtenerEnunciado()}}</div>
        <div class='options short'>
          <div class='option'>A) Ataques de fuerza bruta.</div>
          <div class='option'>B) Phishing.</div>
          <div class='option'>C) Envio masivo de spam.</div>
          <div class='option'>D) Sabotaje de routers.</div>
          <div class='option'>E) Ataques de denegación de servicio.</div>
          <div class='option'>F) Todas las anteriores.</div>
          <div class='option'>G) Ninguna de las anteriores.</div>
        </div>
      </div>
      <div class='question'>
        <div class='number'>2)______</div>
        <div class='description'>{{$this->preguntas[1]->obtenerEnunciado()}}</div>
        <div class='options short'>
          <div class='option'>A) es del tipo inyeccion SQL.</div>
          <div class='option'>B) es del tipo DDOS.</div>
          <div class='option'>C) es del tipo XSS.</div>
          <div class='option'>D) es del tipo CSFR.</div>
          <div class='option'>E) Todas las anteriores.</div>
          <div class='option'>F) Ninguna de las anteriores.</div>
        </div>
      </div>
      <div class='question'>
        <div class='number'>3)______</div>
        <div class='description'>{{$this->preguntas[2]->obtenerEnunciado()}}</div>
        <div class='options short'>
          <div class='option'>A) Mitigar el riesgo.</div>
          <div class='option'>B) Evitar el riesgo.</div>
          <div class='option'>C) Transferir el riesgo.</div>
          <div class='option'>D) Asumir el riesgo.</div>
          <div class='option'>E) Aceptar el riesgo.</div>
          <div class='option'>F) Todas las anteriores.</div>
          <div class='option'>G) Ninguna de las anteriores.</div>
        </div>
      </div>
      <div class='question'>
        <div class='number'>4)______</div>
        <div class='description'>{{$this->preguntas[3]->obtenerEnunciado()}}</div>
        <div class='options short'>
          <div class='option'>A) .doc</div>
          <div class='option'>B) .pdf</div>
          <div class='option'>C) .xls</div>
          <div class='option'>D) .jpg</div>
          <div class='option'>E) .exe</div>
          <div class='option'>F) Ninguna de las anteriores.</div>
        </div>
      </div>
      <div class='question'>
        <div class='number'>5)______</div>
        <div class='description'>{{$this->preguntas[4]->obtenerEnunciado()}}</div>
        <div class='options short'>
          <div class='option'>A) Ransonware.</div>
          <div class='option'>B) Virus.</div>
          <div class='option'>C) Rootkits.</div>
          <div class='option'>D) Troyanos.</div>
          <div class='option'>E) Gusanos.</div>
          <div class='option'>F) Todas las anteriores.</div>
          <div class='option'>G) Ninguna de las anteriores.</div>
        </div>
      </div>
      <div class='question'>
        <div class='number'>6)______</div>
        <div class='description'>{{$this->preguntas[5]->obtenerEnunciado()}}</div>
        <div class='options short'>
          <div class='option'>A) es del tipo CSFR.</div>
          <div class='option'>B) es del tipo inyeccion SQL.</div>
          <div class='option'>C) es del tipo DDOS.</div>
          <div class='option'>D) es del tipo XSS.</div>
          <div class='option'>E) Todas las anteriores.</div>
          <div class='option'>F) Ninguna de las anteriores.</div>
        </div>
      </div>
      <div class='question'>
        <div class='number'>7)______</div>
        <div class='description'>{{$this->preguntas[6]->obtenerEnunciado()}}</div>
        <div class='options short'>
          <div class='option'>A) Troyanos.</div>
          <div class='option'>B) Rootkits.</div>
          <div class='option'>C) Virus de Macro.</div>
          <div class='option'>D) Ransonware.</div>
          <div class='option'>E) Gusanos.</div>
          <div class='option'>F) Todas las anteriores.</div>
          <div class='option'>G) Ninguna de las anteriores.</div>
        </div>
      </div>
      <div class='question'>
        <div class='number'>8)______</div>
        <div class='description'>{{$this->preguntas[7]->obtenerEnunciado()}}</div>
        <div class='options long'>
          <div class='option'>A) evitar el hackeo por parte de los script-kiddies.</div>
          <div class='option'>B) instalar varios antivirus para aumementar la protección de datos.</div>
          <div class='option'>C) colocar los data-centers en subsuelos.</div>
          <div class='option'>D) asegurar los cables subterraneos.</div>
          <div class='option'>E) definir varias capas de protecion para las comunicaciones de internet.</div>
          <div class='option'>F) Ninguna de las anteriores.</div>
        </div>
      </div>
      <div class='question'>
        <div class='number'>9)______</div>
        <div class='description'>{{$this->preguntas[8]->obtenerEnunciado()}}</div>
        <div class='options short'>
          <div class='option'>A) Impactos</div>
          <div class='option'>B) Amenazas</div>
          <div class='option'>C) Recursos</div>
          <div class='option'>D) Vulnerabilidades</div>
          <div class='option'>E) Riesgos</div>
          <div class='option'>F) Todas las anteriores.</div>
          <div class='option'>G) Ninguna de las anteriores.</div>
        </div>
      </div>
      <div class='question'>
        <div class='number'>10)______</div>
        <div class='description'>{{$this->preguntas[9]->obtenerEnunciado()}}</div>
        <div class='options short'>
          <div class='option'>A) Elimininar las pruebas que revelan el ataque.</div>
          <div class='option'>B) Comprometer el sistema.</div>
          <div class='option'>C) Explorar vulnerabilidades detectadas.</div>
          <div class='option'>D) Buscar vulnerabilidades en el sistema.</div>
          <div class='option'>E) Descubir y explorar el sistema informatico.</div>
          <div class='option'>F) Todas las anteriores.</div>
          <div class='option'>G) Ninguna de las anteriores.</div>
        </div>
      </div>
    </div>
  </body>
</html>}}*/
    }
    public function generarExamenes($cant=1, $num) {
        for($i=0; $i < $cant; $i++){
            $this->preguntas[]= $this->mezclarPreguntas();
            for($j=0; $j<count($this->preguntas); $j++){
                $this->preguntas[$j] = ($this->preguntas[$j])->obtenerItems();
            }
            $this->htmlPregunta($num, $i);
            $this->htmlRespuestas($num, $i);
        }
    }
    //$yaml = new Parser();

    //$value = $yaml->parse( file_get_contents('../preguntas.yml'));
    public function mostrarPrueba(){
        print_r($this->archivo);
    }
    /*$array= [];
    $array[0]= "hola";
    $array[1]= "xd";
    $yaml = Yaml::dump($array);
    file_put_contents('../preguntas.yml', $yaml);
    echo Yaml::dump($yaml, 3,2);

    $value = Yaml::parseFile('../preguntas.yml');
    */
}