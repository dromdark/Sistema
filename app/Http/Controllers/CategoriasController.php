<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Categorias;
use Datatables;
 
class CategoriasController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Categorias::select('*'))
            ->addColumn('action', 'categorias-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('index');
    }
 
 
    public function add(Request $request)
    {  
  
        $CategoriasId = $request->id;
  
        $Categorias   =   Categorias::updateOrCreate(
                    [
                     'id' => $CategoriasId
                    ],
                    [
                    'Nome' => $request->Nome
                    ]);    
                          
        return Response()->json($Categorias);
    }
 
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $Categorias  = Categorias::where($where)->first();
       
        return Response()->json($Categorias);
    }
 
    public function destroy(Request $request)
    {
        $Categorias = Categorias::where('id',$request->id)->delete();
       
        return Response()->json($Categorias);
    }
}