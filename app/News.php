<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Session;
use App\News; 
use App\ListNew; 

class News extends Model
{
    //
    protected $table = "news";

    public function listnew(){
    	return $this->belongsto('App\listNew','idlistnew','id');
    }
    public function newuser(){
    	return $this->belongsto('App\User','newuser','id');
    }

    public function modnews($id){
        $lang = Session::get('idlocale');
        $pdetail = News::select( DB::raw('modnews.id as idmod') )
                ->join("listnews","listnews.id", "=", "news.idlistnew")
                ->join("modnews","listnews.listidmod", "=", "modnews.id") 
                ->where('idlang',$lang)
                ->where('news.id',$id)->first();

        return $pdetail;
    }
    public function list_name($id){
        $listnews = ListNew::where('id',$id)->first();
        // dd($listnews);
        return $listnews;
    }
     public function mod_name($id){
        $ModNews = ModNews::where('id',$id)->first();
        // dd($listnews);
        return $ModNews;
    }
}
