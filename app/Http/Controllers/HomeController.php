<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Input;

use App\Cate;
use App\Product;
use App\ProductImage;
use App\News;
use App\Slide;
use App\Banking;
use App\Soft;
use App\Socical;
use App\Order;
use App\OrderProduct;
use App\Customers;
use App\Contact;
use App\Language;
use App\Cities;
use App\Districts;
use App\Wards;
use App\Shippings;
use App\Payments;
use App\Translate;
use App\ModProduct;
use App\ListProduct;
use App\ModNews;
use App\ListNew;
use App\ProductStt;
use App\Contactus;
use App\Advert;
use App\Specialgroup;
use App\Project;
use App\Advisory;
use Cart;
use Session;

class HomeController extends Controller {

	public $idlang = 0;
    function __construct(){ 
		$this->middleware(function ($request, $next) {
			$this->idlang = session()->get('idlocale') ;
            return $next($request);
        });
    }
    public function public_var(){ 

            $modnews    = ModNews::where('idlang', $this->idlang)->orderBy('modnumber', 'desc')->get();
            foreach ($modnews as $itemmod => $valuemod) {
                $listnews   = ListNew::where('listidmod', $valuemod->id)->orderBy('listnumber', 'desc')->get();
                $news_special = array();
                foreach ($listnews as $itemlist => $valuelist) {
                    $news   = News::where('idlistnew', $valuelist->id)->orderBy('newnumber', 'desc')->get();
                    $listnews[$itemlist]["news"] = $news; 
                    if(empty($news_special)){
                        $news_special = $news;
                        $listnews[$itemlist]["news_special"] = $news_special;
                    }
                } 
                $modnews[$itemmod]["listnews"] = $listnews; 
            }


            $modproducts    = ModProduct::select('modproducts.*', DB::raw('translates.trname as trname'))
                                ->join("translates","translates.trid", "=", "modproducts.id")
                                ->where('translates.tridlang', $this->idlang)
                                ->where('translates.trcate', 1)
                                ->orderBy('modnumber', 'asc')->get();
            foreach ($modproducts as $itemmod => $valuemod) {
                $listproducts   = ListProduct::select('listproducts.*', DB::raw('translates.trname as trname'))
                                ->join("translates","translates.trid", "=", "listproducts.id")
                                ->where('translates.tridlang', $this->idlang)
                                ->where('listproducts.listidmod', $valuemod->id)
                                ->where('translates.trcate', 2)
                                ->orderBy('listnumber', 'desc')->get();
                foreach ($listproducts as $itemlist => $valuelist) {
                    $products   = Product::select('*', DB::raw('products.id as idproduct'))
                                            ->join("productdetail","productdetail.idproduct", "=", "products.id")
                                            ->where('idlist', $valuelist->id)
                                            ->where('idlang', $this->idlang)
                                            ->where('hide', 0)
                                            ->orderBy('products.id', 'desc')->get();
                    $listproducts[$itemlist]["products"] = $products;
                } 
                $modproducts[$itemmod]["listproducts"] = $listproducts; 
            }
            


            $contact = Contact::find(Session::get('idlocale'));


            $listnews       = ListNew::select('listnews.*')
                            ->join("modnews","modnews.id", "=", "listnews.listidmod")
                            ->where('modnews.idlang', $this->idlang)
                            ->orderBy('listnumber', 'desc')->get();



            $listproducts   = ListProduct::select('listproducts.*', DB::raw('translates.trname as trname'))
                        ->join("translates","translates.trid", "=", "listproducts.id")
                        ->where('translates.tridlang', $this->idlang)
                        ->where('translates.trcate', 2)
                        ->orderBy('listnumber', 'desc')->get();



            $listproducts_cat   = ListProduct::select('listproducts.*', DB::raw('translates.trname as trname'))
                            ->join("translates","translates.trid", "=", "listproducts.id")
                            ->where('translates.tridlang', $this->idlang)
                            ->where('translates.trcate', 2)
                            ->orderBy('id', 'desc')->skip(0)->take(3)->get();
            foreach ($listproducts_cat as $itemlist => $valuelist) {
                $products   = Product::join("productdetail","productdetail.idproduct", "=", "products.id")
                                        ->where('idlist', $valuelist->id)
                                        ->where('idlang', $this->idlang)
                                        ->where('hide', 0)
                                        ->orderBy('products.id', 'desc')->skip(0)->take(3)->get();
                $listproducts_cat[$itemlist]["products"] = $products;
            }

            $socials    = Socical::where('idlang', $this->idlang)->where('hide', 2)->orderBy('id', 'desc')->get();

            $languages  = Language::orderBy('id', 'desc')->get(); 
            $lasted_news = News::orderBy('created_at','DESC')->take(10)->get();
            $most_news = News::orderBy('view_count','DESC')->take(5)->get();
            $khuyenmai = News::orderBy('created_at','DESC')->take(10)->get();
            $adverts_main    = Advert::where('idlang', $this->idlang)->where('hide', 2)->where('area', 4)->orderBy('sort', 'asc')->get();
            $adverts_top    = Advert::where('idlang', $this->idlang)->where('hide', 2)->where('area', 1)->orderBy('sort', 'asc')->get();
            $adverts_center = Advert::where('idlang', $this->idlang)->where('hide', 2)->where('area', 2)->orderBy('sort', 'asc')->get();
            $adverts_bottom = Advert::where('idlang', $this->idlang)->where('hide', 2)->where('area', 3)->orderBy('sort', 'asc')->get();
            $new_tag = News::all();

            $tag_arr=array();
            foreach($new_tag as $tags){
                if($tags->newtag !=''){
                    $tag = explode(", ", $tags->newtag);
                    for($c=0;$c<count($tag);$c++){
                        $check = in_array($tag[$c], $tag_arr);
                        if(!$check){
                            array_push($tag_arr,$tag[$c]);
                        }
                        
                    }
                }                                   
  
            }
           
            $tag_list = $tag_arr;
            $result = array(
                "adverts_main"=>$adverts_main,
                "adverts_top"=>$adverts_top,
                "adverts_center"=>$adverts_center,
                "adverts_bottom"=>$adverts_bottom,
                "lasted_news"=>$lasted_news ,
                "socials"=>$socials,
                "languages"=>$languages,                
                "modnews"=>$modnews,
                "modproducts"=>$modproducts,
                "contact"=>$contact,
                "listnews"=>$listnews,
                "most_news"=>$most_news,
                "listproducts"=>$listproducts,
                "khuyenmai"=>$khuyenmai,
                "listproducts_cat"=>$listproducts_cat,
                "tag_list"=>$tag_list,
                );
            return $result;
    }
    public function error_404()
	{  
        $public_var = $this->public_var();

		return view('home.404',array_merge($public_var, [ ]) );
	}

