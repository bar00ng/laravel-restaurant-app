<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart() {
        return view('Cart');
    }

    public function addToCart($id){
        $product = Products::findOrFail($id);

        $cart = session()->get('cart',[]);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price
            ];
        }

        session()->put('cart',$cart);
        return redirect('')->with('Message', 'Berhasil dimasukkan ke Cart');
    }

    public function update(Request $r) {
        if($r->id && $r->quantity){
            $cart = session()->get('cart');

            $cart[$r->id]["quantity"] = $r->quantity;
            session()->put('cart',$cart);
            session()->flash('Message', 'Berhasil diubah');
        }
    }

    public function remove(Request $r) {
        if($r->id) {
            $cart = session()->get('cart');
            if(isset($cart[$r->id])) {
                unset($cart[$r->id]);
                session()->put('cart', $cart);
            }
            session()->flash('Message', 'Berhasil dihapus');
        }
    }

    public function storeCart(Request $r){
        $cart = session()->get('cart');
        if($r->filled('customer_name')) {
            $name = $r->customer_name;
        } else {
            $name = 'guest';
        };

        Order::create([
            'name' => $name,
            'data' => $cart
        ]);

        $r->session()->forget('cart');
        return redirect('')->with('Message', 'Berhasil memesan');
    }
}
