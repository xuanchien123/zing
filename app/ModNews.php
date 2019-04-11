<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModNews extends Model
{
    //
    protected $table = "modnews";
    public $timestamps = false;

    public function lang(){
    	return $this->belongsto('App\Language','idlang','id');
    }

    public function loaitin(){
    	return $this->hasMany('App\ListNew','listidmod','id');
    }
    
    public function tintuc(){
    	return $this->hasManyThrough('App\News','App\ListNew',
    		'listidmod','idlistnew','id');
    } 
    public function top_news_item($mod_id){
   
        $news = News::where('idmodnew',$mod_id)->where('status','<>',0)->orderBy('view_count','DESC')->take(5)->get();
        return $news;
    } 
    public function news_in_mod($mod_id){
        $news = News::where('idmodnew',$mod_id)->where('status','<>',0)->orderBy('created_at','DESC')->skip(0)->take(5)->get();
        return $news;
    }
    public function listnew_inmod ($id){
        $list = ListNew::where('listidmod',$id)->get();
        return $list;
    }

    public function news_in_mod_new($mod_id){
        $news = News::where('idmodnew',$mod_id)->where('status','<>',0)->orderBy('created_at','DESC')->skip(5)->take(5)->get();
        return $news;
    }

}
