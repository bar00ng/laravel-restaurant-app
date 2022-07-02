<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::get();
        $row = Order::get();

        return view('admin.ListOrder',[
            'orders' => $orders, 
            'rows' => $row->count()
        ]);
    }

    public function update($id){
        $order = Order::where('id', $id)->first();

        if($order->isActive == 1) {
            Order::where('id', $id)->update([
                'isActive' => 0
            ]);
        } elseif ($order->isActive == 0) {
            Order::where('id', $id)->update([
                'isActive' => 1
            ]);
        }

        return redirect('listOrder')->with('Message','Status berhasil diubah');
    }

    public function delete($id){
        Order::where('id', $id)->delete();

        return redirect('listOrder')->with('Message','Order berhasil dihapus');
    }
}