    // ====================index=================
	public function index()
	{ 
        $mod_new = ModNews::orderBy('modnumber','desc')->get();
        $public_var = $this->public_var();
		return view('home.index', array_merge($public_var, [
                                                            "index_modnew" =>$mod_new,
                                                            ] ));
	}



    // ====================product=================
	public function product($slug)
	{ 
        $detail_product = Product::select('*', DB::raw('products.id as idproduct'))
        							->where('productdetail.slug',$slug)
        							->join("productdetail","products.id", "=", "productdetail.idproduct")
        							->join("productstt","products.status", "=", "productstt.id")
		        					->where('productdetail.idlang',$this->idlang)
									->where('hide', 0)
		        					->get()->first();
		if(!empty($detail_product)){
	        $list_img_product = ProductImage::where('idproduct',$detail_product->idproduct)->get();

	        $related_product  = Product::select('*', DB::raw('products.id as idproduct'))
	       								->where('products.idlist',$detail_product->idlist)
	        							->where('products.id',"<>",$detail_product->idproduct)
			        					->join("productdetail","products.id", "=", "productdetail.idproduct")
			        					->where('productdetail.idlang',$this->idlang)
			        					->orderBy('products.id', 'desc')
										->where('hide', 0)
	        							->skip(0)->take(8)->get();
            $pro = Product::find($detail_product->idproduct);
            $pro->view_count = $pro->view_count +1;
            $pro->save();
	        // ================================   
			// ================================ 
            $lasted_news = News::orderBy('created_at','DESC')->take(10)->get();
            $public_var = $this->public_var();

			return view('home.product',array_merge($public_var, 
                                        [  
										'detail_product'=>$detail_product, 
										'list_img_product'=>$list_img_product, 
                                        'related_product'=>$related_product,
                                        'lasted_news'=>$lasted_news
                                        ]));
		}else{
			return redirect('');
		}
	}



    // ====================news=================
	public function news($slug)
	{ 
        $itemnews	= News::select('news.*')
        					->join("listnews","listnews.id", "=", "news.idlistnew")
        					->join("modnews","modnews.id", "=", "listnews.listidmod")
        					->where('modnews.idlang', $this->idlang)
        					->where('news.slug', $slug)
        					->get()->first();        

        if(empty($itemnews)){
           $itemnews    = News::select('news.*')
                            ->join("modnews","modnews.id", "=", "news.idmodnew")
                            ->where('modnews.idlang', $this->idlang)
                            ->where('news.slug', $slug)
                            ->get()->first();  
        }
		if(empty($itemnews)){
			return redirect("");
		}else{ 
            $new_in_list_active = News::where('idlistnew',$itemnews->idlistnew)
                                        ->where('id','<>',$itemnews->id)
                                        ->orderBy('created_at','DESC')
                                        ->take(4)
                                        ->get();  
	    	$new_in_list_item = News::where('idlistnew',$itemnews->idlistnew)
                                        ->where('id','<>',$itemnews->id)
                                        ->orderBy('created_at','DESC')
                                        ->skip(3)
                                        ->take(4)
                                        ->get();	

            $itemnews->view_count = $itemnews->view_count +1;
            $itemnews->save();
            $public_var = $this->public_var();
            return view('home.news',array_merge($public_var, [ 
                                                            'new_in_list_active'=>$new_in_list_active, 
        													'new_in_list_item'=>$new_in_list_item, 
                                                            'itemnews'=>$itemnews, 
                                                             ]));
		}
	}

