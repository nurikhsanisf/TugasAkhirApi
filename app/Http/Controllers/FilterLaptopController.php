<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

//untuk run php artisan serve --host=192.168.18.35 --port=8000

class FilterLaptopController extends Controller
{
    //
    public function store(Request $request) {
        $params_input = $request->input();

        $count = Laptop::count();
        $allLaptop = Laptop::all();

        $listLaptop = $this->getKMeans($allLaptop, $count);

        $data = $this->getCbf($listLaptop, $params_input);

        return $data;
    }

    // public function show(){
    //     $count = Laptop::all()->count(); //untuk jumlah data laptop
    //     $models = Laptop::all();
    //     // var_dump($model);die;

    //     // foreach($models as $key => $model) {
    //     //     $clusterawal[$key]="1";
    //     // }

    //     for ($i=0;$i<$count; $i++) { 
    //         $clusterawal[$i]="1";
    //     }


    //     // $murah = 9425515;
    //     // $sedang = 21960466.42;
    //     // $mahal = 41594387.89;

    //     //Set Default Nilai Centroid 1,2,3
    //     $centro1[0] = array('14735604,27');
    //     $centro2[0] = array('21960466,42');
    //     $centro3[0] = array('24506339');

    //     $status='false';
    //     $loop='0';
    //     $x=0;
    //     while ($status=='false'){
    //         foreach($models as $model) {
    //             extract($data);
    //             $hasilc1=0;
    //             $hasilc2=0;
    //             $hasilc3=0;

    //             //Proses Pencarian Nilai Centro 1
    //             $hasilc1=sqrt(pow($tanggungan-$centro1[$loop][0],2) +
    //                 pow($k_pekerjaan-$centro1[$loop][1],2) + 
    //                 pow($k_penghasilan-$centro1[$loop][2],2));

    //             //Proses Pencarian Nilai Centro 2
    //             $hasilc2=sqrt(pow($tanggungan-$centro2[$loop][0],2) +
    //                 pow($k_pekerjaan-$centro2[$loop][1],2) + 
    //                 pow($k_penghasilan-$centro2[$loop][2],2));

    //             //Proses Pencarian Nilai Centro 3
    //             $hasilc3=sqrt(pow($tanggungan-$centro3[$loop][0],2) +
    //                 pow($k_pekerjaan-$centro3[$loop][1],2) + 
    //                 pow($k_penghasilan-$centro3[$loop][2],2));

    //             //Mencari Nilai Terkecil
    //             if ($hasilc1<$hasilc2 && $hasilc1<$hasilc3){
    //                 $clusterakhir[$x]='C1';
    //                 update_mahasiswa($mysqli,$idmhs,'C1');

    //             }else if($hasilc2<$hasilc1 && $hasilc2<$hasilc3){
    //                 $clusterakhir[$x]='C2';
    //                 update_mahasiswa($mysqli,$idmhs,'C2');

    //             }else{
    //                 $clusterakhir[$x]='C3';
    //                 update_mahasiswa($mysqli,$idmhs,'C3');

    //             }
    //             //Penambhan Counter Index
    //             $x+=1;
    //         }
    //         $loop+=1;
    //     }


    // } 

    public function getCbf($listLaptop, $inputan){
        $q = [];
        $queryNumber = 0;
        $documentKey = [];

        

        foreach($inputan as $key => $param){
            $queryNumber = $queryNumber + 1;
            $documentNumber = 0;
            $totalDocument = 0;
            $tf = [];
            $totaldf = 0;
            $tfDocument = [];
            $dBagiDf = 0;
            $idf = 0;
            $idfPlusSatu = 0;

            foreach($listLaptop as $detailLaptop){
                $documentNumber = $documentNumber + 1;
                $totalDocument = $totalDocument + 1;
                if($detailLaptop['company'] == $param || $detailLaptop['product'] == $param || $detailLaptop['typename'] == $param || $detailLaptop['inches'] == $param || $detailLaptop['screenresolution'] == $param || $detailLaptop['cpu'] == $param || $detailLaptop['ram'] == $param || $detailLaptop['memory'] == $param || $detailLaptop['gpu'] == $param || $detailLaptop['opsis'] == $param || $detailLaptop['weight'] == $param) {
                    $tf[] = 1;
                    $totaldf = $totaldf + 1;
                }else{
                    $tf[] = 0;
                    $totaldf = $totaldf + 0;
                }
            }

            if(!empty($totaldf)){
                $dBagiDf = $totalDocument/$totaldf;
                $idf = Log($dBagiDf, 10);
                $idfPlusSatu = $idf + 1;
            }

            foreach($tf as $detailtf) {
                if($detailtf == 1) {
                    $tfDocument[] = $idfPlusSatu;
                }else{
                    $tfDocument[] = 0;
                }
            }   
            
            $q[$param] = $tfDocument;
        }

        $dokumen = [];
        foreach($listLaptop as $key => $document){
            $data1 = 0;
            foreach($inputan as $param) {
                $data1 = $data1 + $q[$param][$key];
            }
            $dokumen[] = $data1;
        }
        $max_keys = array_search(max($dokumen), $dokumen);
        return $listLaptop[$max_keys];
    }

