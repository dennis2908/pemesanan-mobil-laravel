<?php

namespace App\Http\Controllers;

use App\Models\manajemenMobil;
use App\Http\Requests\StoremanajemenMobilRequest;
use App\Http\Requests\UpdatemanajemenMobilRequest;
use Illuminate\Http\Request;
use Validator;

use Carbon\Carbon;

class ManajemenMobilController extends Controller
{
    public function index()
    {
        $data = manajemenMobil::select(['manajemen_mobils.id','merk','model','no_plat','tarif', 'minjam_mobils.tgl_mulai'])->orderBy('manajemen_mobils.id','desc')
        ->leftJoin('minjam_mobils', function($join)
        {
            $join->on('minjam_mobils.m_mobil', '=', 'manajemen_mobils.id')
                 ->where('minjam_mobils.tgl_akhir', '>=', date('Y-m-d',strtotime(Carbon::now())))->where('minjam_mobils.tgl_mulai', '<=', date('Y-m-d',strtotime(Carbon::now())));;
        })
        ->get();
		
		return response()->json(['result'=>$data]);
        
    }

    public function cekplat($id)
    {
        $data = manajemenMobil::select(['id'])->where('no_plat','=',$id)->first();

        return response()->json([
			'result'=>$data
        ]);
    }

    public function cariMobil(Request $request)
    {  


        $data = manajemenMobil::select(['manajemen_mobils.id','merk','model','no_plat','tarif', 'minjam_mobils.tgl_mulai'])->orderBy('manajemen_mobils.id','desc')
        ->leftJoin('minjam_mobils', function($join)
        {
            $join->on('minjam_mobils.m_mobil', '=', 'manajemen_mobils.id')
                 ->where('minjam_mobils.tgl_akhir', '>=', date('Y-m-d',strtotime(Carbon::now())))->where('minjam_mobils.tgl_mulai', '<=', date('Y-m-d',strtotime(Carbon::now())));;
        })->where('model', 'like', '%' . $request->keyword . '%')->OrWhere('merk', 'like', '%' . $request->keyword . '%');

        if($request->keyword ==="Ya"){
            $data->OrWhere('minjam_mobils.tgl_mulai', '=',  null);
        }

        if($request->keyword ==="Tidak"){
            $data->OrWhere('minjam_mobils.tgl_mulai', '!=',  null);
        }
        $dataRes = $data->get();
        
		return response()->json(['result'=>$dataRes]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'merk' => 'required|min:3',
            'model' => 'required|min:3',
            'no_plat' => 'required|min:3',
            'tarif' => 'required',
      ]);
      
      
      if ($validator->passes()) {
          
          $mobil = new manajemenMobil;
          $mobil->merk  = $request->merk;
          $mobil->model  = $request->model;
          $mobil->no_plat  = $request->no_plat;
          $mobil->tarif = $request->tarif;
          $mobil->save();

          return response()->json(['success'=>'Added new record.']);

      }
      return response()->json(['error'=>$validator->errors()->all()]);
    }

}
