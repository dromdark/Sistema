<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Marcas;
use Datatables;

class MarcasController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Marcas::select('*'))
            ->addColumn('action', 'marcas-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('index');
    }
 
 
    public function add(Request $request)
    {  
  
        $MarcasId = $request->id;
  
        $Marcas   =   Marcas::updateOrCreate(
                    [
                     'id' => $MarcasId
                    ],
                    [
                    'Nome' => $request->Nome
                    ]);    
                          
        return Response()->json($Marcas);
    }
 
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $Marcas  = Marcas::where($where)->first();
       
        return Response()->json($Marcas);
    }
 
    public function destroy(Request $request)
    {
        $Marcas = Marcas::where('id',$request->id)->delete();
       
        return Response()->json($Marcas);
    }
}