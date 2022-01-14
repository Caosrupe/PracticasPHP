<?php
/* Iniciamos PHP */
$rut=$_REQUEST["rut"];
$dv=$_REQUEST["dv"];
/* Con las lineas anteriores le asignanos a las variables $rut y $dv, lo ingresado por formulario en la página anterior, solo utilizaremos el rut. El digito verificador, lo usaremos al final*/
$rutin=strrev($rut);
/* Invertimos el rut con la funcion “strrev” */
$cant=strlen($rutin);
/* Contamos la cantidad de numeros que tiene el rut */
$c=0;
/* Creamos un contador con valor inicial cero */
while($c<$cant)
{
$r[$c]=substr($rutin,$c,1);
$c++;
}
/* Hacemos un ciclo en el que se creara un array o arreglo que se llamara $r, en el cual se le asignara a cada valor del array, el valor correspodiente del rut, Por ej: para el rut 12346578, que invertido sería 87654321, el valor de $r[0] es 8, de $r[5] es 3 y asi sucesiva y respectivamente. */
$ca=count($r);
/* crear multiplicador con valor incial 2
crear un segundo contador con valor 0
crear acumulador que guardara los valores totales de multiplicar y sumar segur la formula*/

$m=2;
$c2=0;
$suma=0;

while($c2<$ca)
{
$suma=$suma+($r[$c2]*$m);
if($m==7)
{
$m=2;
}else{
$m++;
}
$c2++;
}

/* Hacemos un nuevo ciclo en el cual a $suma se le suma (valga la redundancia) su propio valor (que inicialmente es cero) más el resultado de la multiplicación entre el valor del array correspondiente por el multiplicador correspondiente, basandonos en la formula */
$resto=$suma%11;
/* Calculamos el resto de la división usando el simbolo % */
$digito=11-$resto;
/* Calculamos el digito que corresponde al Rut, restando a 11 el resto obtenido anteriormente */
if($digito==10)
{
$digito=K;
}else{
if($digito==11)
{
$digito="0";
}
}
/* Creamos dos condiciones, la primero dice que si el valor de $digito es 11, lo reemplazamos por un cero (el cero va entre comillas. De no hacerlo así, el programa considerará “nada” como cero, es decir si la persona no ingresa Digito Verificado y este corresponde a un cero, lo tomará como valido, las comillas, al considerarlo texto, evitan eso). El segundo dice que si el valor de $digito es 10, lo reemplazamos por una K, de no cumplirse ninguno de las condiciones, el valor de $digito no cambiará. */
if($dv==$digito)
{
echo 'Rut correcto, se ha guardado la informacion <br />';
}else{
echo 'Rut no valido, ingrese nuevamente su RUT <br />';
}
/* Por ultimo comprobamos si el resultado que obtuvimos es el mismo que ingreso la persona, de ser así se muestra el mensaje “Valido”, de no ser así se muestra el mensaje “No Valido” */

// comprobacion de mail

/* creamos una variable con cualquier */


$valor = $_REQUEST["correo"];

/*creamos la funcion que se encargara de la */


function filtroMail($valor){
           if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
                return false;
           }else{
                if (preg_match("/(['])/",$valor)) {
                     return false;
                }
                if (preg_match('/(["])/',$valor)) {
                     return false;
                }
                if (preg_match("/([;])/",$valor)) {
                     return false;
                }
                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$valor)) {
                     return false;
                }else{
                     $valor = filter_var($valor, FILTER_SANITIZE_EMAIL);
                     return true;
                }
           }
      } 
//imprimimos solo el resultado negativo por el momento porque la idea es que se cargue en una base de datos 

      if (!filtroMail($valor)) { 
         echo 'Email incorrecto <a href="index.html"><button type="button">VOLVER</button></a>';
 }else {
         echo 'Email correcto';
 } 

?>