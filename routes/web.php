<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Models\Business;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Table;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\Facade as PDF;
// use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
})->name('home');


Auth::routes(['register' => false]);



Route::get('/menu/{slug}', function ($slug) {

    $business = Business::where('slug', $slug)->first();
    // $categories = Category::where('business_id', $business->id)->with('products.garnishes')->orderBy('cat_order', 'asc')->get();
    $categories = Category::where('business_id', $business->id)->with(['products' => function ($query) {$query->orderBy('product_order', 'asc');}, 'products.garnishes'])->orderBy('cat_order', 'asc')->get();

    return view('menu_2', ['business' => $business, 'categories' => $categories]);
})->name('menu');

Route::get('/menu_1/{slug}', function ($slug) {
    $business = Business::where('slug', $slug)->first();
    $categories = Category::where('business_id', $business->id)->with(['products' => function ($query) {$query->orderBy('product_order', 'asc');}, 'products.garnishes'])->orderBy('cat_order', 'asc')->get();
    return view('menu_1', ['business' => $business, 'categories' => $categories]);
})->name('menu_1');

Route::get('/menu_2/{slug}', function ($slug) {
    $business = Business::where('slug', $slug)->first();
    // $categories = Category::where('business_id', $business->id)->with('products.garnishes')->orderBy('cat_order', 'asc')->get();
    $categories = Category::where('business_id', $business->id)->with(['products' => function ($query) {$query->orderBy('product_order', 'asc');}, 'products.garnishes'])->orderBy('cat_order', 'asc')->get();
    return view('menu_2', ['business' => $business, 'categories' => $categories]);
})->name('menu_2');

Route::get('qr-generator/{slug}', function ($slug) {
    return view('qrGenerator', ['slug' => $slug]);
})->name('qr-generator');


Route::get('table-qr-generator/{id}', function ($id) {
    $business = Business::where('id', $id)->first();
    $tables = Table::where('business_id', $business->id)->get();
    return view('TableQrGenerator', ['slug' => $business->slug, 'tables' => $tables]);
})->name('table-qr-generator');




