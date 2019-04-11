<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListNew extends Model
{
    //
    protected $table = "listnews";
    public $timestamps = false; 
    
    public function modnew(){
    	return $this->belongsto('App\ModNews','listidmod','id');
    }
    public function news(){
    	return $this->hasMany('App\News','idlistnew','id');
    }
    public function most_news_in_list_new($list_id){
        $news = News::where('idlistnew',$list_id)->where('status','<>',0)->orderBy('view_count','DESC')->take(5)->get();
        return $news;
    }
    public function news_in_list_new($list_id){
        $news = News::where('idlistnew',$list_id)->where('status','<>',0)->orderBy('created_at','DESC')->take(12)->get();
        return $news;
    }
    
}
