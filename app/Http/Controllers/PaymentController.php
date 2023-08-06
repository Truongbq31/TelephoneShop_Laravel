<?php

namespace App\Http\Controllers;

use App\Models\Admin\Order_detail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function payment(Request $request){
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        /**
         * Description of vnpay_ajax
         *
         * @author xonv
         */
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

//        dd($request);
        $vnp_TmnCode = "DL0EA7AJ"; //Website ID in VNPAY System
        $vnp_HashSecret = "GOGAQDDKQGSHOENQIKCHZBMXCIZBQVXJ"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('client.handlePayment')
            ."?id_prd=$request->id_prd"
            ."&qty=$request->qty"
            ."&address=$request->address"
            ."&phone=$request->phone_number"
            ."&note=$request->note";
//        $vnp_apiUrl = " https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
//Config input format
//Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $vnp_TxnRef = rand(1000,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh-toan-don-hang"; //mô tả đơn hàng
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $request->total_price * 23000;
//        $vnp_Amount = 1000000;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
        $vnp_ExpireDate = $expire;

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

//var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
//        dd($vnp_Url);
        if ($request->total_price) {
//            dd(123);
//            dd($vnp_Url);
            return redirect($vnp_Url);
//            return redirect()->getTargetUrl($vnp_Url);
        } else {
            echo json_encode($returnData);
        }
    }
    public function handlePayment(Request $request){
        if ($_GET['vnp_ResponseCode'] == 00) {
            $order_code = $_GET['vnp_TxnRef'];
            $data = [
                'products_id' => intval($_GET['id_prd']),
                'user_id' => Auth::user()->id,
                'total_price'=> intval($_GET['vnp_Amount']),
                'address'=>$_GET['address'],
                'phone_number'=>$_GET['phone'],
                'quantity'=>intval($_GET['qty']),
                'note'=>$_GET['note'],
                'order_code' => $order_code
            ];
//            dd($data);
            $resutl = Order_detail::create($data);
            if ($resutl){
                $orderDetail = DB::table('order_detail')
                    ->join('products','products.id','=','order_detail.products_id')
                    ->join('users','users.id','=','order_detail.user_id')
                    ->select('products.name as product_name','users.name as user_name','products.image','order_detail.*')
                    ->where('order_detail.user_id','=',Auth::user()->id)
                    ->whereNull('order_detail.deleted_at')
                    ->get();
                Cart::destroy();
                return view('client.checkout.index',compact('orderDetail'));
            }
            //Xử lý khi thanh toán thành công
        }else{
//            dd($_GET);
//            dd(Auth::user()->id);
            Session::flash('error', 'Payment failed');
            return redirect()->route('route_cart_index');
        }
    }

}
