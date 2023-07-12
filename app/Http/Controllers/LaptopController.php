<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LaptopController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        
        //get data from table posts
        $laptops = Laptop::latest()->get();
        

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $laptops  
        ], 200);

    }
    
     /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
       
        //find post by ID
        $laptop = Laptop::findOrfail($id);

       

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $laptop
        ], 200);

    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'company'            => 'required',
            'product'            => 'required',
            'typename'           => 'required',
            'inches'             => 'required',
            'screenresolution'   => 'required',
            'cpu'                => 'required',
            'ram'                => 'required',
            'memory'             => 'required',
            'gpu'                => 'required',
            'opsis'              => 'required',
            'weight'             => 'required',
            'price'              => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $laptop = Laptop::create([
            'company'            => $request->company,
            'product'            => $request->product,
            'typename'           => $request->typename,
            'inches'             => $request->inches,
            'screenresolution'   => $request->screenresolution,
            'cpu'                => $request->cpu,
            'ram'                => $request->ram,
            'memory'             => $request->memory,
            'gpu'                => $request->gpu,
            'opsis'              => $request->opsis,
            'weight'             => $request->weight,
            'price'              => $request->price
        ]);

        //success save to database
        if($laptop) {

            return response()->json([
                'success' => true,
                'message' => 'laptop Created',
                'data'    => $laptop  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'laptop Failed to Save',
        ], 409);

    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $laptop
     * @return void
     */
    public function update(Request $request, laptop $laptop)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'company'            => 'required',
            'product'            => 'required',
            'typename'           => 'required',
            'inches'             => 'required',
            'screenresolution'   => 'required',
            'cpu'                => 'required',
            'ram'                => 'required',
            'memory'             => 'required',
            'gpu'                => 'required',
            'opsis'              => 'required',
            'weight'             => 'required',
            'price'              => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find post by ID
        $laptop = laptop::findOrFail($laptop->id);

        if($laptop) {

            //update post
            $laptop->update([
                'company'            => $request->company,
                'product'            => $request->product,
                'typename'           => $request->typename,
                'inches'             => $request->inches,
                'screenresolution'   => $request->screenresolution,
                'cpu'                => $request->cpu,
                'ram'                => $request->ram,
                'memory'             => $request->memory,
                'gpu'                => $request->gpu,
                'opsis'              => $request->opsis,
                'weight'             => $request->weight,
                'price'              => $request->price
                
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Laptop Updated',
                'data'    => $laptop
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'laptop Not Found',
        ], 404);

    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find post by ID
        $laptop = laptop::findOrfail($id);

        if($laptop) {

            //delete post
            $laptop->delete();

            return response()->json([
                'success' => true,
                'message' => 'laptop Deleted',
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'laptop Not Found',
        ], 404);
    }

    public function create() { 
        $listLaptop = Laptop::all();

        $queryNumber = 0;

        foreach($listLaptop as $q){
            $queryNumber = $queryNumber + 1;
            $documentNumber = 0;
            $totalDocument = 0;
            $tf = [];
            $totaldf = 0;
            // foreach($listLaptop as $detailLaptop){
            //     $documentNumber = $documentNumber + 1;
            //     $totalDocument = $totalDocument + 1;
            //     if($detailLaptop['company'] == $q || $detailLaptop['product'] == $q) {
            //         $tf[] = 1;
            //         $totaldf = $totaldf + 1;
            //     }else{
            //         $tf[] = 0;
            //     }
            // }

            // $dBagiDf = $totalDocument/$totaldf;
            // $idf = Log($dBagiDf);
            // $idfPlusSatu = $idf + 1;

        }
        var_dump($queryNumber);die;
    }
}