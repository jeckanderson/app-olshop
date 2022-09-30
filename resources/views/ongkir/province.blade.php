<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 8cf66f3be90866e7e8bc3bd60a1880d7"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    // dapatnya dalam bentuk json
    // kita konversi ke dalam array dulu
    $array_response = json_decode($response, true);
    $data_province = $array_response["rajaongkir"]["results"];
    
    // echo "<pre>";
    // print_r($data_province);
    // echo "<pre>";
    echo "<option value=''>-Pilih Provinsi-</option>";

    foreach($data_province as $key => $per_provinsi)
    {
      echo "<option value='".$per_provinsi['province_id']."' id_provinsi='".$per_provinsi['province_id']."' >";
      echo $per_provinsi["province"];
      echo "</option>";
    }

}