    // ======================list new=============
	public function list_news($slug)
    {
        $list = ListNew::where('slug',$slug)->first();
       /* dd($list->toArray());*/
        if(!empty($list)){
            $total = News::where('idlistnew',$list->id)->count();
            $listnews_cat = News::where('idlistnew',$list->id)->where('status','<>',0)->orderBy('created_at','DESC')->take(10)->get();
            $public_var = $this->public_var();
            return view('home.listnews',array_merge($public_var, [ 
                                                    'listnew'=>$list,
                                                    'listnews_cat'=>$listnews_cat,
                                                    "total" => $total,
                                                    ]));
        } else {
            $mod = ModNews::where('slug',$slug)->first();
            if(!empty($mod)){                
                $public_var = $this->public_var();
                $total = News::where('idmodnew',$mod->id)->count();
                $modnews_cat = News::where('idmodnew',$mod->id)->where('status','<>',0)->orderBy('created_at','DESC')->take(10)->get();
                return view('home.modnews',array_merge($public_var, [ 
                                                                    'modnew' =>$mod,
                                                                    'modnews_cat'=>$modnews_cat,
                                                                    "total" => $total,
                                                                    ]));
            } else {
                return redirect()->Route('error_404');
            }
            
        }
    }
	// ====================list_product=======================
	public function list_product($slug)
    {
        $detail_cat   = ListProduct::select('listproducts.*', DB::raw('translates.trname as trname'))
                    ->join("translates","translates.trid", "=", "listproducts.id")
                    ->where('translates.tridlang', $this->idlang)
                    ->where('listproducts.slug', $slug)->get()->first();
        if(!empty($detail_cat)){

            $query  = Product::select('*', DB::raw('productdetail.slug as slug'))
                            ->join("productdetail","productdetail.idproduct", "=", "products.id")
                            ->join("listproducts","listproducts.id", "=", "products.idlist")
                            ->where('products.hide', 0)
                            ->where('productdetail.idlang',$this->idlang)
                            ->where('products.idlist',$detail_cat->id);

            $list_product_cat = $query->get();
            $productstt = ProductStt::orderBy('id', 'desc')->get();
        
            $public_var = $this->public_var();
            return view('home.listproduct',array_merge($public_var, [ 
                                                    'list_product_cat'=>$list_product_cat,
                                                    'productstt'=>$productstt, 
                                                    'detail_cat'=>$detail_cat,
                                                    ] ));

        }else {
            $detail_cat = ModProduct::select('modproducts.*', DB::raw('translates.trname as trname'))
                    ->join("translates","translates.trid", "=", "modproducts.id")
                    ->where('translates.tridlang', $this->idlang)
                    ->where('translates.trcate', 1)
                    ->where('modproducts.slug', $slug)
                    ->get()->first(); 
            if(!empty($detail_cat)){
                $productstt = ProductStt::orderBy('id', 'desc')->get();
        
                $public_var = $this->public_var();
                return view('home.modproduct',array_merge($public_var, [
                                                    'productstt'=>$productstt, 
                                                    'detail_cat'=>$detail_cat,
                                                    ] ));
            } else {
                return redirect()->Route('error_404');
            }
            
        } 
        
    }

	public function search()
	{        

        $key = Input::get('key', ""); 

        $news = News::where('status','<>',0)->where('newsname',"like",'%'.$key.'%')->take(20)->get();
        $public_var = $this->public_var();
        return view('home.search',array_merge($public_var, [ 											
            												'news_serch'=>$news,
            												'key'=>$key,		
                                                            ] ));
	}
    public function tags($tag)
    {        

        $key = str_replace("-"," ",$tag);

        $news = News::where('status','<>',0)->where('newtag',"like",'%'.$key.'%')->get();

        $public_var = $this->public_var();
        return view('home.search',array_merge($public_var, [                                            
                                                            'news'=>$news,
                                                            'tags'=>$key,        
                                                            ] ));
    }

	// =========================cart=========================
	public function cart()
	{
		$carts = Cart::content(); 
        // ================================   
		// ================================        					

        $public_var = $this->public_var();
        return view('home.cart',array_merge($public_var, [  'carts'=>$carts ]));
	}

