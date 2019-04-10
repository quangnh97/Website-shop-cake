<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Illuminate\Http\Request;
use Session;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
         //print_r($slide);
         // dd($slide);
         // exit;
      //  $new_product = Product::where('new',1)->get();
        $new_product = Product::where('new',1)->paginate(4); // phan trang
        $sp_km = Product::where('promotion_price','<>',0)->paginate(8);
        //dd($new_product);

        //return view('page.trangchu',['slilde' => $slide]);
        return view('page.trangchu', compact('slide','new_product','sp_km'));
    }

  public function getProduct($type){
       $lsp = ProductType::all();
       $loai_sp = ProductType::where('id',$type)->first();
       $sp_theoloai = Product::where('id_type', $type)->get();
       $sp_khac = Product::where('id_type','<>', $type)->paginate(3);
        return view('page.loai_sanpham', compact('sp_theoloai','sp_khac','lsp','loai_sp'));
        // compact : truyền biến lấy được qua view
    }

    public function getProductDetail(Request $req){
      $sanpham = Product::where('id', $req->id)->first();
      $relatedProduct = Product::where('id_type',$sanpham->id_type)->paginate(6);
      $product = Product::limit(4)->get();
      return view('page.chitiet_sanpham', compact('sanpham','relatedProduct','product'));
    }

    public function getIntroduce(){
      return view('page.introduce');
    }

    public function getContacts(){
      return view('page.contacts');
    }

    public function getAddtoCart(Request $req ,$id){
      $product = Product::find($id);
      $oldCart = Session('cart')?Session::get('cart'):null;
      $cart = new Cart($oldCart);
      $cart->add($product, $id);
      $req->session()->put('cart', $cart);
      return redirect()->back();
    }
}
