<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListAdvert(){
        $advert = Advert::all();
        return view('admin.advert',['adverts'=>$advert]);
    }
    public function AddAdvert(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'nnlink' => 'required',
                'sort' => 'required|numeric',
                'nnavatarfile' => 'image|max:500000',                
            ],[
                'nnlink.required'=> 'Link không được bỏ trống',
                'nnavatarfile.image' => 'Avatar phải là hình ảnh',
                'nnavatarfile.max' => 'Avatar dung lượng quá lớn',
                'sort.required' => 'Nhập thứ tự xắp xếp',
                'sort.numeric' => 'Thứ tự xắp xếp phải là số',

            ]);
        $advert = new Advert;
        $advert->hide = $request->nnhide;
        $advert->area = $request->nnshowin;
        $advert->link = $request->nnlink;
        $advert->sort = $request->sort;
        $advert->code = $request->code;
        if($request->hasFile('nnavatarfile')){
                $file = $request->file('nnavatarfile');
                $nameimg = $file->getClientOriginalName(); 
                $hinh = "longtriCo".str_random(6)."_".$nameimg;
                while(file_exists("public/img/images_bn/".$hinh))
                {
                    $hinh = "longtriCo".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/images_bn",$hinh);
                $advert->img = $hinh;
            }else{
                $advert->img = "no-img.png";
            }
        $advert->save();
        return redirect('admin/advert/list')->with('thongbao','thêm thành công');
    }
    public function EditAdvert(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidadvert]);   
        $this->validate($request,[
                'ennlink' => 'required',
                'ennavatarfile' => 'image|max:500000',  
                'esort' => 'required|numeric',              
            ],[
                'ennlink.required'=> 'Link không được bỏ trống',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',
                'esort.required' => 'Nhập thứ tự xắp xếp',
                'esort.numeric' => 'Thứ tự xắp xếp phải là số',

            ]);
        $advert = Advert::find($request->ennidadvert);
        $advert->hide = $request->ennhide;
        $advert->area = $request->ennshowin;
        $advert->link = $request->ennlink;
        $advert->sort = $request->esort;
        $advert->code = $request->ecode;
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = $file->getClientOriginalName(); 
            $hinh = "longtriCo".str_random(6)."_".$nameimg;
            while(file_exists("public/img/images_bn/".$hinh))
            {
                $hinh = "longtriCo".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/images_bn",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists("public/img/images_bn/".$imgold))
                {
                    unlink("public/img/images_bn/".$imgold);
                }
            }
            
            $advert->img = $hinh;
        }
        $advert->save();
        return redirect('admin/advert/list')->with('thongbao','sửa thành công');
    }
    public function DeleteAdvert(Request $request){
        $advert = Advert::find($request->dennidlistpro);
        $advert->delete();
        $imgold = $request->dennimglistpro;
            if($imgold !="no-img.png"){
                while(file_exists("public/img/images_bn/".$imgold))
                {
                    unlink("public/img/images_bn/".$imgold);
                }
            }
        return redirect('admin/advert/list')->with('thongbao','Xóa thành công');

    }
}