	public function addcart_ajax(Request $request){
		$idproduct = $request->input('idproduct');
		$product = Product::select('*', DB::raw('products.id as idproduct'))
							->where('products.id',$idproduct)
							->join("productdetail","products.id", "=", "productdetail.idproduct")
        					->where('productdetail.idlang',$this->idlang)
        					->where('hide', 0)
        					->get()->first(); 

        if(!empty($product->price) && $product->price != 0){                            
    		if(!empty($product->vat) || $product->vat != 0){        					
            	$price_with_vat = $product->price + $product->price * $product->vat / 100;
            	$price_to_sale_with_vat = $product->price_to_sale + $product->price_to_sale * $product->vat / 100;
            }else{      					
            	$price_with_vat = $product->price;
            	$price_to_sale_with_vat = $product->price_to_sale;
            }
            $price_show = $product->price;

    		Cart::add(['id' => $idproduct, 
    					'name' => $product->name, 
    					'qty' => 1, 
    					'price' => $price_with_vat, 
    					'options' => ['image' => $product->image, 
    									'vat' => $product->vat, 
    									'unit' => $product->currency, 
    									'currency' => $product->currency, 
    									'price_show' => $price_show,
    									'price' => $product->price,
    									'price_with_vat' => $price_with_vat, 
    									'price_to_sale' => $product->price_to_sale, 
    									'price_to_sale_with_vat' => $price_to_sale_with_vat, 
    									'quantity_sale' => $product->quantity_sale] ]);
    	   
    	 	$cart 	   = Cart::content();
    		foreach ($cart as $item) {
    			if($item->qty >= $item->options->quantity_sale && ($item->options->quantity_sale != 0 || !empty($item->options->quantity_sale)) ){
    				$price 		= $item->options->price_to_sale_with_vat;
    				$price_show = $item->options->price_to_sale;
    			}else{
    				$price 		= $item->options->price_with_vat;
    				$price_show = $item->options->price;
    			}

                Cart::update( $item->rowId, ['id' => $item->id, 
                'name' => $item->name, 
                'qty' => $item->qty, 
                'price' => $price, 
                'options' => ['image' => $item->options->image, 
                                'vat' => $item->options->vat, 
                                'unit' => $item->options->currency, 
                                'currency' => $item->options->currency, 
                                'price_show' => $price_show,
                                'price' => $item->options->price,
                                'price_with_vat' => $item->options->price_with_vat, 
                                'price_to_sale' => $item->options->price_to_sale, 
                                'price_to_sale_with_vat' => $item->options->price_to_sale_with_vat, 
                                'quantity_sale' => $item->options->quantity_sale] ]);
    		}
    		$totalCart = format_curency(Cart::total(0,"",""));
    		echo $product->name.trans('index.added_cart')."<a href='".url('gio-hang')."'>".trans('index.cart')."</a>\n".trans('index.added_cart_total').$totalCart." ";
        }else{
            echo $product->name.trans('index.not_added_cart')."<a href='".url('gio-hang')."'>".trans('index.cart')."</a>";
        }
	}
	public function removecart($rowId){
		Cart::remove($rowId);
      	return redirect()->back();
	}	
	public function updatecart_ajax(Request $request){
		$rowId 	= $request->input('rowid');
		$qty 	= $request->input('qty'); 
		Cart::update($rowId, $qty);
		$item   = Cart::get($rowId);
		$id = $item->id;
 
		if($item->qty >= $item->options->quantity_sale){
			$price 		= $item->options->price_to_sale_with_vat;
			$price_show = $item->options->price_to_sale;
		}else{
			$price 		= $item->options->price_with_vat;
			$price_show = $item->options->price;
		}

        Cart::update( $item->rowId, ['id' => $item->id, 
        'name' => $item->name, 
        'qty' => $item->qty, 
        'price' => $price, 
        'options' => ['image' => $item->options->image, 
                        'vat' => $item->options->vat, 
                        'unit' => $item->options->currency, 
                        'currency' => $item->options->currency, 
                        'price_show' => $price_show,
                        'price' => $item->options->price,
                        'price_with_vat' => $item->options->price_with_vat, 
                        'price_to_sale' => $item->options->price_to_sale, 
                        'price_to_sale_with_vat' => $item->options->price_to_sale_with_vat, 
                        'quantity_sale' => $item->options->quantity_sale] ]);
 

		$item = Cart::get($item->rowId);

		$result = array(
						'link_delete' => url('removecart/'.$item->rowId), 
						'rowid' 	  => $item->rowId, 
						'priceitem'   => format_curency($item->options->price_show) , 
						'totalitem'   => format_curency($item->subtotal) , 
						'subtotal' 	  => format_curency(Cart::subtotal(0,"","")) , 
						'total' 	  => format_curency(Cart::total(0,"","")) , 
						);

		echo json_encode($result);
	}

	// ======================pay========================
	public function pay()
	{
		if(session('logined_cusid') == ""){
			return redirect('checkout');
		}else{
			$carts = Cart::content();
	        $cities 	= Cities::orderBy('name', 'desc')->get(); 
            $customer   = Customers::find(Session::get("logined_cusid"));
	        // ================================  
			// ================================ 
  
            $public_var = $this->public_var();
            return view('home.pay',array_merge($public_var, [ 
												'carts'=>$carts, 
                                                'cities'=>$cities,
												'customer'=>$customer,
                                                ]) );
		}
	}

	// ======================`kout========================
	public function checkout() 
	{
		if(session('logined_cus') == 1){
			return redirect('thanhtoan');
		}else{
			$carts = Cart::content();
	        $cities 	= Cities::orderBy('name', 'desc')->get(); 
            // ================================   
			// ================================   
 
 
            $public_var = $this->public_var();
            return view('home.checkout',array_merge($public_var, [  
													'carts'=>$carts, 
													'cities'=>$cities ]) );
		}
	}
	public function order_not_account(Request $request){
        Session::put('logined_cus', 0);
		Session::put('logined_cusid', 1);
	}

	public function store_address_pay(Request $request){
		$name 				= $request->input('name');
		$phone 				= $request->input('phone');
		$address 			= $request->input('address');
		$comment 			= $request->input('comment');
		$select_city 		= $request->input('select_city');
		$select_district 	= $request->input('select_district');
		$select_ward 		= $request->input('select_ward');
		$fulladdress 		= $request->input('fulladdress');

		$pay_error = 0;

		$error = array(
			"name" 			=> "",
			"phone" 		=> "",
			"address" 		=> "",
			"comment" 		=> "",
			"select_city" 	=> "",
			"select_district" => "",
			"fulladdress" 	=> "",
			);

		if(!empty($name)){
			Session::put('pay_name', $name);
		}else{
			$error["name"] = trans('form.err_fullname');
			$pay_error = 1;
		}

		if(!empty($phone)){
			Session::put('pay_phone', $phone);
		}else{
			$error["phone"] = trans('form.err_phone');
			$pay_error = 1;
		}

		if(!empty($fulladdress)){
			Session::put('pay_address', $fulladdress);
		}else if($select_city == ""){
			$error["address"] = trans('form.err_address');
			$pay_error = 1;
		}


		if($select_city != "" || empty($fulladdress)){
			$err = 0;
			if($select_city == ""){
				$error["select_city"] = trans('form.err_select_city');
				$err = 1;
			}
			if($select_district == ""){
				$error["select_district"] = trans('form.err_select_district');
				$err = 1;
			}
			if($address == ""){
				$error["address"] = trans('form.err_address');
				$err = 1;
			}
			if($err == 0){
        		$city 		= Cities::find($select_city);
        		$district 	= Districts::find($select_district);
                // dd($select_ward);
        		if($select_ward != ""){   
        			$ward 		= Wards::where('id',$select_ward)->first();
                    // dd($ward);
        			$fulladdress = $address.", ".$ward->name.", ".$district->name.", ".$city->name;
        		}else{
        			$fulladdress = $address.", ".$district->name.", ".$city->name;
        		}
        		Session::put('pay_address', $fulladdress);
			}else{
				$pay_error = 1;
			}
		}
 
		Session::put('pay_error', $pay_error);

        echo json_encode($error);
	}

