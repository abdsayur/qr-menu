<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->data;
        // return $all;

        for ($i = 0; $i < count($all); $i++) {

            $cost = 0;
            $order = Order::create([
                'business_id' => $all[$i]["business_id"],
                'type' => 'take-away',
                'discount' => $all[$i]["discount_amount"],
                'discount_option' => $all[$i]["discount_option"],
                'status' => 'done',
                'total' => $all[$i]["total"],
                'order_no' => $all[$i]["order_no"],
                'printed' => 'yes',
                'created_at' => $all[$i]["created_at"],

            ]);
            for ($j = 0; $j < count($all[$i]["products"]); $j++) {

                if (isset($all[$i]["products"][$j]["cost"])) {
                    $cost = $cost + ($all[$i]["products"][$j]["cost"] * $all[$i]["products"][$j]["qty"]);
                }
                if (isset($all[$i]["products"][$j]["garnishes"])) {
                    $garnishe = $all[$i]["products"][$j]["garnishes"];
                    foreach($garnishe as $gar){
                        $cost = $cost + ($gar['cost'] * $all[$i]["products"][$j]["qty"]);
                    }
                } else {
                    $garnishe = null;
                }
                
                OrderProduct::create([
                    "order_id" => $order->id,
                    'business_id' => $all[$i]["business_id"],
                    "product_name" => $all[$i]["products"][$j]["name"],
                    "product_id" => $all[$i]["products"][$j]["product_id"],
                    "qty" => $all[$i]["products"][$j]["qty"],
                    "garnishes" => $garnishe,
                    "product_price" => $all[$i]["products"][$j]["price"],
                    "notes" => $all[$i]["products"][$j]["note"],
                ]);
            }

            // hoon #m zid l cost
            Order::where('id', $order->id)->update(['cost' => $cost]);

            // $order = new Order();
            // $order->business_id = $arr->business_id;
            // $order->employee_id = $arr->employee_id;
            // // $order->client_name = $arr->name;
            // // $order->client_phone = $arr->phone;
            // // $order->client_address = $arr->address;
            // // $order->delivery_charge = $arr->delivery_charge;
            // $order->type = $arr->type;
            // $order->discount = $arr->discount;
            // $order->total = $arr->total;

            // foreach($arr->products as $product){
            //     $order_product = new OrderProduct();
            //     $order_product->order_id = $order->id;
            //     $order_product->product_id = $product->product_id;
            //     $order_product->qty = $product->qty;
            //     $order_product->price = $product->price;
            //     $order_product->notes = $product->notes;
            //     $order_product->save();
            // }
            // $order->save();
        }

        // // $order::create([
        // // 	'Name' =>$request->name
        // // ]);
        return response()->json(['success' => 'Order is successfully added']);
    }



    public function tablestore(Request $request)
    {
        $order_id = $request->data[0]['order_id'];
        $buisness_id = $request->data[0]['business_id'];
        $total = $request->data[0]['total'];
        $discount_option = $request->data[0]['discount_option'];
        $discount = $request->data[0]['discount_amount'];
        $order_no = $request->data[0]['order_no'];
        $cost = 0;


        if ($order_id == 'New') {
            $all = $request->data[0];
            // return $all["discount_option"];
            $order = Order::create([
                'business_id' => $all["business_id"],
                'type' => 'table',
                'table_id' => $all["table_id"],
                'discount_option' => $all["discount_option"],
                'discount' => $all["discount_amount"],
                'status' => 'done',
                'total' => $all["total"],
                'printed' => 'yes',
                'order_no' => $all['order_no'],
                'created_at' => $all["updated_at"],
                // 'cost' =>'132',
            ]);
            foreach ($all['products'] as $product) {

                if (isset($product["cost"])) {
                    $cost = $cost + ($product["cost"] * $product["qty"]);
                    // return $cost;
                }

                if (isset($product["garnishes"])) {
                    $garnishe = $product["garnishes"];
                    foreach($garnishe as $gar){
                        $cost = $cost + ($gar['cost'] * $product["qty"]);
                        return $cost;
                    }
                    
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
                    "notes" => $product["note"],
                ]);
                
            }
            $check =Order::where('id', $order->id)->update(['cost'=>$cost]);

        } else {
            foreach ($request->data[0]['products'] as $product) {

                if ($product['process'] == 'Edited') {
                    if (isset($product["cost"])) {
                        $cost = $cost + ($product["cost"] * $product["qty"]);
                    }
    
                    if (isset($product["garnishes"])) {
                        $garnishe = $product["garnishes"];
                        foreach($garnishe as $gar){
                            $cost = $cost + ($gar['cost'] * $product["qty"]);
                        }
                    } else {
                        $garnishe = null;
                    }
                    OrderProduct::where('id', $product['order_porduct_id'])->update(['qty' => $product['qty'], 'garnishes' => $garnishe]);
                }
                if ($product['process'] == 'Deleted') {
                    OrderProduct::where('id', $product['order_porduct_id'])->delete();
                }
                if ($product['process'] == 'New') {
                    if (isset($product["cost"])) {
                        $cost = $cost + ($product["cost"] * $product["qty"]);
                    }
    
                    if (isset($product["garnishes"])) {
                        $garnishe = $product["garnishes"];
                        foreach($garnishe as $gar){
                            $cost = $cost + ($gar['cost'] * $product["qty"]);
                        }
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
                        "notes" => $product['note'],
                    ]);
                }
                if($product['process'] == 'old') {
                    if (isset($product["cost"])) {
                        $cost = $cost + ($product["cost"] * $product["qty"]);
                    }
    
                    if (isset($product["garnishes"])) {
                        $garnishe = $product["garnishes"];
                        foreach($garnishe as $gar){
                            $cost = $cost + ($gar['cost'] * $product["qty"]);
                        }
                    } else {
                        $garnishe = null;
                    }
                }
            }

            Order::where('id', $order_id)->update(['total' => $total, 'status' => 'done', 'discount_option'=> $discount_option, 'discount'=>$discount,'order_no'=>$order_no, 'cost'=>$cost]);
        }
        
        return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deliveryStore(Request $request)
    {
        $all = $request->data;

        for ($i = 0; $i < count($all); $i++) {

            $cost = 0;

            $order = Order::create([
                'business_id' => $all[$i]["business_id"],
                'type' => 'delivery',
                'discount' => $all[$i]["discount_amount"],
                'discount_option' => $all[$i]["discount_option"],
                'status' => 'done',
                'total' => $all[$i]["total"],
                'client_name' => $all[$i]["client_name"],
                'client_phone' => $all[$i]["client_phone"],
                'client_address' => $all[$i]["client_address"],
                'delivery_charge' => $all[$i]["delivery_charge"],
                'printed' => 'yes',
                'order_no' => $all[$i]["order_no"],
                'created_at' => $all[$i]["created_at"],

            ]);
            for ($j = 0; $j < count($all[$i]["products"]); $j++) {
                if (isset($all[$i]["products"][$j]["cost"])) {
                    $cost = $cost + ($all[$i]["products"][$j]["cost"] * $all[$i]["products"][$j]["qty"]);
                }
                if (isset($all[$i]["products"][$j]["garnishes"])) {
                    $garnishe = $all[$i]["products"][$j]["garnishes"];
                    foreach($garnishe as $gar){
                        $cost = $cost + ($gar['cost'] * $all[$i]["products"][$j]["qty"]);
                    }
                } else {
                    $garnishe = null;
                }
                OrderProduct::create([
                    "order_id" => $order->id,
                    'business_id' => $all[$i]["business_id"],
                    "product_name" => $all[$i]["products"][$j]["name"],
                    "product_id" => $all[$i]["products"][$j]["product_id"],
                    "qty" => $all[$i]["products"][$j]["qty"],
                    "garnishes" => $garnishe,
                    "product_price" => $all[$i]["products"][$j]["price"],
                    "notes" => $all[$i]["products"][$j]["note"],
                ]);
            }
            // hoon 3m zid l cost
            Order::where('id', $order->id)->update(['cost' => $cost]);
        }
        return response()->json(['success' => 'Order is successfully added']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