    public function getKMeans($allLaptop, $count){
        //Set Default Nilai Centroid 1,2,3
        $centro1[0] = array(9425515);
        $centro2[0] = array(21960466.42);
        $centro3[0] = array(41594387,89);

        $hasil = false;
        $k = 0;

        while($hasil == false){

            $awal = $k;

            foreach($allLaptop as $key => $detailLaptop){
                $centroke1[$k][$key] = sqrt(pow(($detailLaptop->price - $centro1[$k][0]), 2));
                $centroke2[$k][$key] = sqrt(pow(($detailLaptop->price - $centro2[$k][0]), 2));
                $centroke3[$k][$key] = sqrt(pow(($detailLaptop->price - $centro3[$k][0]), 2));
    
                if($centroke1[$k][$key] < $centroke2[$k][$key] &&  $centroke1[$k][$key] < $centroke3[$k][$key]) {
                    $nilai[$k][$key] = "murah";
                }elseif ($centroke2[0][$key] < $centroke1[$k][$key] && $centroke2[$k][$key] < $centroke3[$k][$key]) {
                    $nilai[$k][$key] = "sedang";
                }else{
                    $nilai[$k][$key] = "mahal";
                }
                $price[$k][$key] = $detailLaptop->price;
            }

            $nilaiMurah = 0;
            $nilaiSedang = 0;
            $nilaiMahal = 0;
            $totalKeyMurah = 0;
            $totalKeySedang = 0;
            $totalKeyMahal = 0;


            for($i=0; $i < $count; $i++ ){
                if ($nilai[$k][$i] == 'murah'){
                    $nilaiMurah = $nilaiMurah + $price[$k][$i];
                    $totalKeyMurah = $totalKeyMurah + 1;
                }elseif ($nilai[$k][$i] == 'sedang') {
                    $nilaiSedang = $nilaiSedang + $price[$k][$i];
                    $totalKeySedang = $totalKeySedang + 1;
                }else{
                    $nilaiMahal = $nilaiMahal + $price[$k][$i];
                    $totalKeyMahal = $totalKeyMahal + 1;
                }
            }

            //mencari c ke 2
            $k = $k + 1;
            $akhir = $k;
            $centro1[$k] = array($nilaiMurah/$totalKeyMurah);
            $centro2[$k] = array($nilaiSedang/$totalKeySedang);
            $centro3[$k] = array($nilaiMahal/$totalKeyMahal);

            foreach($allLaptop as $key => $detailLaptop){
                $centroke1[$k][$key] = sqrt(pow(($detailLaptop->price - $centro1[$k][0]), 2));
                $centroke2[$k][$key] = sqrt(pow(($detailLaptop->price - $centro2[$k][0]), 2));
                $centroke3[$k][$key] = sqrt(pow(($detailLaptop->price - $centro3[$k][0]), 2));

                if($centroke1[$k][$key] < $centroke2[$k][$key] &&  $centroke1[$k][$key] < $centroke3[$k][$key]) {
                    $nilai[$k][$key] = "murah";
                }elseif ($centroke2[$k][$key] < $centroke1[$k][$key] && $centroke2[$k][$key] < $centroke3[$k][$key]) {
                    $nilai[$k][$key] = "sedang";
                }else{
                    $nilai[$k][$key] = "mahal";
                }
                $price[$k][$key] = $detailLaptop->price;
            }

            $nilaiAwal = 0;

            for($i=0; $i < $count; $i++ ){
                if ($nilai[$awal][$i] == $nilai[$akhir][$i]) {
                    $nilaiAwal = $nilaiAwal + 1;
                }
            }

            if($nilaiAwal == $count){
                $hasil = true;
            }else{
                $hasil = false;
            }
            // $hasil = true;
        }

        if ($hasil) {
            for($i=0; $i < $count; $i++ ){
                $a[$i] = array(
                    'jenisPrice' => $nilai[$k][$i]
                );
                $data[$i] = $allLaptop[$i];
                $data[$i]->jenisPrice = $nilai[1][$i];
            }
        }

        return $data;
    }
}