	// ==================================giaohang====================
	public function giaohang()
	{ 
		if(session('logined_cusid') == "" || session('pay_error') != 0){
			return redirect('checkout');
		}else{ 
	        $cities 	= Cities::orderBy('name', 'desc')->get();


	        // ================================  
			// ================================   
  
            $public_var = $this->public_var();
            return view('home.giaohang',array_merge($public_var, [  
													'cities'=>$cities ]) );
		}
	}
	public function select_distict_ajax(Request $request){
		$idcity 	= $request->input('idcity');
        $districts 	= Districts::where('idcity',$idcity)->orderBy('name', 'desc')->get();
        $html = "<option value=''>".trans('shipping.select_district')."</option>";
        foreach ($districts as $item) {
        	$html.="<option value=".$item->id.">".$item->name."</option>";
        }
        echo $html;
	}
	public function select_ward_ajax(Request $request){
		$iddistrict 	= $request->input('iddistrict');
        $wards 	= Wards::where('iddistrict',$iddistrict)->orderBy('name', 'desc')->get();
        $html = "<option value=''>".trans('shipping.select_ward')."</option>";
        foreach ($wards as $item) {
        	$html.="<option value=".$item->id.">".$item->name."</option>";
        }
        echo $html;
	}
	public function store_address_shipping(Request $request){
		$same_address 		= $request->input('same_address');
		if($same_address == "1"){
			Session::put('shipping_name', session('pay_name'));
			Session::put('shipping_phone', session('pay_phone'));
			Session::put('shipping_address', session('pay_address'));
			Session::put('same_address', 1);
			Session::put('shipping_error', 0);
		}else{
			$name 				= $request->input('name');
			$phone 				= $request->input('phone');
			$address 			= $request->input('address');
			$select_city 		= $request->input('select_city');
			$select_district 	= $request->input('select_district');
			$select_ward 		= $request->input('select_ward');
			$fulladdress 		= $request->input('fulladdress');

			$shipping_error = 0;

			$error = array(
				"name" 			=> "",
				"phone" 		=> "",
				"address" 		=> "",
				"select_city" 	=> "",
				"select_district" => "",
				"fulladdress" 	=> "",
				);

			if(!empty($name)){
				Session::put('shipping_name', $name);
			}else{
				$error["name"] = trans('form.err_fullname');
				$shipping_error = 1;
			}

			if(!empty($phone)){
				Session::put('shipping_phone', $phone);
			}else{
				$error["phone"] = trans('form.err_phone');
				$shipping_error = 1;
			}

			if(!empty($fulladdress)){
				Session::put('shipping_address', $fulladdress);
			}else if($select_city == ""){
				$error["address"] = trans('form.err_address');
				$shipping_error = 1;
			}


			if($select_city != "" || empty($fulladdress)){
				$err = 0;
				if($select_city == ""){
					$error["select_city"] = trans('form.err_select_city');
					$err = 1;
				}
				if($select_district == ""){
					$error["select_district"] = trans('form.err_select_district');
					$err = 1;
				}
				if($address == ""){
					$error["address"] = trans('form.err_address');
					$err = 1;
				}
				if($err == 0){
	        		$city 		= Cities::find($select_city);
	        		$district 	= Districts::find($select_district);

	        		if($select_ward != ""){
	        			$ward 		= Wards::find($select_ward);
	        			$fulladdress = $address.", ".$ward->name.", ".$district->name.", ".$city->name;
	        		}else{
	        			$fulladdress = $address.", ".$district->name.", ".$city->name;
	        		}
	        		Session::put('shipping_address', $fulladdress);
				}else{
					$shipping_error = 1;
				}
			}
 
			Session::put('same_address', 0);
			Session::put('shipping_error', $shipping_error);

	        echo json_encode($error);
	    }
	}

	// =============================login=========================
	public function login()
	{ 
 
		if(session('logined_cusid') != "" && session('logined_cus') == 1){
			return redirect('user');
		}
		
		// ================================  
		// ================================   
        $public_var = $this->public_var();
        return view('home.login',array_merge($public_var, []) );
	}

	public function login_ajax(Request $request){
		$email 		= $request->input('email');
		$password 	= sha1($request->input('pass'));

		$checkLogin = Customers::where("cusemail",'=',$email)->where("cuspass",'=',$password)->where("status",'=',1)->first();
		if(count($checkLogin) == 1){
          	Session::put('logined_cus', 1);
			Session::put('logined_cusid', $checkLogin->id);
			Session::put('logined_cusfullname', $checkLogin->cusfullname);
			Session::put('logined_cusemail', $checkLogin->cusemail);
			Session::put('logined_cusphone', $checkLogin->cusphone);
			Session::put('logined_cusimg', $checkLogin->cusimg);
			Session::put('logined_cusaddress', $checkLogin->cusaddress);


              // ==============save info to order =============== 
              Session::put('pay_name', $checkLogin->cusfullname);
              Session::put('pay_phone', $checkLogin->cusphone);
              Session::put('pay_address', $checkLogin->cusaddress);

              Session::put('shipping_name', session('pay_name'));
              Session::put('shipping_phone', session('pay_phone'));
              Session::put('shipping_address', session('pay_address'));
              Session::put('same_address', 1);
              Session::put('shipping_error', 0); 
              // =============================

			echo 1;
		}else{
			echo 0;
		}
	}	


