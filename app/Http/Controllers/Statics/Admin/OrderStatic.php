<?php


namespace App\Http\Controllers\Statics\Admin;

use App\Events\PriceList;
use App\Http\Controllers\Core\Services\PriceServices;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class OrderStatic extends Controller
{
    public function order_list()
    {
        $data = ['orders' => Order::All()];
        return view('Admin.Orders.index', $data);
    }
    public function delete()
    {
    }
    public function change_order_status($id)
    {
    }
}
