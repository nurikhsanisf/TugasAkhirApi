<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class KMeansController extends Controller
{
    public function store(){ 
        
        //init var data array       
        $data = [];
        $name = [];

        $dataLaptops = Laptop::all();
        //dd($dataDisasters);
        //# looping change from collection array
        foreach($dataLaptops as $row){
            $data[] = $row;
            $name[] = $row['price'];
        }
        
    //     //dd($name);
    //     //dd($earlydata);
        $data = [];
        //# looping change array to row(indexing)
        foreach($dataLaptops as $row){
            $data[]=[
                $row['price'],
                // $row['jumlahkorban'],
                // $row['jumlahkerusakan'],
                // $row['namawilayah'],
            ];            
        }
        
    //     //dd($earlydata);

    //     //# set K based on method,I set 3
        $cluster = 3;
        

    //     //# var centroid call method earlyCentroid
        $centroid=$this->earlyCentroid($data,$cluster);
       
    //     // dd($centroid[0]);                        
        $hasil_iterasi=[];
        $hasil_cluster=[];
        $itr=0;        

        //-----------------K-MEANS--earlyCentroid-----------------
        while (true) {
            $iterasi = array();
            foreach ($data as $key => $valuedata) {
                //dd($valuedata);
                $iterasi[$key]['data']=$valuedata;
                //dd($valuedata);
                //# value centroid => earlycentroid
                foreach ($centroid[$itr] as $key_centroid => $valuecentroid) {
                    //dd($valuecentroid);
                    //# array 2d jarak
                    $iterasi[$key]['jarak_ke_centroid'][]=$this->distance($valuedata,$valuecentroid);
                    //dd($iterasi);
                }
                //# array 2d jarak terdekat
                $iterasi[$key]['jarak_terdekat']=$this->nearDistance($iterasi[$key]['jarak_ke_centroid'],$centroid);
                //dd($iterasi);
            }
            var_dump($iterasi[$key]);die;
            //# push two array into 1 array
            array_push($hasil_iterasi, $iterasi);        
            //dd($hasil_iterasi, $iterasi , $hasil_cluster); 
            $centroid[++$itr]=$this->newCentroid($iterasi,$hasil_cluster);
            //dd($centroid);
            $lanjutkan=$this->centroidChange($centroid,$itr);
            $boolval = boolval($lanjutkan) ? 'ya' : 'tidak';
            //# checking if centroid not change it will break        
            if(!$lanjutkan)
            break;
        }
    //     $result_centroid = last($centroid);
    //     //dd($result_centroid);
    //     $result_iterasi = last($hasil_iterasi);
    //     //dd($result_iterasi);        
    //     Disaster::deleteHelper();
    //     //dd($result_iterasi);
    //     foreach ($result_iterasi as $key => $value) {
    //         # code...
    //         //dd($value);
    //         $dcentroid1 = $value["jarak_ke_centroid"][0];
    //         $dcentroid2 = $value["jarak_ke_centroid"][1];
    //         $dcentroid3 = $value["jarak_ke_centroid"][2];
    //         $mindistance = $value["jarak_terdekat"]["value"];
    //         $clusterall = $value["jarak_terdekat"]["cluster"];        
    //         Disaster::saveHelper($dcentroid1, $dcentroid2, $dcentroid3,$mindistance,$clusterall);
    //     }
    //     //dd(end($hasil_iterasi));

    //     //------------------------DAVIES BOULDIN INDEX------------------
    //     //# var rs call method from model(collection) then change to array
    //     $rs = Disaster::groupClusterHelper()->toArray();        
    //     //dd($rs);
    //     //# var ssw call method sumsquareWithin with param $rs
    //     $ssw = $this->sumsquareWithin($rs);
    //     //# var ssb call method sumsquareWithin with param $result_centroid
    //     $ssb = $this->sumsquareBetween($result_centroid);
    //     //# var ratio call method sumsquareWithin with param $rs
    //     $ratio = $this->ratioDBI($ssw,$ssb);

    //     //------------------------PURITY--------------------------
    //     //# var Purity call method from model(collection) then change to array
    //     $puritysr = Disaster::groupingSameValueCluster()->groupBy('cluster')->toArray();
    //     //dd($puritysr);
    //     $purity = $this->purity($puritysr,$data);
    //     //dd($purity);
    //     // $test = array_count_values($purity);
        
    //     //dd($test);
        
    //     return view('admin.disasterkmeans',compact('cluster','centroid','data','valuedata','valuecentroid','hasil_iterasi','name','ratio','purity'));
    // }

    // public function earlyCentroid($data,$cluster){
    //     // dd($data);
    //     $randCentroid = [];
    //     for ($i=0; $i < $cluster; $i++) { 
    //         # code...
    //         $temp=[2,12,23];
    //         while(in_array($randCentroid, [$temp])){
    //             $temp=rand(0,(count($data)-1));
    //         }                        
    //         $centroid[0][] = [
    //             $data[$temp[$i]][0],
    //             $data[$temp[$i]][1],
    //             $data[$temp[$i]][2],
    //         ];                           
    //     }
    //     return $centroid;
    // }

    // public function distance($data,$centroid){ 
    //     // dd($centroid;
    //     $resultDistance = sqrt(pow(($data[0]-$centroid[0]),2)+pow(($data[1]-$centroid[1]),2)+pow(($data[2]-$centroid[2]),2));
    //     // dd($resultDistance);             
    //     return $resultDistance;        
    // }

    // public function nearDistance($jarak_ke_centroid,$centroid){
    //     foreach ($jarak_ke_centroid as $key => $value) {
    //         //# check mininum distance
    //         if(!isset($minimum)){
    //             $minimum=$value;
               
    //             $cluster=($key+1);
    //             continue;
    //         }
    //         else if($value<$minimum){
    //             $minimum=$value;
    //             $cluster=($key+1);
    //         }
    //     }
    //     return array(
    //         'cluster'=>$cluster,
    //         'value'=>$minimum,
    //     );
    // }    

    // public function newCentroid($iterasi,$hasil_cluster){
    //     $hasil_cluster = [];
    //     //# looping for regrouping based on cluster
    //     foreach ($iterasi as $key => $value) {
    //         //dd($value);
    //         $hasil_cluster[($value['jarak_terdekat']['cluster']-1)][0][]= $value['data'][0];
    //         $hasil_cluster[($value['jarak_terdekat']['cluster']-1)][1][]= $value['data'][1];
    //         $hasil_cluster[($value['jarak_terdekat']['cluster']-1)][2][]= $value['data'][2];        
    //     }
    //     //dd($hasil_cluster);    
    //     $new_centroid = [];
    //     //# looping for find new centroid in a way find average from each data
    //     foreach ($hasil_cluster as $key => $value) {
    //         # code...
    //         $new_centroid[$key] = [
    //             array_sum($value[0])/count($value[0]),
    //             array_sum($value[1])/count($value[1]),
    //             array_sum($value[2])/count($value[2]),
    //         ];
    //     }
    //     //dd($new_centroid);
    //     //sort based key array
    //     ksort($new_centroid);
    //     return $new_centroid;
    // }

    // public function centroidChange($centroid,$itr){
    //     $centroid_lama = $this->flatten_array($centroid[($itr-1)]); //flattern array
    //     //dd($centroid_lama);
    //     $centroid_baru = $this->flatten_array($centroid[$itr]); //flatten array
    //     //dd($centroid[$itr]);
    //     //# comparing old centroid dan new centroid if change return true, if not change/value jumlah equal = 0 return false
    //     $jumlah_sama=0;
    //     for($i=0;$i<count($centroid_lama);$i++){
    //         if($centroid_lama[$i]===$centroid_baru[$i]){
    //             $jumlah_sama++;
    //         }
    //     }
    //     //dd($jumlah_sama);
    //     return $jumlah_sama===count($centroid_lama) ? false : true; 
    // }

    // function flatten_array($arg) {
    //     //dd($arg);
    //     //# find variable array then send value and then merge array
    //     return is_array($arg) ? array_reduce($arg, function ($c, $a) { 
    //         return array_merge($c, Arr::flatten($a)); },[]) : [$arg];
    // }
    
    // //TODO1 : Fungsi Sum Square Within (SSW)
    // public function sumsquareWithin($rs){
    //     //dd(count($rs));        
    //     $result = 0;
    //     //looping based count param
    //     for ($iterate=0; $iterate < count($rs) ; $iterate++) { 
    //         $result += $rs[$iterate]->average;
    //     }
    //     //dd($result);
    //     return $result;
    // }
    // //TODO2 : Fungsi Sum Square Between (SSB) 
    // public function sumsquareBetween($result_centroid){
    //     //dd($result_centroid);        
    //     $resultc1c2 = sqrt(pow(($result_centroid[0][0]-$result_centroid[1][0]),2)+pow(($result_centroid[0][1]-$result_centroid[1][1]),2)+pow(($result_centroid[0][2]-$result_centroid[1][2]),2));
    //     $resultc1c3 = sqrt(pow(($result_centroid[0][0]-$result_centroid[2][0]),2)+pow(($result_centroid[0][1]-$result_centroid[2][1]),2)+pow(($result_centroid[0][2]-$result_centroid[2][2]),2));
    //     $resultc2c3 = sqrt(pow(($result_centroid[1][0]-$result_centroid[2][0]),2)+pow(($result_centroid[1][1]-$result_centroid[2][1]),2)+pow(($result_centroid[1][2]-$result_centroid[2][2]),2));
    //     $resultall = $resultc1c2+$resultc1c3+$resultc2c3;
    //     return $resultall;        
    // } 
    // //TODO3 : Fungsi Ratio(Output DBI)
    // public function ratioDBI($ssw,$ssb){
    //     return $ssw/$ssb;
    // }

    // //TODO Fungsi Purity
    // public function purity($puritysr,$data){
    //     # code...
    //     // dd($puritysr);
    //     //dd($data);
    //     $alldata = [];
    //     //# looping based on param
    //     for($i = 1 ; $i <= count($puritysr) ; $i++){
    //         $alldata[$i] = count($puritysr[$i]);
    //     }
    //     $puritytotal = array_sum($alldata)/count($data);
    //     //dd($alldata);
    //     return $puritytotal;
    // }
//      function caridata($mysqli,$query){
//         $row= $mysqli->query($query)->fetch_array();
//         return $row[0];
//     }
//     public function store(Request $request)
//     {

//         //Fungsi mencari kueri single data
   
//     var_dump($row);die;

// //Inisialisasi Cluster Awal
// $jumlahdata=caridata($mysqli,"select count(*) from laptops");
// for ($i=0;$i<$jumlahdata; $i++) { 
// 	$clusterawal[$i]="1";
// }
// //Set Default Nilai Centroid 1,2,3
// $centro1[0] = array('13,3','8','128','1,34','14735604,27');
// $centro2[0] = array('13,3','8','128','1,37','21960466,42');
// $centro3[0] = array('14','16','512','1,3','24506339');

// $status='false';
// $loop='0';
// $x=0;
// while ($status=='false'){

// 	//Proses K-Means Perhitungan
// 	$query="select * from laptops";
// 	$result=$mysqli->query($query);
// 	while ($data=mysqli_fetch_assoc($result)) {
// 		extract($data);
// 		$hasilc1=0;
// 		$hasilc2=0;
// 		$hasilc3=0;

// 		//Proses Pencarian Nilai Centro 1
// 		$hasilc1=sqrt(pow($tanggungan-$centro1[$loop][0],2) +
// 			pow($k_pekerjaan-$centro1[$loop][1],2) + 
// 			pow($k_penghasilan-$centro1[$loop][2],2));

// 		//Proses Pencarian Nilai Centro 2
// 		$hasilc2=sqrt(pow($tanggungan-$centro2[$loop][0],2) +
// 			pow($k_pekerjaan-$centro2[$loop][1],2) + 
// 			pow($k_penghasilan-$centro2[$loop][2],2));

// 		//Proses Pencarian Nilai Centro 3
// 		$hasilc3=sqrt(pow($tanggungan-$centro3[$loop][0],2) +
// 			pow($k_pekerjaan-$centro3[$loop][1],2) + 
// 			pow($k_penghasilan-$centro3[$loop][2],2));

// 		//Mencari Nilai Terkecil
// 		if ($hasilc1<$hasilc2 && $hasilc1<$hasilc3){
// 			$clusterakhir[$x]='C1';
// 			update_mahasiswa($mysqli,$idmhs,'C1');

// 		}else if($hasilc2<$hasilc1 && $hasilc2<$hasilc3){
// 			$clusterakhir[$x]='C2';
// 			update_mahasiswa($mysqli,$idmhs,'C2');

// 		}else{
// 			$clusterakhir[$x]='C3';
// 			update_mahasiswa($mysqli,$idmhs,'C3');

// 		}
// 		//Penambhan Counter Index
// 		$x+=1;



// 	}

// 	$loop+=1;
// 	//Proses mencari centroid baru ambil dari basis data.
// 	//Centroid Baru Pusat 1
// 	$centro1[$loop][0]=caridata($mysqli,"select avg(tanggungan) from tb_mahasiswa where set_sementara='C1'");
// 	$centro1[$loop][1]=caridata($mysqli,"select avg(k_pekerjaan) from tb_mahasiswa where set_sementara='C1'");
// 	$centro1[$loop][2]=caridata($mysqli,"select avg(k_penghasilan) from tb_mahasiswa where set_sementara='C1'");

// 	//Centroid Baru Pusat 2
// 	$centro2[$loop][0]=caridata($mysqli,"select avg(tanggungan) from tb_mahasiswa where set_sementara='C2'");
// 	$centro2[$loop][1]=caridata($mysqli,"select avg(k_pekerjaan) from tb_mahasiswa where set_sementara='C2'");
// 	$centro2[$loop][2]=caridata($mysqli,"select avg(k_penghasilan) from tb_mahasiswa where set_sementara='C2'");

// 	//Centroid Baru Pusat 3
// 	$centro3[$loop][0]=caridata($mysqli,"select avg(tanggungan) from tb_mahasiswa where set_sementara='C3'");
// 	$centro3[$loop][1]=caridata($mysqli,"select avg(k_pekerjaan) from tb_mahasiswa where set_sementara='C3'");
// 	$centro3[$loop][2]=caridata($mysqli,"select avg(k_penghasilan) from tb_mahasiswa where set_sementara='C3'");

// 	$status='true';
// 	for ($i=0;$i<$jumlahmahasiswa;$i++) { 
// 		if($clusterawal[$i]!=$clusterakhir[$i]){
// 			$status='false';
// 		}
// 	}

// 	if($status=='false'){
// 		$clusterawal=$clusterakhir;
// 	}
// }

// echo "Proses berhasil dilakukan sebanyak $loop kali";

// function update_mahasiswa($mysqli,$idmhs,$nilai){

// 	$stmt=$mysqli->prepare("update tb_mahasiswa set 
// 		set_sementara=?
// 		where idmhs=?");
// 	$stmt->bind_param("ss",
// 		mysqli_real_escape_string($mysqli,$nilai),
// 		mysqli_real_escape_string($mysqli,$idmhs));
// 	$stmt->execute();
// }
        
        // // Spesifikasi laptop pengguna
        // $userSpecs = [
        //     'inches' => $request->input('inches'),
        //     'ram' => $request->input('ram'),
        //     'memory' => $request->input('memory'),
        //     'weight' => $request->input('weight'),
        //     'price' => $request->input('price'),
        // ];
        
       

        // // Ambil data laptop dari database
        // $laptops = Laptop::all(['inches', 'ram', 'memory', 'weight','price']);


        

        // // Membangun model K-means
        // $k = 3; // Jumlah cluster
    
    

        // // Inisialisasi centroid awal
        // $centroids = [];
        // for ($i = 0; $i < $k; $i++) {
        //     $centroids[$i] = $laptops[$i];
        // }
        // print_r($centroids);die;
        
    

        // // Iterasi K-means
        // $maxIterations = 100;
        // for ($iteration = 0; $iteration < $maxIterations; $iteration++) {
        //     $clusters = [];
        //     for ($i = 0; $i < $k; $i++) {
        //         $clusters[$i] = [];
        //     }
           
            

        //     // Hitung jarak dan kelompokkan data
        //     foreach ($laptops as $point) {
        //         $distances = [];
        //         foreach ($centroids as $centroid) {
        //             $distances[] = sqrt(pow($centroid[0] - $point[0], 2) + pow($centroid[1] - $point[1], 2));
        //         }
        //         $minDistanceIndex = array_keys($distances, min($distances))[0];
        //         $clusters[$minDistanceIndex][] = $point;
        //     }
            
           

    //         // Perbarui centroid
    //         $newCentroids = [];
    //         for ($i = 0; $i < $k; $i++) {
    //             $sumX = 0;
    //             $sumY = 0;
    //             foreach ($clusters[$i] as $point) {
    //                 $sumX += $point[0];
    //                 $sumY += $point[1];
    //             }
    //             $newCentroids[$i] = [$sumX / count($clusters[$i]), $sumY / count($clusters[$i])];
    //         }

    //         // Periksa konvergensi
    //         if ($centroids == $newCentroids) {
    //             break;
    //         } else {
    //             $centroids = $newCentroids;
    //         }
    //     }

    //     // Mengembalikan hasil klastering
    //     return $clusters;
    // }
}
    // public function store() {
    //     var_dump("saya");
    // }
    //inisisalisais cluster awal 
   

    // public function store(Request $request)
    // {
        
    //     // Spesifikasi laptop pengguna
    //     $userSpecs = [
    //         'inches' => $request->input('inches'),
    //         'ram' => $request->input('ram'),
    //         'memory' => $request->input('memory'),
    //         'weight' => $request->input('weight'),
    //         'price' => $request->input('price'),
    //     ];
        
       

    //     // Ambil data laptop dari database
    //     $laptops = Laptop::all();


        

    //     // Membangun model K-means
    //     $k = 3; // Jumlah cluster
    //     $clusters = $this->kMeans($laptops, $k);
        
        
        

    //     // Menentukan cluster terdekat untuk spesifikasi laptop pengguna
    //     $nearestCluster = $this->getNearestCluster($userSpecs, $clusters);
        

    //     // Menampilkan rekomendasi laptop
    //     $recommendations = $this->getRecommendations($nearestCluster, $clusters, $laptops);
     

    //     return response()->json($recommendations);
    // }

    // private function kMeans($data, $k)
    // {   
        
        // Implementasi K-means
        // ...
//          // Inisialisasi langkah awal
//         $centroids = initializeCentroids($laptops, $k, $maxIterations = 100);
//         var_dump($centroids);die;

//         // Mulai iterasi
//         $iteration = 0;
//         while ($iteration < $maxIterations) {
//             $clusters = assignLaptopsToCentroids($laptops, $centroids);
//             $newCentroids = updateCentroids($laptops, $clusters);

//             // Jika tidak ada perubahan pada centroid, keluar dari iterasi
//             if ($centroids === $newCentroids) {
//                 break;
//             }

//             $centroids = $newCentroids;
//             $iteration++;
//         }

//         return $clusters;
//     }

//     function initializeCentroids($laptops, $k) {
//         $centroids = [];

//         // Acak memilih laptop sebagai centroid awal
//         $randomKeys = array_rand($laptops, $k);

//         // Mengambil laptop sebagai centroid
//         foreach ($randomKeys as $key) {
//             $centroids[] = $laptops[$key];
//         }

//         return $centroids;
//     }

// function assignLaptopsToCentroids($laptops, $centroids) {
//     $clusters = [];

//     foreach ($laptops as $laptop) {
//         $minDistance = INF;
//         $closestCentroid = null;

//         foreach ($centroids as $centroidKey => $centroid) {
//             $distance = euclideanDistance($laptop, $centroid);

//             // Menentukan centroid terdekat
//             if ($distance < $minDistance) {
//                 $minDistance = $distance;
//                 $closestCentroid = $centroidKey;
//             }
//         }

//         // Menyimpan laptop ke dalam cluster yang sesuai
//         $clusters[$closestCentroid][] = $laptop;
//     }

//     return $clusters;
// }

// function updateCentroids($laptops, $clusters) {
//     $centroids = [];

//     foreach ($clusters as $cluster) {
//         $numLaptops = count($cluster);
//         $numSpecs = count($cluster[0]);

//         // Inisialisasi centroid baru dengan nol pada setiap spesifikasi
//         $newCentroid = array_fill(0, $numSpecs, 0);

//         foreach ($cluster as $laptop) {
//             // Menjumlahkan setiap spesifikasi pada cluster
//             foreach ($laptop as $specKey => $specValue) {
//                 $newCentroid[$specKey] += $specValue;
//             }
//         }

//         // Menghitung rata-rata pada setiap spesifikasi untuk mendapatkan centroid baru
//         $newCentroid = array_map(function ($sum) use ($numLaptops) {
//             return $sum / $numLaptops;
//         }, $newCentroid);

//         $centroids[] = $newCentroid;
//     }

//     return $centroids;
// }

// function euclideanDistance($laptopA, $laptopB) {
//     $sum = 0;

//     foreach ($laptopA as $specKey => $specValue) {
//         $sum += pow($specValue - $laptopB[$specKey], 2);
//     }

//     return sqrt($sum);
// }
    //     $clusters = $data;
    //     return $clusters;
    // }
    

    // private function getNearestCluster($specs, $clusters)
    // {
    //     // Implementasi penentuan cluster terdekat
    //     // ...

    //     return $nearestCluster;
    // }

    // private function getRecommendations($clusterIndex, $clusters, $laptops)
    // {
    //     // Implementasi mendapatkan rekomendasi laptop
    //     // ...

    //     return $recommendations;
    }
// }

    