	public function ok()
	{  
		// ================================  
        $public_var = $this->public_var();
        return view('home.ok',array_merge($public_var, [ ]) );
	}


	public function register()
	{ 
		if(session('logined_cusid') != "" && session('logined_cus') == 1){
			return redirect('user');
		}

		// ================================   
		// ================================ 
  
        $public_var = $this->public_var();
        return view('home.register',array_merge($public_var, [ ]) );
	}



	// ===========================thanhtoan======================
	public function thanhtoan()
	{
        // if(session('logined_cusid') == "" || session('shipping_error') != 0){
        //  return redirect('giaohang');
        // }else{
        
        if(Cart::count() <= 0){
			return redirect('cart');
		}else{
            $customer   = Customers::find(Session::get("logined_cusid"));
			$carts = Cart::content(); 
	        $payments 	= Payments::where('idlang',$this->idlang)->orderBy('type', 'desc')->get();
	        $shippings 	= Shippings::where('idlang',$this->idlang)->orderBy('name', 'desc')->get();


	        // ================================   
			// ================================    
            $public_var = $this->public_var();
            return view('home.thanhtoan',array_merge($public_var, [  
													'carts'=>$carts, 
                                                    'payments'=>$payments, 
													'customer'=>$customer, 
													'shippings'=>$shippings ]) );
		}
	}

	public function get_shipping_fee(Request $request){
		$idshipping 	= $request->input('idshipping');
		$shipping 		= Shippings::find($idshipping);
		$fee 			= format_curency($shipping->fee);
		echo $fee;
	}

