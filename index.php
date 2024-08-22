<?php 
//CONEXION A UNA API

const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesion de cURL: ch= cURL handle
$ch = curl_init(API_URL);

//Indicar que queremos recibir el resultado de la peticion y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*Ejecutar peticion
y guardar resultado */

$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
// var_dump($data); //Mostrar el resultado del GET

?>

<main style="display:grid; place-content:center">  
   <section>

      <img src="<?= $data["poster_url"];?>" alt="Poster de <?=$data["title"];?>" style="border-radius: 16px" />
      
   </section>

   <hgroup>
      <h3><?= $data["title"];?> se estrena en: <?= $data["days_until"];?> dias</h3>
      <p>Fecha de estreno: <?= $data["release_date"];?> </p>
      <p>La siguiente pelicula sera: <b><?= $data["following_production"]["title"];?> </b></p>
      <p>Que se estrena en: <?= $data["following_production"]["days_until"];?> dias</p>
      <img src="<?= $data["following_production"]["poster_url"];?> " alt="Poster de <?= $data["following_production"]["title"];?> ">
   </hgroup>
   
   <style>
      :root{
         color-scheme: dark;
      }
      section{
         display: flex;
         justify-content: center;
         text-align: center;
      }
      hgroup{
         display: flex;
         flex-direction: column;
         justify-content: center;
         text-align: center;
      }
   </style>
</main>