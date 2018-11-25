# ExamenMultipleChoice

[![Build Status](https://travis-ci.org/MarianelaClara/ExamenMultipleChoice.svg?branch=master)](https://travis-ci.org/MarianelaClara/ExamenMultipleChoice)

Este proyecto consta de dos clases.

Una de ellas es Prueba, quien se encarga principalmente de recolectar toda la información del archivo yml, ademas de generar los temas. Prueba posee un metodo que se encargara de mezclar las preguntas de la prueba, y otro que le diremos cuantos temas desearemos generar, por cada uno de ellos las preguntas se mezclaran, ademas de las opciones.

La otra clase es Pregunta, quien contrendra una sola pregunta de la prueba, en ella habra 3 cosas importantes. La primera es el enunciado de la pregunta. La segunda son las opciones a esa respuesta. y la tercea son sus las respuestas a la pregunta. 
Esta clase ademas posee un metodo en el cual podremos mezclar las opciones de la pregunta.

De esta forma, logramos separar la informacion relevante, en preguntas, enunciados, opciones, y respuestas. Y cada vez que se genere un tema se mezclaran todas las preguntas, y las opciones sin perder la informacion relevante.