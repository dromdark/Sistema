<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Datatables;

class UserController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(User::select('*'))
            ->addColumn('action', 'user-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('index');
    }
 
 
    public function add(Request $request)
    {  
  
        $UserId = $request->id;
  
        $User   =   User::updateOrCreate(
                    [
                     'id' => $UserId
                    ],
                    [
                    'name' => $request->name,
                    'email' => $request->email,
                    'permission' => $request->permission
                    ]);    
                          
        return Response()->json($User);
    }
 
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $User  = User::where($where)->first();
       
        return Response()->json($User);
    }
 
    public function destroy(Request $request)
    {
        $User = User::where('id',$request->id)->delete();
       
        return Response()->json($User);
    }
}