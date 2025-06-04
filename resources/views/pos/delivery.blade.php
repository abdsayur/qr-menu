@extends('pos.pos')

@section('main')
    <div class="w-full mt-8 sm:flex-none md:flex">
        <div class="w-full py-2 px-2 none-selectable-text sm:w-full md:h-auto inline-block md:w-4/6 ">
            <div class="grid grid-cols-2 gap-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 p-2 font-semibold md:text-center text-slate-600 text-sm bg-slate-100 rounded-lg">
                @foreach ($business->categories as $category)

                    @if ($loop->first)
                        <div class="w-full cursor-pointer text-center bg-slate-300 rounded-lg md:px-2 py-6 hover:bg-slate-500 hover:text-white tablinks active"
                            id="{{ $category->id }}" unselectable="on">
                            {{ $category->name }}
                        </div>
                    @else
                        @if(count($category->products)>0)
                            <div class="w-full cursor-pointer text-center bg-slate-300 rounded-lg sm:w-full md:px-2 py-6 hover:bg-slate-500 hover:text-white tablinks"
                                id="{{ $category->id }}" unselectable="on">
                                {{ $category->name }}
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            <div class="bg-slate-100 mt-4 rounded-lg">
                @foreach ($business->categories as $category)
                    @if ($loop->first)
                        <div class="active tabcontent grid grid-cols-2 sm:gap-1 md:w-full p-2 text-white text-2xl md:grid-cols-4 lg:grid lg:grid-cols-5 gap-1"id="category{{ $category->id }}">
                            @foreach ($category->products as $product)
                                <div class="item-btn px-1 py-[15%] text-center justify-items-center cursor-pointer bg-green-500 shadow-md text-lg rounded-lg"
                                    id="ptoduct-id-{{ $product->id }}" d-name="{{ $product->name }}" d-product-id="{{ $product->id }}" d-price="{{ $product->price }}" d-cost="{{ $product->cost }}"
                                    @if (!$product->garnishes->isEmpty()) d-garnish="true" d-cat-id="{{ $category->id }}" @else d-garnish="false" @endif unselectable="on">
                                    <div style="height: 50px; white-space: normal; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{{ $product->name }}</div>
                                    <div class="mt5 b cb60">{{$product->price}} {{$business->currency}}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="tabcontent grid grid-cols-2 sm:gap-1 md:w-full  p-2 text-white  text-2xl bg-slate-200 md:grid-cols-4 lg:grid lg:grid-cols-5 gap-1"
                            id="category{{ $category->id }}">
                            @foreach ($category->products as $product)
                                <div class="item-btn px-1 py-[15%] text-center justify-items-center cursor-pointer bg-green-500 shadow-md text-lg rounded-lg"
                                    id="ptoduct-id-{{ $product->id }}" d-name="{{ $product->name }}" d-cost="{{ $product->cost }}"
                                    d-product-id="{{ $product->id }}" d-price="{{ $product->price }}"
                                    @if (!$product->garnishes->isEmpty()) d-garnish="true" d-cat-id="{{ $category->id }}" @else d-garnish="false" @endif
                                    unselectable="on">
                                    <div style="height: 50px; white-space: normal; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">{{ $product->name }}</div>
                                    <div class="mt5 b cb60">{{$product->price}} {{$business->currency}}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="sm:w-full py-2 px-2 sm:order-2 md:w-2/6 md:inline-block" id="priceTable">

            <div class="w-full bg-slate-100 p-2 rounded-lg">
                <div class="client-info text-left text-lg cursor-pointer">
                    <span class="mdi mdi-account"></span>
                    <span> Client Info</span>
                    <span class="mdi mdi-pencil float-right"></span>
                </div>
                <div id="checkOutList" class="text-sm overscroll-y-auto overflow-y-auto bg-black-800 px-2"style="height: 400px;"></div>
                <div class="w-[95%] mx-2.5 mt-[2%] mb-0">
                    <div>
                        <div class="text-lg text-left text-red-700 font-bold text-left md:text-lg lg:text-xl">Discount :</div>
                        <div class="flex mt-2 text-lg items-center gap-x-1">
                            <input class="w-1/3 text-left py-1 px-1 lg:py-2 lg:px-1 enabled:border enabled:border-green-500 rounded-md" onselect="return false"; oncopy="return false"; oncut="return false"; type="number" disabled id="discount_input" onkeyup="calculate_discoount()" placeholder="0">
                            <div class="flex w-1/3 gap-x-1 items-center">
                                <div class="bg-slate-200 active grow rounded-md cursor-pointer hover:shadow-inner hover:bg-slate-600 hover:text-white discount-option-btn py-1 px-1 lg:py-2 lg:px-1 percentage-btn">%</div>
                                <div class="bg-slate-200 grow rounded-md cursor-pointer hover:shadow-inner hover:bg-slate-600 hover:text-white discount-option-btn py-1 px-1 lg:py-2 lg:px-1 fixed-btn">Fixed</div>
                            </div>
                            <div class="w-1/3 text-slate-800  text-right discounted_div font-semibold py-1 px-1 lg:py-2 lg:px-1  ">
                                    0  {{ $business->currency }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex">
                        <div class="w-1/2 py-1 px-1  text-xl text-sky-700 font-bold text-left lg:py-2 lg:px-1">Total :</div>
                        <div class="w-1/2 text-slate-800 py-1 px-1  text-lg text-right font-semibold lg:py-2 lg:px-1" id="totalPrice">0 {{ $business->currency }}</div>
                    </div>
                    <div class="w-full grid grid-cols-3 gap-1 mt-2">
                        <div class="w-full checkout-btn py-3 px-1 cursor-pointer bg-green-700 text-white text-base lg:text-lg xl:text-xl text-center rounded-lg hover:shadow-md hover:bg-green-600 ">
                            CheckOut
                        </div>
                        {{-- <div class="w-full print-btn py-3 px-1 cursor-pointer bg-sky-700 text-white text-base lg:text-lg xl:text-xl text-center rounded-lg hover:shadow-md hover:bg-sky-600 ">
                            Print
                        </div> --}}
                        <div class="w-full py-3 px-1 clear-btn cursor-pointer bg-red-700 text-white text-base lg:text-lg xl:text-xl text-center rounded-lg hover:shadow-md hover:bg-red-600 ">
                            Cancel
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-delivery-info-div fixed inset-0" style="background-color:rgba(0,0,0,0.4)">
        <div class="absolute p-4 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-full flex justify-center">
            <div class="rounded-md bg-slate-200 p-5  w-full md:w-3/4 lg:w-1/2">
                <div class="text-right"><span class="close-modal-delivery-info pointer">&times;</span></div>
                <div class="modal-objects">
                    <div class="delivery-info text-left">
                        <div class="mt-4 font-bold">Client Name :</div>
                        <input class="w-full mt-2 py-1 px-1 lg:py-2 lg:px-1" type="text" id="client_name_input" placeholder="Client Name">
                        <div class="mt-4 font-bold">Client phone :</div>
                        <input class="w-full mt-2 py-1 px-1 lg:py-2 lg:px-1" type="tel" id="client_phone_input" placeholder="Client phone">
                        <div class="mt-4 font-bold">Client Address :</div>
                        <input class="w-full mt-2 py-1 px-1 lg:py-2 lg:px-1" type="text" id="client_address_input" placeholder="Client Address">
                        <div class="mt-4 font-bold">Delivery Charge :</div>
                        <input class="w-full mt-2 py-1 px-1 lg:py-2 lg:px-1" type="number" id="delivery_charge_input" value="0" placeholder="Delivery Charge">
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button class="py-1 px-4 delivery-info-cancel cursor-pointer text-white text-base lg:text-lg text-center rounded-lg hover:shadow-md bg-red-700 hover:bg-red-600">Cancel</button>
                        <button class="py-1 px-4 delivery-info-save cursor-pointer text-white text-base lg:text-lg text-center rounded-lg hover:shadow-md bg-green-700 hover:bg-green-600">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-item-div fixed inset-0 hidden" style="background-color:rgba(0,0,0,0.4)">
        <div class="absolute p-4 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-full flex justify-center">
            <div class="rounded-md bg-slate-200 p-5  w-full md:w-3/4 lg:w-1/2">
                <div class="text-right"><span class="close-modal pointer">&times;</span></div>
                <div class="modal-objects">
                    <input type="hidden" name="" id="product-index" value="">
                    {{-- <div class="flex items-center gap-2">
                        <div id="modal-price" class="">Price:</div>
                        <input id="modal-price-input" title="please enter number only" type="number" value="" required />
                    </div> --}}
                    <div class="mt-4 modal-garnish flex flex-wrap gap-2"></div>
                    <div class="mt-4 text-left">
                        <div class="text-bold">Note:</div>
                        <div class="mt-1">
                            <textarea id="modal-note-input" class="w-full"style="resize:none;" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button class="py-1 px-4 edit-cancel cursor-pointer text-white text-base lg:text-lg text-center rounded-lg hover:shadow-md bg-red-700 hover:bg-red-600">Cancel</button>
                        <button class="py-1 px-4 edit-save cursor-pointer text-white text-base lg:text-lg text-center rounded-lg hover:shadow-md bg-green-700 hover:bg-green-600">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="printdiv" class=" ph20"></div>
    <script>
        var currency = <?php echo json_encode($business->currency); ?>;
        var categories = <?php echo json_encode($business->categories); ?>;
        var employee_id = <?php echo json_encode(auth()->user()->id); ?>;
        var order_no=<?php echo json_encode($business->id); ?>;
        var client_name = "";
        var client_phone = "";
        var client_address = "";
        var delivery_charge = "";
        var total = 0;
        var counter=0;
        var old_total = 0;
        var discount_option="percentage";
        var orders = [];
        var orderlist = [];
        var all_orders = [];
        let added_garnishes=[];
        var garnishes = [];
        var timer;
        var discount_amount=0;
        var html_print="";
        var order_date= new Date();
        var order_date = order_date.getHours() + "" + order_date.getMinutes() + "" + order_date.getSeconds();
        order_no=order_no+""+order_date;

        var tabLinks = document.querySelectorAll(".tablinks");
        var tabContent = document.querySelectorAll(".tabcontent");
        tabLinks.forEach(function(el) {
            el.addEventListener("click", openTabs);
        });
        var order_date= new Date();
        function openTabs(el) {
            var btnTarget = el.currentTarget;
            tabContent.forEach(function(el) {
                el.classList.remove("active");
            });
            tabLinks.forEach(function(el) {
                el.classList.remove("active");
            });
            id = btnTarget.id
            document.getElementById("category" + id).classList.add('active');
            btnTarget.classList.add("active");
        }
        $('.delivery-info-save').click(function() {
            client_name=$("#client_name_input").val();
            client_phone=$("#client_phone_input").val();
            client_address=$("#client_address_input").val();
            delivery_charge=$("#delivery_charge_input").val();
            if(delivery_charge==""){
                $("#delivery_charge_input").val(0);
                delivery_charge=0;

            }
            if(client_name!="" && client_phone!="" && client_address!="" && delivery_charge!=""){
                $('.modal-delivery-info-div').addClass('hidden');
            }
            else{
                alert("The client data must be filled");
            }

        });
        $('.close-modal-delivery-info').click(function() {
            $("#client_name_input").val("");
            $("#client_phone_input").val("");
            $("#client_address_input").val("");
            $("#delivery_charge_input").val("");
            $('.modal-delivery-info-div').addClass('hidden');
        });

        $('.delivery-info-cancel').click(function(){
            $("#client_name_input").val("");
            $("#client_phone_input").val("");
            $("#client_address_input").val("");
            $("#delivery_charge_input").val("");
            $('.modal-delivery-info-div').addClass('hidden');
        });
        $('.edit-save').click(function() {
            var order_index = $('#product-index').attr('value');
            // orderlist[order_index].price = price;
            if ($("#modal-note-input").val() !== "") {
                var note =$("#modal-note-input").val();
                orderlist[order_index].note = note;
            }
            orderlist[order_index].garnishes=added_garnishes;
            $("#modal-note-input").val("");
            var html = print_items(orderlist);
            $("#checkOutList").html(html);
            $('.modal-item-div').addClass('hidden');
            $('#totalPrice').html(total + " " + currency);
            direct_calculate_discoount();
        });
        $('.close-modal').click(function() {
            added_garnishes=[];
            garnishes=[];
            $('.modal-item-div').addClass('hidden');
        });
        $('.client-info').click(function(){
            $("#client_name_input").val(client_name);
            $("#client_phone_input").val(client_address);
            $("#client_address_input").val(client_phone);
            $("#delivery_charge_input").val(delivery_charge);
            $('.modal-delivery-info-div').removeClass('hidden');
        })
        $('.edit-cancel').click(function(){
            added_garnishes=[];
            garnishes=[];
            // var order_index = $('#product-index').attr('value');
            // orderlist[order_index].garnishes=new_var;
            $('.modal-item-div').addClass('hidden');
        });
        function edit_item(id, index,counter) {
            added_garnishes=[];
            $('.modal-item-div').removeClass('hidden');
            var itemid = "item-id-" + id+"-"+counter;
            var itemIndex = orderlist.findIndex((item => item.item_id == itemid));
            orderlist[itemIndex].garnishes.forEach(function(garnish, index) {
                added_garnishes.push(garnish);
            })
            var product_id = "#ptoduct-id-" + id;
            var price = orderlist[itemIndex].price;
            $('#modal-price-input').val(parseFloat(price));
            $('#product-index').attr('value', index);
            if(orderlist[itemIndex].note != ""){
                $("#modal-note-input").val(orderlist[itemIndex].note);
            }
            if ($(product_id).attr('d-garnish') == "true") {
                var cat_id = $(product_id).attr('d-cat-id');
                var cat_index = categories.findIndex((item => item.id == cat_id));
                var this_cat = categories[cat_index];
                var product_index = (this_cat.products).findIndex((item => item.id == id));
                var product = this_cat.products[product_index];
                garnishes = product.garnishes;
                var html = "";
                garnishes.forEach(function(item) {
                    garnish_index=added_garnishes.findIndex((garnish => garnish.id == item.id));
                    if(garnish_index>=0){
                        html +=
                        "<div class='w-fit py-1 active modal-garnish-item px-4 rounded-xl bg-slate-400 shadow-md cursor-pointer'id='garnish-" +
                        item['id'] + "' onClick='addGarnish(" + item['id'] + ")'>" + item['name'] + "</div>";
                    }
                    else{
                        html +=
                        "<div class='w-fit py-1 modal-garnish-item px-4 rounded-xl bg-slate-400 shadow-md cursor-pointer'id='garnish-" +
                        item['id'] + "' onClick='addGarnish(" + item['id'] + ")'>" + item['name'] + "</div>";
                    }
                });
                $('.modal-garnish').html(html);
            } else {
                $('.modal-garnish').html("");
            }
        }
        function addGarnish(garnish_id) {
            var x = document.getElementById('garnish-' + garnish_id);
            var this_Garnish=garnishes.findIndex((item => item.id == garnish_id));
            this_Garnish=garnishes[this_Garnish];
            if (x.classList.contains('active')) {
                var cost =this_Garnish.cost;
                if(cost==null || cost==undefined || cost==""){
                    cost=0;
                }
                x.classList.remove('active');
                var garnishes_index = added_garnishes.findIndex((item => item.id == garnish_id));
                added_garnishes.splice(garnishes_index, 1)
            }
            else{
                x.classList.add('active');
                var new_garnishe={
                    "id":this_Garnish.id,
                    "name":this_Garnish.name,
                    "price":this_Garnish.price,
                }
                added_garnishes.push(new_garnishe);
            }
        }
        function direct_calculate_discoount(){
            discount_amount=$('#discount_input').val();
            if(discount_amount==""){
                discount_amount=0;
            }
            discount_amount=parseFloat(discount_amount);
            discount_amount=discount_amount.toFixed(2);
            if(discount_option=="percentage"){
                if(discount_amount>=0 && discount_amount<=100){
                    var discount_fixed=(total*discount_amount/100);
                    var discounted_total=total-discount_fixed;
                    discount_fixed=discount_fixed.toFixed(2);
                    $('#totalPrice').html(discounted_total + " " + currency);
                    $('.discounted_div').html(discount_fixed + " " + currency);
                }
                else{
                    alert("please enter number between 0 and 100");
                    if(discount_amount>100){
                        $('#discount_input').val(100);
                        direct_calculate_discoount();
                    }
                    else{
                        $('#discount_input').val(0);
                        direct_calculate_discoount();
                    }
                }
            }
            else{
                if(discount_amount>=0 && discount_amount<=parseFloat(total)){
                    var discounted_total=total-discount_amount;
                    $('#totalPrice').html(discounted_total + " " + currency);
                    $('.discounted_div').html(discount_amount + " " + currency)
                }
                else{
                    alert("please enter number between 0 and "+total);
                    if(discount_amount>parseFloat(total)){
                        $('#discount_input').val(total);
                        calculate_discoount();
                    }
                    else{
                        $('#discount_input').val(0);
                        calculate_discoount();
                    }
                }
            }
        }
        function calculate_discoount(){
            clearTimeout(timer);
            timer=setTimeout(function validate(){
                discount_amount = $('#discount_input').val();
                console.log(discount_amount);
                if(discount_amount==""){
                    discount_amount=0;
                }
                discount_amount=parseFloat(discount_amount);
                if(discount_option=="percentage"){
                    if(discount_amount>=0 && discount_amount<=100){
                        var discount_fixed=(total*discount_amount/100);
                        var discounted_total=total-discount_fixed;
                        discounted_total=discounted_total.toFixed(2);
                        discount_fixed=discount_fixed.toFixed(2);
                        $('#totalPrice').html(discounted_total + " " + currency);
                        $('.discounted_div').html(discount_fixed + " " + currency);
                    }
                    else{
                        alert("please enter number between 0 and 100");
                        if(discount_amount>100){
                            $('#discount_input').val(100);
                            calculate_discoount();
                        }
                        else{
                            $('#discount_input').val(0);
                            calculate_discoount();
                        }
                    }
                }
                else{
                    if(discount_amount>=0 && discount_amount<=parseFloat(total)){
                        var discounted_total=total-discount_amount;
                        discounted_total=discounted_total.toFixed(2);
                        $('#totalPrice').html(discounted_total + " " + currency);
                        $('.discounted_div').html(discount_amount + " " + currency)
                    }
                    else{
                        alert("please enter number between 0 and "+total);
                        if(discount_amount>parseFloat(total)){
                            $('#discount_input').val(total);
                            calculate_discoount();
                        }
                        else{
                            $('#discount_input').val(0);
                            calculate_discoount();
                        }
                    }
                }
            },300);
        }
        $('.discount-option-btn').click(function(){
            if($(this).not('active')){
            // }
            // else{
                $('.discount-option-btn').removeClass('active');
                $(this).addClass('active');
                if($(this).hasClass("percentage-btn")){
                    discount_option="percentage";
                }
                else{
                    discount_option="fixed";
                }
            }
            direct_calculate_discoount();
        });
        $(".item-btn").click(function() {
            var price = $(this).attr('d-price');
            var name = $(this).attr('d-name');
            var id = $(this).attr('d-product-id');
            var product_id = "#ptoduct-id-" + id;
            var cost =$(this).attr('d-cost');
            if(cost==null || cost==undefined || cost==""){
                cost=0;
            }// var itemIndex = orderlist.findIndex((item => item.item_id == itemid));
            var itemIndex = orderlist.findIndex((item => item.product_id == id));
            var has_garnishes = $(product_id).attr('d-garnish');
            if(has_garnishes=="true"){
                var itemid = "item-id-" + id+"-"+counter;
                var product = {
                    "product_id": id,
                    "item_id": itemid,
                    "name": name,
                    "price": price,
                    "qty": 1,
                    "garnishes": [],
                    "note": '',
                    "counter": counter,
                    "cost": cost,
                }
                orderlist.push(product);
                counter++;
            }
            else{
                if (itemIndex != -1) {
                    orderlist[itemIndex].qty++;
                    total += parseFloat(orderlist[itemIndex]['price']);
                    total = parseFloat(total)
                    total=total.toFixed(2);
                }
                else {
                    var itemid = "item-id-" + id+"-"+counter;
                    var product = {
                        "product_id": id,
                        "item_id": itemid,
                        "name": name,
                        "price": price,
                        "qty": 1,
                        "garnishes": [],
                        "note": '',
                        "counter": counter,
                        "cost": cost,
                    }

                    orderlist.push(product);
                    counter++;
                }
            }
            var html = print_items(orderlist);
            $("#discount_input").removeAttr('disabled');
            $("#checkOutList").html(html);
            direct_calculate_discoount();
        });
        function sub_qty(id,counter) {
            var qty_div = "#qty-" + id+"-"+counter;
            var old_qty = parseInt($(qty_div).attr('value'));
            if (old_qty == 1) {
                alert("You Must select min qty");
            } else {
                itemid = "item-id-" + id+"-"+counter;
                itemIndex = orderlist.findIndex((item => item.item_id == itemid));
                if (itemIndex >= 0) {
                    $(qty_div).attr('value', old_qty - 1);
                    $(qty_div).html(old_qty - 1);
                    orderlist[itemIndex].qty--;
                    var html = print_items(orderlist);
                    $("#checkOutList").html(html);
                    direct_calculate_discoount();
                }
            }
        }
        function add_qty(id,counter) {
            var qty_div = "#qty-" + id+"-"+counter;
            var old_qty = parseInt($(qty_div).attr('value'));
            itemid = "item-id-" + id+"-"+counter;
            itemIndex = orderlist.findIndex((item => item.item_id == itemid));
            if (itemIndex >= 0) {
                $(qty_div).attr('value', old_qty + 1);
                $(qty_div).html(old_qty + 1);
                orderlist[itemIndex].qty++;
                var html = print_items(orderlist);
                $("#checkOutList").html(html);
                direct_calculate_discoount();
            }
        }
        function delete_item(id ,counter) {
            var itemid = "item-id-" + id+"-"+counter;
            itemIndex = orderlist.findIndex((item => item.item_id == itemid));
            if (itemIndex >= 0) {
                var total_price = orderlist[itemIndex].qty * orderlist[itemIndex].price;
                orderlist.splice(orderlist.findIndex(a => a.item_id === itemid), 1)
                var html = print_items(orderlist);
                $("#checkOutList").html(html);
                $('#totalPrice').html(total + " " + currency);
                direct_calculate_discoount();
                if(orderlist.length<1){
                    $("#discount_input").attr('disabled','disabled');
                }
            }
        }
        function print_items(orderlist) {
            var html = "";
            total=0;
            orderlist.forEach(function(item, index) {
                total=parseFloat(total);
                total+=parseFloat(item['price'])*parseFloat(item['qty']);
                total=parseFloat(total);
                total=total.toFixed(2);
                html += "<div id='"+item['item_id']+"'class='w-full my-2 bg-slate-300 text-slate-700 hover:bg-sky-300 rounded-lg'>" +
                        "<div class='flex items-start py-2'>" +
                            "<div class='w-11/12 p-2 inline-block'>" +
                            "<div class='w-full flex items-start  text-base font-semibold'>" +
                                "<div class='w-auto grow text-left cursor-pointer' onClick='edit_item(" + item['product_id'] +"," + index + "," + item['counter']+ ")'>" + item['name'] + "</div>" +
                                    "<div class='flex items-center w-1/6'>" +
                                        "<div class='text-center sub-qty px-2 cursor-pointer' onClick='sub_qty(" + item['product_id'] +","+item['counter']+")'>-</div>" +
                                        "<div class='text-center px-1' id='qty-" + item['product_id'] + "-"+item['counter']+"' value='" + item['qty'] +"'>" + item['qty'] + "</div>" +
                                        "<div class='text-center cursor-pointer add-qty px-2' onClick='add_qty(" + item['product_id'] +","+item['counter']+")'>+</div>" +
                                    "</div>" +
                                    "<div class='w-1/6 text-center px-1' id='price-" + item['product_id'] + "' value='" + item['price'] + "'>" + item['price'] + "</div>" +"</div>" +
                                "</div>" +
                                "<div class='w-1/12 py-1 text-center inline-block '>" +
                                    "<span class='mdi mdi-delete cursor-pointer text-2xl text-red-500' onClick='delete_item(" +item['product_id'] +","+item['counter'] + ")'></span>" +
                                "</div>" +
                            "</div>";
                            if (item['note'] != "") {
                                html += "<div id='note-" + item['item_id'] +"' class='w-full font-bold px-2 text-left text-sm'>Note: " + item['note'] + "</div>";
                            }
                            if (item['garnishes'].length>0) {
                                html += "<div class='px-2'><div class='w-full font-bold text-left text-sm'>Garnishes:</div>";
                                item['garnishes'].forEach(function(garnish, index) {
                                    total+=parseFloat(garnish['price']*item['qty']);
                                    total=parseFloat(total);
                                    total=total.toFixed(2);
                                    html+="<div id='in-item-order-garnish-"+garnish['id']+"' class='flex py-1'>"+
                                                "<div class='w-4/5 text-left grow'>"+garnish['name']+"</div>"+
                                                "<div class='w-1/5 text-ellipsis text-right'>"+garnish['price']+"</div>"+
                                            "</div>"
                                })
                                html+="</div>";
                            }
                        html += "</div>";
                        $('#totalPrice').html(total + " " + currency);
                        old_total=total;
            });
            return html;
        }
        $('.checkout-btn').click(function() {
            client_name=$("#client_name_input").val();
            client_phone=$("#client_phone_input").val();
            client_address=$("#client_address_input").val();
            delivery_charge=$("#delivery_charge_input").val();
            if(client_name!="" && client_phone!="" && client_address!="" && delivery_charge!=""){
                if(orderlist.length>0){
                    print_invoice();
                    var created_at = new Date().toLocaleString();
                    if(discount_option==="fixed"){
                        var new_total=parseFloat(total)-parseFloat(discount_amount)+parseFloat(delivery_charge);
                        new_total=new_total.toFixed(2);
                        var final_discount=discount_amount;
                    }
                    else{
                        var final_discount=(total*discount_amount/100);
                        var new_total=+parseFloat(total)-parseFloat(final_discount)+parseFloat(delivery_charge);
                        new_total=new_total.toFixed(2);
                    }
                    var order = {
                        "created_at": created_at,
                        "client_name":client_name,
                        "client_phone":client_phone,
                        "client_address":client_address,
                        "delivery_charge":delivery_charge,
                        "employee_id":employee_id,
                        "business_id": {{ $business['id'] }},
                        "products": orderlist,
                        "total": new_total,
                        'order_no':order_no,
                        'discount_option':discount_option,
                        "discount_amount":final_discount,
                    }
                    all_orders.push(order);
                    orderlist = [];
                    $.ajax({
                        url: "{{ route('api_delivery_store') }}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            data: all_orders,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function(data) {
                            orderlist = [];
                            all_orders = [];
                            $("#discount_input").attr('disabled','disabled');
                            // location.reload();
                        },
                        error: function() {
                            orderlist = [];
                            $("#discount_input").attr('disabled','disabled');
                            alert("failure From php side!!! ");
                        }
                    });
                    $("#checkOutList").html("");
                    total = 0;
                    $('#totalPrice').html(total + " " + currency);
                    $('#discount_input').val(0);
                    $('.discounted_div').html(0 + " " + currency);
                }
                else{
                    alert("You have to add at least one item");
                }
            }
            else{
                alert("The client data must be filled");
                $('.modal-delivery-info-div').removeClass('hidden');
            }

        });
        $(".clear-btn").click(function() {
            $('#checkOutList').html("");
            total = 0;
            $('#totalPrice').html(0 + " " + currency);
            orderlist = [];
            $('#discount_input').val(0);
            $('.discounted_div').html(0 + " " + currency);
            $("#discount_input").attr('disabled','disabled');
        });


        function print_invoice(){
                var b_name=<?php echo json_encode($business->name); ?>;
                var bb=<?php echo json_encode($business); ?>;
                var b_phone=<?php echo json_encode($business->phone); ?>;
                var b_currency=<?php echo json_encode($business->currency); ?>;
                var now_date=new Date().toLocaleString().replace(',','')
                client_name=$("#client_name_input").val();
                client_phone=$("#client_phone_input").val();
                client_address=$("#client_address_input").val();
                delivery_charge=$("#delivery_charge_input").val();
                //ADDING THE HEADER OF THE INVOICE
                html_print="<div class='pt-10 text-lg pb-5'>"+b_name+
                                "<br>"+
                                "<span class='text-sm'>"+b_phone+"</span>"+
                                "<br>"+
                                "<span style='font-size:0.75rem !important;'>"+now_date+"</span>"+
                                "<br>"+
                                "<span style=''>Delivery</span>"+
                                "<br>"+
                                "<span style=''>Order No: "+order_no+"</span>"+
                            "</div>";

                //ADDING THE CLIENT INFORMATION
                html_print+="<tbl_nm class='mt-4 text-base text-left'>"+
                                        "<rw><cl class='vt' style='width: 40px;'>Name:</cl><cl class='colSep'></cl><cl class='vt'>"+client_name+"</cl></rw>"+
                                        "<rw><cl class='vt' style='width: 40px;'>Phone:</cl><cl class='colSep'></cl><cl class='vt'>"+client_phone+"</cl></rw>"+
                                        "<rw><cl class='vt' style='width: 40px;'>Address:</cl><cl class='colSep'></cl><cl class='vt'>"+client_address+"</cl></rw>"+
                                    "</tbl_nm>";
                //ADDING THE HEADER OR ITEMS
                html_print+="<tbl_nm class='text-base vt'>"+
                                "<cl class='text-left w50'>Item</cl>"+
                                "<cl class='colSep'></cl>"+
                                "<cl style='width:5%'>Qty</cl>"+
                                "<cl class='colSep'></cl>"+
                                "<cl style='width:20%'>Price</cl>"+
                                "<cl class='colSep'></cl>"+
                                "<cl class='text-right' style='width:20%'>Total</cl>"+
                            "</tbl_nm>"+
                            "<div class=''style='border-top:1px dashed black;'></div>";

                orderlist.forEach(function(item, index) {

                    //ADDING THE ITEM NAME - QTY & TOTAL PRICE
                    html_print+="<tbl_nm class='mt-2 text-sm'>"+
                                    "<cl class='vt text-left w50'>"+item['name']+"</cl>"+
                                    "<cl class='colSep'></cl>"+
                                    "<cl class='vt' style='width:5%'>"+item['qty']+"</cl>"+
                                    "<cl class='colSep'></cl>"+
                                    "<cl class='vt' style='width:20%'>"+item['price']+"</cl>"+
                                    "<cl class='colSep'></cl>"+
                                    "<cl class='text-right vt' style='width:20%'>"+(parseFloat(item['qty']*item['price'])).toFixed(2)+"</cl>"+
                                "</tbl_nm>";
                    //ADDING GARNISHES IF THERE IS
                    if (item['garnishes'].length>0) {
                        item['garnishes'].forEach(function(garnish, index) {
                            html_print+="<tbl_nm class=''text-sm vt'>"+
                                            "<cl class='vt text-left w50 'style='font-size:0.5rem !important;'>"+garnish['name']+"</cl>"+
                                            "<cl class='colSep'></cl>"+
                                            "<cl class='vt' style='width:5%'>"+item['qty']+"</cl>"+
                                            "<cl class='colSep'></cl>"+
                                            "<cl class='vt' style='width:20%'>"+garnish['price']+"</cl>"+
                                            "<cl class='colSep'></cl>"+
                                            "<cl class='vt text-right'style='width:20%'>"+(parseFloat(item['qty']*garnish['price'])).toFixed(2)+"</cl>"+
                                        "</tbl_nm>";
                        });
                    }
                    //ADDING NOTE IF THERE IS
                    if (item['note'] != "") {
                        html_print+="<div class='text-xs text-left'>"+
                                        "<div class=''>Note:</div>"+
                                        "<div>"+item['note']+"</div>"+
                                    "</div>";
                    }
                    html_print+="<div class=''style='border-top:1px dashed black;'></div>";
                });
                //ADDING DELIVERY CHARGE
                if(delivery_charge>0){
                    html_print+="<tbl_nm class='mt-4 vt'>"+
                                    "<cl class='vt text-left w30'>Delivery Charge:</cl>"+
                                    "<cl class='vt w70 text-right'>"+(parseFloat(delivery_charge)).toFixed(2) + " " +b_currency+"</cl>"+
                                "</tbl_nm>";
                    html_print+="<div class=''style='border-top:1px dashed black;'></div>";
                }
                //ADDING TOTAL
                total=+parseFloat(total)+parseFloat(delivery_charge);
                total=total.toFixed(2);
                html_print+="<tbl_nm class='mt-4 vt'>"+
                                    "<cl class='vt text-left w30'>Net:</cl>"+
                                    "<cl class='vt w70 text-right'>"+total+ " " +b_currency+"</cl>"+
                                "</tbl_nm>";
                if(bb['rate_option'] == 1){
                    html_print+="<tbl_nm class='mt-4 vt'>"+
                                "<cl class='vt text-left w30'>Net: LL</cl>"+
                                "<cl class='vt w70 text-right'>"+(parseFloat((parseFloat(total))*(parseFloat(bb['rate'])))).toFixed(2)+"</cl>"+
                            "</tbl_nm>";
                }
                //CHECK IF THERE IS DISCOUNT
                if((parseFloat(discount_amount))>0){
                    if(discount_option==="fixed"){
                        total=parseFloat(total)-parseFloat(delivery_charge);
                        var final_total=+parseFloat(total)-parseFloat(discount_amount)+parseFloat(delivery_charge);
                        final_total=final_total.toFixed(2);
                        html_print+="<tbl_nm class='mt-4 vt'>"+
                                        "<cl class='vt text-left w30'>Discount:</cl>"+
                                        "<cl class='vt w70 text-right'>"+(parseFloat(discount_amount)).toFixed(2)+" " +b_currency+"</cl>"+
                                    "</tbl_nm>";
                        html_print+="<tbl_nm class='mt-4 vt'>"+
                                        "<cl class='vt text-left w30'>Net:</cl>"+
                                        "<cl class='vt w70 text-right'>"+final_total+" " +b_currency+"</cl>"+
                                    "</tbl_nm>";
                        if(bb['rate_option'] == 1){
                                html_print+="<tbl_nm class='mt-4 vt'>"+
                                            "<cl class='vt text-left w30'>Net: LL</cl>"+
                                            "<cl class='vt w70 text-right'>"+(parseFloat((parseFloat(final_total))*(parseFloat(bb['rate'])))).toFixed(2)+"</cl>"+
                                        "</tbl_nm>";
                        }
                    }
                    else{
                        total=parseFloat(total)-parseFloat(delivery_charge);
                        var discount_fixed=(total*discount_amount/100);
                        var final_total=+parseFloat(total)-parseFloat(discount_fixed)+parseFloat(delivery_charge);;
                        final_total=final_total.toFixed(2);
                        html_print+="<tbl_nm class='mt-4 vt'>"+
                                        "<cl class='vt text-left w30'>Discount</cl>"+
                                        "<cl class='vt w70 text-right'>"+(parseFloat(discount_fixed)).toFixed(2) +"</cl>"+
                                    "</tbl_nm>";
                        html_print+="<tbl_nm class='mt-4 vt'>"+
                                        "<cl class='vt text-left w30'>Net: "+b_currency+"</cl>"+
                                        "<cl class='vt w70 text-right'>"+final_total+"</cl>"+
                                    "</tbl_nm>";
                        if(bb['rate_option'] == 1){
                            html_print+="<tbl_nm class='mt-4 vt'>"+
                                        "<cl class='vt text-left w30'>Net: LL</cl>"+
                                        "<cl class='vt w70 text-right'>"+(parseFloat((parseFloat(final_total))*(parseFloat(bb['rate'])))).toFixed(2)+"</cl>"+
                                    "</tbl_nm>";
                        }
                    }
                }
                html_print+="<div class='mt-2- text-sm'>"+
                                "<span>Powered By</span>"+
                                "</br>"+
                                "<span class='b'>ALGOREXE<span>"+
                            "</div>";
                $("#printdiv").html(html_print);
                $('#printdiv').print();
        }
    </script>
@endsection