Route::group(['middleware' => ['auth']], function () {

    // take away button post
    Route::post('pos/take-away', function () {
        $user = Auth::user();
        $business = $user->businesses()->with("categories.products.garnishes")->first();
         if($business->id != 9 && $business->id != 12 ){ return view('pos.subscription_end'); }
        return view('pos.take-away', ["business" => $business]);
    })->name('pos/take-away');
    // end take away post


    // take away by http-link get
    Route::get('pos/take-away', function () {
        $user = Auth::user();
        $business = $user->businesses()->with("categories.products.garnishes")->first();
         if($business->id != 9 && $business->id != 12 ){ return view('pos.subscription_end'); }
        return view('pos.take-away', ["business" => $business]);
    })->name('pos/take-away');
    // end take away get

    // end of day calculation button
    Route::post('end-of-day', function (Request $request) {
        $business = DB::table('buisness_user')->where('user_id', Auth::user()->id)->first();
        $business_id = $business->business_id;
        $today = Order::select('created_at')->where('business_id', $business_id)->whereNull('day')->first();
        $day = $today->created_at->format('Y/m/d');
        $affected = DB::table('orders')->where('business_id', $business_id)->whereNull('day')->update(array('day' => $day));
        if ($affected) {
            return response()->json(['success' => 'successfully added']);
        } else {
            return response()->json(['error' => 'day not added']);
        }
    })->name('end-of-day');
    // end


    // end of day route button
    Route::post('pos/end-of-day', function (Request $request) {
        $buisness_id = $request->business_id;
        $total_price = Order::where('business_id', $buisness_id)->whereNull('day')->sum('total');
        $total_cost = Order::where('business_id', $buisness_id)->whereNull('day')->sum('cost');
        $profit = $total_price - $total_cost;
        $total_orders = Order::where('business_id', $buisness_id)->whereNull('day')->count();
        $all_products = Product::where('business_id', $buisness_id)->withSum('orders', 'order_product.qty')->get();
        // foreach ($all_products as $item) {
        //     $product = $item->products->count();

        //     echo $product;
        //     echo "  -   ";
        // }
        // return $all_products;
        $array = [];
        foreach($all_products as $product){
            $array = Arr::add($array, $product->name, $product->orders_sum_order_productqty);
        }
        
        // return $array;

        if ($total_orders == 0) {
            return Redirect::back()->withErrors(['msg' => 'there are no orders']);
        } else {
            $today = Order::select('created_at')->whereNull('day')->where('business_id', $buisness_id)->first();
            $day = $today->created_at->format('d/m/Y');
            return view('pos.end-of-day', ['day' => $day, 'total_price' => $total_price, 'total_orders' => $total_orders, 'currency' => $request->business_currency, 'buisness_id' => $buisness_id, 'profit' => $profit, 'products' => $array]);
        }
    })->name('pos/end-of-day');
    // end


    // table button post for waiter
    Route::post('pos/waiter', function () {
        $user = Auth::user();
        $business = $user->businesses()->first();
         if($business->id != 9 && $business->id != 12 ){ return view('pos.subscription_end'); }
        $tables = Table::where('business_id', $business->id)->get();
        return view('pos.waiter', ["business" => $business, "tables" => $tables]);
    })->name('pos/waiter');
    // end table waiter post

    // table http-link get for waiter
    Route::get('pos/waiter', function () {
        $user = Auth::user();
        $business = $user->businesses()->first();
         if($business->id != 9 && $business->id != 12 ){ return view('pos.subscription_end'); }
        $tables = Table::where('business_id', $business->id)->get();
        return view('pos.waiter', ["business" => $business, "tables" => $tables]);
    })->name('pos/waiter');
    // end table waiter get

    // each table link for waiter
    Route::get('pos/table/{id}', function ($id) {
        $user = Auth::user();
        $business = $user->businesses()->with("categories.products.garnishes")->first();
         if($business->id != 9 && $business->id != 12 ){ return view('pos.subscription_end'); }
        $order = Order::where(['business_id' => $business->id, 'table_id' => $id, 'status' => "Pending"])->with('orderProducts')->first();
        return view('pos.waiter_table', ["business" => $business, "order" => $order, "table_id" => $id]);
    })->name('pos_table');
    // end waiter table link



    // table button for cashier
    Route::post('pos/table', function () {
        $user = Auth::user();
        $business = $user->businesses()->first();
         if($business->id != 9 && $business->id != 12 ){ return view('pos.subscription_end'); }
        $tables = Table::where('business_id', $business->id)->get();
        return view('pos.tables', ["business" => $business, "tables" => $tables]);
    })->name('pos/table');
    // end cashier table button

    // each table link for cashier
    Route::get('pos/cashier_table/{id}', function ($id) {
        $user = Auth::user();
        $business = $user->businesses()->with("categories.products.garnishes")->first();
         if($business->id != 9 && $business->id != 12 ){ return view('pos.subscription_end'); }
        $order = Order::where(['business_id' => $business->id, 'table_id' => $id, 'status' => "Pending"])->with('orderProducts')->first();
        return view('pos.cashier_table', ["business" => $business, "order" => $order, "table_id" => $id]);
    })->name('pos_cashier_table');
    // end cashier table link

    // delivery button
    Route::post('pos/delivery', function () {

        $user = Auth::user();
        if ($user) {
            $business = $user->businesses()->with("categories.products.garnishes")->first();
 if($business->id != 9 && $business->id != 12 ){ return view('pos.subscription_end'); }
            return view('pos.delivery', ["business" => $business]);
        } else {
            return view('auth.login');
        }
    })->name('pos/delivery');
    // end delivery button

    // delivery by http-link get
    Route::get('pos/delivery', function () {

        $user = Auth::user();
        $business = $user->businesses()->with("categories.products.garnishes")->first();
 if($business->id != 9 && $business->id != 12 ){ return view('pos.subscription_end'); }
        return view('pos.delivery', ["business" => $business]);
    })->name('pos/delivery');
    // end take away get


    // printed route
    Route::post('printed', function (Request $request) {
        $print_type = $request->printed;

        Order::where('id', $request->order_id)->update(['printed' => $print_type]);

        return "success";
    })->name('printed');
    // end printed route

    Route::post('test', function (Request $request) {

        $order_id = $request->data[0]['order_id'];
        $buisness_id = $request->data[0]['business_id'];
        $total = $request->data[0]['total'];
        $discount_option = $request->data[0]['discount_option'];
        $discount = $request->data[0]['discount_amount'];
    
        if ($order_id == 'New') {
    
            $all = $request->data[0];
            $order = Order::create([
                'business_id' => $all["business_id"],
                'order_no' => $all["order_no"],
                'discount' => $all["discount_amount"],
                'discount_option' => $all["discount_option"],
                'type' => 'table',
                'table_id' => $all["table_id"],
                'status' => 'Pending',
                'total' => $all["total"],
                // 'created_at' => $all["updated_at"],
            ]);
    
            foreach ($all['products'] as $product) {
    
                if (isset($product["garnishes"])) {
                    $garnishe = $product["garnishes"];
                } else {
                    $garnishe = null;
                }
    
                OrderProduct::create([
                    "order_id" => $order->id,
                    'business_id' => $all["business_id"],
                    "product_name" => $product["name"],
                    "product_id" => $product["product_id"],
                    "qty" => $product["qty"],
                    "garnishes" => $garnishe,
                    "product_price" => $product["price"],
                    "cost" => $product["cost"],
                    "notes" => $product["note"],
                ]);
            }
        } else {
            foreach ($request->data[0]['products'] as $product) {
    
                if ($product['process'] == 'Edited') {
                    OrderProduct::where('id', $product['order_porduct_id'])->update(['qty' => $product['qty'], 'garnishes' => $product['garnishes']]);
                    //Order::where('id', $order_id)->update(['updated_at' => $request->data[0]['updated_at']]);
                }
                if ($product['process'] == 'Deleted') {
                    OrderProduct::where('id', $product['order_porduct_id'])->delete();
                }
                if ($product['process'] == 'New') {
                    if (isset($product['garnishes'])) {
                        $garnishe = $product['garnishes'];
                    } else {
                        $garnishe = null;
                    }
    
                    OrderProduct::create([
                        "order_id" => $order_id,
                        "business_id" => $buisness_id,
                        "product_name" => $product['name'],
                        "product_id" => $product['product_id'],
                        "qty" => $product['qty'],
                        "garnishes" => $garnishe,
                        "product_price" => $product['price'],
                        "cost" => $product["cost"],
                        "notes" => $product['note'],
                    ]);
                }
            }
    
            Order::where('id', $order_id)->update(['total' => $total, 'discount_option'=> $discount_option, 'discount'=>$discount]);
        }
        return;
    })->name('test');
    // end submit button
});



// submit button for waiter




Route::post('test1', function (Request $request) {

    return $request;
})->name('test1');



    Route::get('sub-end', function () {

       
        return view('pos.subscription_end');
    })->name('subscription_end');





    Route::post('/qerexe-games', function (Request $request) {
        $game_id = $request->input('game_id');
        if($game_id == 1){
            return view('qrexe_cube_ninja');
        }
        else if($game_id == 2){
            return view('qrexe_memory');
        }
        else if($game_id == 3){
            return view('qrexe_floopy_bird');
        }
        
})->name('qrexe_game');