	public function submit_order(Request $request){
		if(Cart::count() > 0){
            $txtNameOrder       = $request->input('txtNameOrder');
            $txtPhoneOrder      = $request->input('txtPhoneOrder');
            $txtEmailOrder      = $request->input('txtEmailOrder');
            // $sltCountpeople     = $request->input('sltCountpeople');

              // ==============save info to order =============== 
              Session::put('pay_name', $txtNameOrder);
              Session::put('pay_phone', $txtPhoneOrder);
              Session::put('pay_email', $txtEmailOrder);
              Session::put('pay_address', "");

              Session::put('shipping_name', session('pay_name'));
              Session::put('shipping_phone', session('pay_phone'));
              Session::put('shipping_address', session('pay_address'));
              Session::put('shipping_email', session('pay_email'));
              Session::put('same_address', 1);
              Session::put('shipping_error', 0); 
              // =============================

            // $val_date_order_at  = $request->input('val_date_order_at');
			$idshipping 		= $request->input('idshipping');
			$idpayment 			= $request->input('idpayment');
			$comment 			= $request->input('comment');

			$shipping 		= Shippings::find($idshipping);
			$payment 		= Payments::find($idpayment);


	        $item_order = new Order;
			if(session('logined_cusid') != "" && session('logined_cus') == 1){ //-- khách đăng nhập
				$custommer 				= Customers::find(session('logined_cusid'));
	        	$item_order->user_name  = "Khách online";
	        	$item_order->idcustomer = session('logined_cusid');
	        	$item_order->name 		= session('logined_cusfullname');
	        	$item_order->address 	= session('logined_cusaddress');
	        	$item_order->telephone 	= session('logined_cusphone');
	        	$item_order->email 		= session('logined_cusemail');

	        }else{	//--- khách vãng lai
	        	$item_order->user_name  = "Khách vãng lai";
	        	$item_order->idcustomer = 1;
	        	$item_order->name 		= session('shipping_name');
	        	$item_order->address 	= session('shipping_address');
	        	$item_order->telephone 	= session('shipping_phone');
	        	$item_order->email 		= session('shipping_email');
	        } 

	    	$item_order->total_order         		= Cart::total(0,"","") ;
	    	$item_order->total_pay         			= Cart::total(0,"","") + $shipping->fee;

	    	$item_order->comment         			= $comment;
	    	$item_order->ip 	         			= $this->get_client_ip();
	    	$item_order->idpayment 		 			= $idpayment;
	    	$item_order->payment_name 	 			= Session::get("pay_name");
	    	$item_order->payment_telephone 	 		= Session::get("pay_phone");
	    	$item_order->payment_address 	 		= Session::get("pay_address");
	    	$item_order->payment_credit_number 	 	= Session::get("payment_credit_number");
	    	$item_order->payment_credit_name 	 	= Session::get("payment_credit_name");
	    	$item_order->payment_credit_expdate 	= Session::get("payment_credit_expdate");
	    	$item_order->payment_credit_transactionid = Session::get("payment_credit_transactionid");
	    	$item_order->idshipping 	 			= $idshipping;
	    	$item_order->shipping_name 	 			= Session::get("shipping_name");
	    	$item_order->shipping_telephone 	 	= Session::get("shipping_phone");
	    	$item_order->shipping_address 	 	 	= Session::get("shipping_address");
            $item_order->shipping_fee               = $shipping->fee;
            // $item_order->date_order_at              = $val_date_order_at;
	    	// $item_order->number_people 	 	 		= $sltCountpeople;
	        $item_order->save();

	        $idorder = $item_order->id;
			if($idorder){
				$cart 	  = Cart::content();
				foreach ($cart as $item) {
					$orderItem = new OrderProduct();
					$orderItem->name  		= $item->name;
					$orderItem->quantity 	= $item->qty;
					$orderItem->price 		= $item->price;
					$orderItem->total   	= $item->subtotal;
					$orderItem->idproduct   = $item->id;
					$orderItem->idorder   	= $idorder;
					$orderItem->save();
				}
				Cart::destroy();



	          $customer = Customers::find(Session::get("logined_cusid"));
	          $customer->cusphone     = Session::get("pay_phone");
	          $customer->cusaddress   = Session::get("pay_address");
	          $customer->save();

				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}	

	function get_client_ip() {
	    $ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}


	function check_payment_creaditcart(Request $request){
		$idshipping 		 	= $request->input('idshipping');
		$payment_credit_type 	= $request->input('payment_credit_type');
		$payment_credit_number 	= $request->input('payment_credit_number');
		$payment_credit_name 	= $request->input('payment_credit_name');
		$payment_credit_expdate	= $request->input('payment_credit_expdate');
		$payment_credit_cvv2 	= $request->input('payment_credit_cvv2');

		$shipping 		= Shippings::find($idshipping);
		$contact = Contact::find(Session::get('idlocale'));

		$api_endpoint 	= 'https://api-3t.sandbox.paypal.com/nvp';
		$api_username 	= $contact->api_username;
		$api_password 	= $contact->api_password;
		$api_signature 	= $contact->api_signature;
    	$AMT 		    = Cart::total(0,"","") + $shipping->fee;
 
		// $number = "6011041221999335";
		// $expdate = "042022";
		// $cvv2    = "335";

		// $number = "6011041469099434";
		// $expdate = "022020";
		// $cvv2    = "434";

	   // Tạo yêu cầu API và lưu các tham số đó vào mảng
	   $request_params = array (
	      'METHOD' 			=> 'DoDirectPayment',
	      'USER' 			=> $api_username,
	      'PWD' 			=> $api_password,
	      'SIGNATURE' 		=> $api_signature,
	      'VERSION' 		=> "85.0",
	      'PAYMENTACTION' 	=> 'Sale',
	      'IPADDRESS' 		=> $_SERVER['REMOTE_ADDR'],
	      'CREDITCARDTYPE' 	=> $payment_credit_type,
	      'ACCT' 			=> $payment_credit_number,
	      'EXPDATE' 		=> $payment_credit_expdate,
	      'CVV2' 			=> $payment_credit_cvv2,
	      'FIRSTNAME' 		=> $payment_credit_name,
	      'AMT' 			=> $AMT,
	      'CURRENCYCODE' 	=> Session::get("curency_codelocale"),
	      'DESC' 			=> Session::get("pay_name")." - ".Session::get("pay_phone")
	   );
	 
	   // vòng lặp với mảng $request_params để tạo chuỗi NVP (Name-Value Pair).
	   $nvp_string = '';
	   foreach($request_params as $var=>$val)
	   {
	      $nvp_string .= '&'.$var.'='.urlencode($val);
	   }
	   // gửi yêu cầu (chuỗi NVP ) HTTP đến PayPal
	   $curl = curl_init();
	 
	   curl_setopt($curl, CURLOPT_VERBOSE, 0);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	   curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	   curl_setopt($curl, CURLOPT_URL, $api_endpoint);
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
	 
	    // những thông tin trên được gửi qua Paypal và tôi sẽ nhận được phản hồi trong biến $result
	   $result = curl_exec($curl);
	 
	   curl_close($curl);
	 
	   // Phân tách chuỗi phản hồi dùng hàm parse_str()
	   $nvp_response_array = parse_str($result);
	 
	 
		// Hàm chuyển chuỗi NVP sang dạng mảng
	   $result_array = array();
	   $NVPString = $result;
	   while(strlen($NVPString))
	   {
	      	// key
			$keypos= strpos($NVPString,'=');
			$keyval = substr($NVPString,0,$keypos);

			//value
			$valuepos = strpos($NVPString,'&') ? strpos($NVPString,'&'): strlen($NVPString);
			$valval = substr($NVPString,$keypos+1,$valuepos-$keypos-1);

			// giải mã chuỗi phản hồi
			$result_array[$keyval] = urldecode($valval);
			$NVPString = substr($NVPString,$valuepos+1,strlen($NVPString));
		}

	   // hiển thị dạng phản hồi API theo mảng
	   if( isset($result_array["ACK"]) ){
	   		if($result_array["ACK"] == "Success"){
				Session::put('payment_credit_type', $payment_credit_type);
				Session::put('payment_credit_number', $payment_credit_number);
				Session::put('payment_credit_name', $payment_credit_name);
				Session::put('payment_credit_expdate', $payment_credit_expdate);
				Session::put('payment_credit_transactionid', $result_array["TRANSACTIONID"]);

	   	    	echo 1;
	   		}else{
	   	    	echo $result_array;
	   		}
	   }else{
	   	    echo $result_array;
	   }
	}

 

	// ===============user===================
	public function user()
	{ 
		if(session('logined_cusid') == "" || session('logined_cus') != 1 ){
			return redirect("login");
		}

		$customer 	= Customers::find(Session::get("logined_cusid"));
        $cities 	= Cities::orderBy('name', 'desc')->get();

        // ================================   
		// ================================  
  
        $public_var = $this->public_var();
        return view('home.user',array_merge($public_var, [ 
											'customer'=>$customer,
											'cities'=>$cities ]) );
	}

 

	// ===============contact===================
	public function contact()
	{    
        // ================================  
		// ================================   
        $public_var = $this->public_var();
        return view('home.contact',array_merge($public_var, [ ]) );
	}


    function save_contact(Request $request){ 
        $name         	= $request->input('name');
        $email          = $request->input('email');
        $content        = $request->input('content');
        $register_error = 0;

        $error = array(
          "name"       => "",
          "email"      => "", 
          "content"    => "", 
          );

        if(empty($name)){
          $error["name"] = trans('form.err_fullname');
          $register_error = 1;
        }

        if(empty($email)){
          $error["email"] = trans('form.err_email');
          $register_error = 1;
        }

        if(empty($content)){
          $error["content"] = trans('form.err_content');
          $register_error = 1;
        }
 
        
        if($register_error == 0){
          $contact = new Contactus;
          $contact->name   		= $name;
          $contact->email       = $email; 
          $contact->content     = $content; 
          $contact->save();
        }

        echo json_encode($error);
    }



    public function get_price_range(Request $request)
        {        
            $range = $request->input('range');
     
            $range = explode(",",$range );

        $result = array(
            "range_min" => format_curency($range [0]),
            "range_max" => format_curency($range [1])
        );

            echo json_encode($result );
    }
 

    public function get_post_ajax(Request $request){
        $idproduct  = $request->input('idproduct');
        $type_get   = $request->input('type_get');

        $detail_product = array();

        if($type_get == 0){
            $detail_product = Product::select('*', DB::raw('products.id as idproduct'))
                                        ->where('products.id',$idproduct)
                                        ->join("productdetail","products.id", "=", "productdetail.idproduct")
                                        ->join("productstt","products.status", "=", "productstt.id")
                                        ->where('productdetail.idlang',$this->idlang)
                                        ->where('hide', 0)
                                        ->get()->first(); 
        }else if($type_get == 1){  
            $next_product = DB::select('select min(id) as id from products where hide <> 1 AND id > '.$idproduct." AND id <> ".$idproduct);
            if(!empty($next_product[0]->id)){
                $next_product = $next_product[0];  
                $idproduct = $next_product->id;

                $detail_product = Product::select('*', DB::raw('products.id as idproduct'))
                                            ->where('products.id', $next_product->id)
                                            ->join("productdetail","products.id", "=", "productdetail.idproduct")
                                            ->join("productstt","products.status", "=", "productstt.id")
                                            ->where('productdetail.idlang',$this->idlang)
                                            ->where('hide', 0)
                                            ->get()->first();  
            }
        }else if($type_get == 2){
            $next_product = DB::select('select max(id) as id from products where hide <> 1 AND id < '.$idproduct." AND id <> ".$idproduct);
            if(!empty($next_product[0]->id)){
                $next_product = $next_product[0];  
                $idproduct = $next_product->id;

                $detail_product = Product::select('*', DB::raw('products.id as idproduct'))
                                            ->where('products.id', $next_product->id)
                                            ->join("productdetail","products.id", "=", "productdetail.idproduct")
                                            ->join("productstt","products.status", "=", "productstt.id")
                                            ->where('productdetail.idlang',$this->idlang)
                                            ->where('hide', 0)
                                            ->get()->first();  
            }
        }

        $check_next = DB::select('select min(id) as id from products where hide <> 1 AND id > '.$idproduct." AND id <> ".$idproduct);
        $check_next = $check_next[0]->id;

        $check_pre = DB::select('select max(id) as id from products where hide <> 1 AND id < '.$idproduct." AND id <> ".$idproduct);
        $check_pre = $check_pre[0]->id;

        // print_r("<br><br><br>".$check_pre."-".$idproduct."-".$check_next);

        return view('computer.home.content_ajax', ["detail_product"=>$detail_product, 
                                                    "idproduct"=>$idproduct, 
                                                    "check_next"=>$check_next, 
                                                    "check_pre"=>$check_pre]);

    }


    function save_tu_van_product(Request $request){ 
        $name           = $request->input('name');
        $email          = $request->input('email');
        $content        = $request->input('content');
        $product_id        = $request->input('product_id');
        $register_error = 0;

        $error = array(
          "name"       => "",
          "email"      => "", 
          "content"    => "", 
          );

        if(empty($name)){
          $error["name"] = trans('form.err_fullname');
          $register_error = 1;
        }

        if(empty($email)){
          $error["email"] = trans('form.err_email');
          $register_error = 1;
        }

        if(empty($content)){
          $error["content"] = trans('form.err_content');
          $register_error = 1;
        }
 
        
        if($register_error == 0){
          $contact = new Advisory;
          $contact->name        = $name;
          $contact->email       = $email; 
          $contact->content     = $content; 
          $contact->id_product     = $product_id; 
          $contact->save();
        }

        echo json_encode($error);
    }
    public function loadmore_news_in_mod(Request $rq){
        $modid = $rq->modid;
        $skip = $rq->skip;
        $take = $rq->take;
        $modnew = ModNews::where('id',$modid)->first();
        $modnews_cat = News::where('idmodnew',$modid)->where('status','<>',0)->orderBy('created_at','DESC')->skip($skip)->take($take)->get();
        return view('home.content_news_ajax',compact('modnews_cat','modnew'));  
    }
    public function loadmore_news_in_list(Request $rq){
        $listid = $rq->listid;
        $skip = $rq->skip;
        $take = $rq->take;
        $listnew = ListNew::where('id',$listid)->first();
        $listnews_cat = News::where('idlistnew',$listid)->where('status','<>',0)->orderBy('created_at','DESC')->skip($skip)->take($take)->get();
        return view('home.content_news_ajax_list',compact('listnews_cat','listnew'));
    }

}
