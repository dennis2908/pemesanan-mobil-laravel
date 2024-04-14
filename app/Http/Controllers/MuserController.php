<?php

namespace App\Http\Controllers;

use App\Models\Muser;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Crypt;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class MuserController extends Controller
{
    public function index()
    {
        $data = Muser::select(['musers.id','musers.firstname','musers.lastname','musers.age','musers.created_at','musers.m_role','hobbies.name as hobby_name','musers.email','role_name'])->join('mroles','mroles.id','=','musers.m_role')->join('hobbies','hobbies.id','=','musers.hobby')->latest()->get();
		
		return response()->json(['result'=>$data]);
    }

    public function cek_sim($id)
    {
        $data = Muser::select(['id'])->where('no_sim','=',$id)->first();

        return response()->json([
			'result'=>$data
        ]);
    }

    public function doLogin(Request $request)
    {
       $credentials = $request->only('no_sim', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'success' => false,
                	'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
    	//return $credentials;
            return response()->json([
                	'success' => false,
                	'message' => 'Could not create token.',
                ], 500);
        }
 	
 		//Token created, return with success response and jwt token
		$data = Muser::select(['musers.nama','role_assign'])->join('mroles','mroles.id','=','musers.m_role')
        ->where('musers.no_sim','=',$request->no_sim)->first();
        return response()->json([
            'success' => true,
            'token' => $token,
			'result'=>$data
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nama' => 'required|min:3',
            'alamat' => 'required|min:3',
            'no_telp' => 'required|min:3',
            'no_sim' => 'required|min:3',
            'password' => 'required|min:3'
      ]);
      
      
      if ($validator->passes()) {
          
          $muser = new Muser;
          $muser->nama  = $request->nama;
          $muser->alamat  = $request->alamat;
          $muser->no_telp  = $request->no_telp;
          $muser->no_sim = $request->no_sim;
          $muser->password  = bcrypt($request->password);
          $muser->save();

          return response()->json(['success'=>'Added new record.']);

      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|min:3',
            'username' => 'required|min:3',
            'address' => 'required|min:3',
            'password' => 'required|min:3',
            'phone' => 'required|min:3',
            'email'=>'required|min:3|email',
            'm_role'=>'required'
      ]);
      
      
      if ($validator->passes()) {
          
          $muser =  Muser::find($id);
          $muser->name  = $request->name;
          $muser->email  = $request->email;
          $muser->m_role  = $request->m_role;
          $muser->username = $request->username;
          $muser->address  = $request->address;
          $muser->password  = bcrypt($request->password);
          $muser->phone  = $request->phone;
          $muser->save();

          return response()->json(['success'=>'Update existing record.']);

      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }
}