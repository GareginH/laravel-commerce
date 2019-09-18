<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $itemsSold = Order::sum('quantity');
        $total = 0;
        $orders = Order::all();
        $customers = User::count();
        foreach ($orders as $key => $value) {
            $total+=$value->price * $value->quantity;
        }
        return view('admin.index', compact('total', 'itemsSold', 'customers'));
    }
}
