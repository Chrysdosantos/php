<style type="text/css">
 #contenedor
 {
  margin: auto;
  width: 895px;
  height: 460px;
  padding: 30px;
  border:2px solid black;
 }
 #flonte
 {
  width: 148px;
  height: 23px;
  border: 1px solid black;
  float: left;
  margin: auto;
 }
 button
{
  background-color: gray;
  cursor: pointer;
}
  #mz1
 {
  width: 148px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background-color: white; 
 }
 #mz2
 {
  width: 148px;
  height: 23px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background-color: white; 
 }
 #dc1
 {
  width: 25px;
  height: 25px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background-color: gray;
 }
 #dct
 {
  width: 150px;
  height: 25px;
  float: left;
  margin: auto;
 }
 #dc2
 {
  width: 25px;
  height: 25px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background-color: #DF0101;
 }
 #M01,#M02,#M03,#M04,#M06,#M07,#M08,#M09
 {
  width: 150px;
  height: 178px;
  border:2px solid black;
  float: left;
  margin-right: 30px;
  margin-bottom: 30px;
 }
 #M05,#M10
{
  width: 150px;
  height: 178px;
  border:2px solid black;
  float: left;
  margin-bottom: 30px;
}

<?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 0,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 0,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 6,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 6,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 7,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 7,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 8,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 8,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }     
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 9,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 9,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }   
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 10,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 10,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 11,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 11,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 12,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 12,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 13,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 13,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 1,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 1,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 2,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 2,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 3,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 3,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 4,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 4,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 5,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 5,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 14,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 14,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 20,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 20,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 21,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 21,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 22,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 22,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 23,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 23,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 24,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 24,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 25,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 25,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 26,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 26,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 27,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 27,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }

 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 15,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 15,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 16,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 16,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 17,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 17,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 18,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 18,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 19,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 19,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 28,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 28,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 29,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 29,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 30,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 30,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 31,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 31,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 32,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 32,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 33,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 33,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 34,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 34,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 35,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 35,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 36,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 36,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 37,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 37,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 38,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 38,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 39,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 39,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 40,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 40,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 41,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 41,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
    <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 42,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 42,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 43,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 43,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 44,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 44,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 45,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 45,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 46,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 46,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 47,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 47,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 48,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 48,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 49,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 49,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }

   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 50,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 50,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 51,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 51,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 52,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 52,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 53,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 53,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 54,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 54,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 55,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 21px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 55,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 56,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 56,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 57,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 57,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 58,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 58,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 59,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 59,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 60,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 60,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 61,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 61,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 62,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 62,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 63,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 63,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 64,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 64,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 65,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 65,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 66,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 66,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 67,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 67,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 68,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 68,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 69,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 69,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 70,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 70,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 71,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 71,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 72,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 72,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 73,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 73,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }

 <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 74,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 74,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 75,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 75,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 76,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 76,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 77,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 77,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 78,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 78,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 79,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 79,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 80,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 80,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 81,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 81,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 82,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 82,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 83,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 83,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 84,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 84,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 85,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 85,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 86,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 86,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 87,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 87,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 88,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 88,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 89,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 89,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 90,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 90,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 91,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 91,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 92,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 92,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 93,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 93,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 94,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 94,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 95,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 95,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 96,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 96,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 97,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 97,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 98,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 98,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 99,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 99,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
  <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 100,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 100,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 101,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 101,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 102,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 102,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 103,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 103,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 104,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 104,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 105,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 105,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 106,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 106,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 107,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 107,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 108,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 108,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 109,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 109,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 110,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 110,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 111,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 111,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 112,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 112,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 113,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 113,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
   <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 114,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 114,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
    <?php
include('php/conexion.php');
$consulta='SELECT ClaveLote  FROM LOTES LIMIT 115,1 ';
$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
 while  ( $fila=mysqli_fetch_array($resultado))  
      {
       echo'
       #'.$fila['ClaveLote'].' 
       ' ;
      }
       ?>
 {
  width: 73px;
  height: 30px;
  border: 1px solid black;
  float: left;
  margin: auto;
  background:<?php
  include('php/conexion.php');
  $consulta='SELECT Color  FROM LOTES LIMIT 115,1 ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
   while  ( $fila=mysqli_fetch_array($resultado))  
    {
     echo'
     '.$fila['Color'].' 
     ' ;
    }?>;
 }
</style>