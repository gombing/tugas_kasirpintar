<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

            $product = Product::paginate(10);
            return view('admin.product.index',[
                'product'=>$product
            ]);

    }
    public function create(){
        if(auth()->user()->role == 1){
            return view('admin.product.create');
        } else {

        }
    }
    public function delete($id){
        if(auth()->user()->role == 1){
            $product = Product::find($id);

            if($product->delete()){
                return redirect()->back()->with([
                    'type'=>'info',
                    'message'=>'Product has ben delete'
                ]);
            } else {
                return view('404');
            }
        } else {
            return redirect()->to('/');
        }
    }
    public function store(Request $request){
        $request->validate([
            'code'=>'required|string',
            'name'=>'required|string',
            'stock'=>'required|integer',
            'sell_price'=>'required|integer',
            'buy_price'=>'required|integer'
        ]);

        $produk = new Product();
        $produk->name = $request->name;
        $produk->code = $request->code;
        $produk->stock = $request->stock;
        $produk->sell_price = $request->sell_price;
        $produk->buy_price = $request->buy_price;
        $produk->save();

        return redirect()->back()->with([
            'type'=>'info',
            'message'=>'Product has been added'
        ]);

    }
    public function updateName(Request $request){
        $request->validate([
            'name'=>'required|String'
        ]);
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->save();
        return redirect()->back()->with([
            'type'=>'info',
            'message'=>'Product name has ben updated'
        ]);
    }
    public function updateStock(Request $request){
        $request->validate([
            'stock'=>'required|integer'
        ]);
        $product = Product::find($request->id);
        $product->stock = $request->stock;
        $product->save();
        return redirect()->back()->with([
            'type'=>'info',
            'message'=>'Stock has ben updated'
        ]);
    }
    public function updateSellPrice(Request $request){
        $request->validate([
            'sell_price'=>'required|integer'
        ]);
        $product = Product::find($request->id);
        $product->sell_price = $request->sell_price;
        $product->save();
        return redirect()->back()->with([
            'type'=>'info',
            'message'=>'Sell Price has ben updated'
        ]);
    }
    public function updateBuyPrice(Request $request){
        $request->validate([
            'buy_price'=>'required|integer'
        ]);
        $product = Product::find($request->id);
        $product->buy_price = $request->buy_price;
        $product->save();
        return redirect()->back()->with([
            'type'=>'info',
            'message'=>'Buy Price has ben updated'
        ]);
    }
}
