<?php

namespace App\Http\Controllers;

use App\Models\minjamMobil;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Validator;

class MinjamMobilController extends Controller
{
    public function index()
    {
        $data = minjamMobil::select(['minjam_mobils.id as id','tgl_mulai','tgl_akhir', 'nama', 'no_plat', 'merk', 'model'])->join('manajemen_mobils','manajemen_mobils.id','=','minjam_mobils.m_mobil')->join('musers','musers.id','=','minjam_mobils.m_user')->orderBy('minjam_mobils.id','desc')->get();
		
		return response()->json(['result'=>$data]);
    }

    public function cariMobil(Request $request)
    {
        $data = minjamMobil::select(['minjam_mobils.id as id','tgl_mulai','tgl_akhir', 'nama', 'no_plat', 'merk', 'model'])->join('manajemen_mobils','manajemen_mobils.id','=','minjam_mobils.m_mobil')->join('musers','musers.id','=','minjam_mobils.m_user')->orderBy('minjam_mobils.id','desc')->where('model', 'like', '%' . $request->keyword . '%')->OrWhere('merk', 'like', '%' . $request->keyword . '%')->get();
		
		return response()->json(['result'=>$data]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'm_mobil' => 'required',
      ]);
      
      
      if ($validator->passes()) {
        // dd($request);
          $pinjam = new minjamMobil;
          $pinjam->tgl_mulai  = $request->tgl_mulai;
          $pinjam->tgl_akhir  = $request->tgl_akhir;
          $pinjam->m_mobil  = $request->m_mobil;
          $pinjam->m_user  = Auth::id();
          $pinjam->save();

          return response()->json(['success'=>'Added new record.']);
    }
    return response()->json(['error'=>$validator->errors()->all()]);
}

public function cekavail(Request $request)
    {
        $data = minjamMobil::latest()->where('m_mobil', '=', $request->m_mobil)->where('tgl_mulai', '>=', $request->tgl_mulai)->where('tgl_mulai', '<=', $request->tgl_akhir)->Orwhere('tgl_akhir', '>=', $request->tgl_mulai)->where('tgl_akhir', '<=', $request->tgl_akhir)->where('m_mobil', '=', $request->m_mobil)->get();
		
		return response()->json(['result'=>$data]);
    }

   
}
