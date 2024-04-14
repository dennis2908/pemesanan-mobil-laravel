<?php

namespace App\Http\Controllers;

use App\Models\kembaliMobil;
use App\Models\minjamMobil;

use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class KembaliMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = minjamMobil::select(['minjam_mobils.id as id','tgl_mulai','tgl_akhir', 'nama', 'no_plat', 'merk', 'model','tgl_kembali_pinjam', 'biaya_sewa', 'tarif'])->join('manajemen_mobils','manajemen_mobils.id','=','minjam_mobils.m_mobil')->join('musers','musers.id','=','minjam_mobils.m_user')->leftJoin('kembali_mobils','kembali_mobils.mpinjam','=','minjam_mobils.id')->orderBy('minjam_mobils.id','desc')->get();
		
		return response()->json(['result'=>$data,'now'=>date('Y-m-d',strtotime(Carbon::now()))]);
    }

    public function cariMobil(Request $request)
    {
        $data = minjamMobil::select(['minjam_mobils.id as id','tgl_mulai','tgl_akhir', 'nama', 'no_plat', 'merk', 'model','tgl_kembali_pinjam', 'biaya_sewa', 'tarif'])->join('manajemen_mobils','manajemen_mobils.id','=','minjam_mobils.m_mobil')->join('musers','musers.id','=','minjam_mobils.m_user')->leftJoin('kembali_mobils','kembali_mobils.mpinjam','=','minjam_mobils.id')->orderBy('minjam_mobils.id','desc')->where('model', 'like', '%' . $request->keyword . '%')->OrWhere('merk', 'like', '%' . $request->keyword . '%')->get();
		
		return response()->json(['result'=>$data,'now'=>date('Y-m-d',strtotime(Carbon::now()))]);
    }
    public function store(Request $request)
    {
          $kembaliMobil = new kembaliMobil;
          $kembaliMobil->mpinjam  = $request->id;
          $kembaliMobil->tgl_kembali_pinjam  = date('Y-m-d',strtotime(Carbon::now()));
          $kembaliMobil->biaya_sewa  = $request->h_sewa;
          $kembaliMobil->save();

          return response()->json(['success'=>'Added new record.']);
    }

}
