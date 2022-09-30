<?php
$ekspedisi = $_POST["ekspedisi"];
$distrik = $_POST["distrik"];
$berat = $_POST["berat"];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=50&destination=".$distrik."&weight=".$berat."&courier=".$ekspedisi,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: 8cf66f3be90866e7e8bc3bd60a1880d7"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
  // ubah ke dalam bentuk array
  $datapaket = json_decode($response,TRUE);
  $paket = $datapaket["rajaongkir"]["results"]["0"]["costs"];
  
  // var_dump($paket); die;
  // echo "<pre>";
  // print_r($paket);
  // echo "</pre>";

  echo "<option value=''>--Pilih Paket--</option>";

  foreach ($paket as $key => $per_paket) {
        echo "<option
              paket='".$per_paket["service"]."'
              ongkir='".$per_paket["cost"]["0"]["value"]."'
              etd='".$per_paket["cost"]["0"]["etd"]."' >";
        echo $per_paket["service"]." ";
        echo number_format($per_paket["cost"]["0"]["value"])." ";
        echo $per_paket["cost"]["0"]["etd"];
        echo "</option>";
  }

}