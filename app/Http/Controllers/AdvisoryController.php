<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Advisory;
use App\Language;
use Illuminate\Http\Request;

class AdvisoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListAdvisory(){
        $advisory = Advisory::all();

        $advisory    = Advisory::select('advisory.*', DB::raw('products.image as image'), DB::raw('productdetail.slug as slug'), DB::raw('productdetail.name as name_p'), DB::raw('productdetail.alias as alias'))
                            ->join("products","products.id", "=", "advisory.id_product")
                            ->join("productdetail","products.id", "=", "productdetail.idproduct")
                            ->get();

        $Language = Language::all();
        return view('admin.advisory',['advisory'=>$advisory,'langs'=>$Language]);
    }
    public function DeleteAdvisory(Request $request){
        $advisory = Advisory::find($request->dennid);
        $advisory->delete(); 
        return redirect('admin/advisory/list')->with('thongbao','Xóa thành công');
    }
}
