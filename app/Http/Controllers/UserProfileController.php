<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        // var_dump($user); die;
        return view('profile.index', [
            'title' => 'Halaman Profile',
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        return "oke";
    }

    // public function kabupaten(Request $request)
    // {
    //     $id_provinsi = $request->id_provinsi;
    //     // $id_provinsi_terpilih = $_POST["id_provinsi"];
    //     // echo "<pre>";
    //     // print_r($id_provinsi_terpilih);
    //     // echo "</pre>";

    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //     CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi,
    //     CURLOPT_SSL_VERIFYHOST => 0,
    //     CURLOPT_SSL_VERIFYPEER => 0,
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "GET",
    //     CURLOPT_HTTPHEADER => array(
    //         "key: 8cf66f3be90866e7e8bc3bd60a1880d7"
    //     ),
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //     echo "cURL Error #:" . $err;
    //     } else {
    //         // echo $response;
    //         // dapatnya dalam bentuk json
    //         // jadikan array dgn json_decode
    //         $district = json_decode($response, true);
    //         $data_district = $district['rajaongkir']['results'];
            
    //         // echo "<pre>";
    //         // print_r($data_district);
    //         // echo "</pre>";

    //         echo "<option value=''>-Pilih District-</option>";

    //         foreach ($data_district as $key => $per_district)
    //         {
    //             echo "<option value=''
    //                     id_kabupaten='".$per_district["city_id"]."'
    //                     nama_province='".$per_district["province"]."'
    //                     nama_distrik='".$per_district["city_name"]."'
    //                     type_distrik='".$per_district["type"]."'
    //                     kodepos='".$per_district["postal_code"]."' >";
    //             echo $per_district["type"] ." ";
    //             echo $per_district["city_name"];
    //             echo "</option>";
    //         }

    //     }
    // }
}
