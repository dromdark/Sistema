<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Produtos;
use Datatables;

class ProdutosController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Produtos::select('*'))
            ->addColumn('action', 'produtos-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('index');
    }
 
 
    public function add(Request $request)
    {  
  
        $ProdutosId = $request->id;
  
        $Produtos   =   Produtos::updateOrCreate(
                    [
                     'id' => $ProdutosId
                    ],
                    [
                    'Nome' => $request->Nome,
                    'Valor' => $request->Valor,
                    'Descricao' => $request->Descricao
                    ]);    
                          
        return Response()->json($Produtos);
    }
 
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $Produtos  = Produtos::where($where)->first();
       
        return Response()->json($Produtos);
    }
 
    public function destroy(Request $request)
    {
        $Produtos = Produtos::where('id',$request->id)->delete();
       
        return Response()->json($Produtos);
    }
}