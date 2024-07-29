<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use PayOS\PayOS;

class OrderController extends Controller
{
    private string $payOSClientId;
    private string $payOSApiKey;
    private string $payOSChecksumKey;

    public function __construct()
    {
        $this->payOSClientId = env("PAYOS_CLIENT_ID");
        $this->payOSApiKey = env("PAYOS_API_KEY");
        $this->payOSChecksumKey = env("PAYOS_CHECKSUM_KEY");
    }

    function create(Request $request)
    {
        $carts = $request->cart ?? '[]';
        $carts = json_decode($carts, true);
        $order = Order::create($request->all());

        if (count($carts) > 0) {
            $data = [];
            foreach ($carts as $cart) {
                array_push($data, [
                    'id_bill' => $order->id,
                    'id_product' => $cart['id'],
                    'quantity' => $cart['quantity'],
                    'unit_price' => $cart['unit_price'],
                ]);
            };
            $cartDetail = OrderDetail::insert($data);
        }
        $request->session()->forget('cart');

        $url = $this->createPaymentLink($order->id, 2000);
        return redirect($url);
    }

    public function createPaymentLink($orderId, $amount)
    {
        $YOUR_DOMAIN = "http://localhost:8000/order/success/" . $orderId;
        $data = [
            "orderCode" => intval(substr(strval(microtime(true) * 10000), -6)),
            "amount" => $amount,
            "description" => "Thanh toán đơn hàng",
            "returnUrl" => $YOUR_DOMAIN,
            "cancelUrl" => $YOUR_DOMAIN . "/cancel.html"
        ];
        error_log($data['orderCode']);
        $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
        $PAYOS_API_KEY = env('PAYOS_API_KEY');
        $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');

        $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);
        try {
            $response = $payOS->createPaymentLink($data);
            // \Log::debug('$response', [$response]);
            return ($response['checkoutUrl']);
            // $response = $payOS->getPaymentLinkInformation($data['orderCode']);
            // return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    function success($id)
    {
        $order = Order::find($id);
        $order->status = true;
        $order->save();

        return 'thanh toan thanh cong';
    }

    function detail($id)
    {
        $orderDetails = OrderDetail::where('id_bill', $id)->with('product')->get();
        return response()->json($orderDetails, 200);
    }

    function delete($id)
    {
        $order = Order::find($id);
        $order->order_detail()->delete();
        $order->delete();

        return response()->json('delete success', 200);
    }

    public function getPaymentLinkInfoOfOrder(string $id)
    {
        $payOS = new PayOS($this->payOSClientId, $this->payOSApiKey, $this->payOSChecksumKey);
        try {
            $response = $payOS->getPaymentLinkInformation($id);
            return response()->json([
                "error" => 0,
                "message" => "Success",
                "data" => $response
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getCode(),
                "message" => $th->getMessage(),
                "data" => null
            ]);
        }
    }

    public function cancelPaymentLinkOfOrder(Request $request, string $id)
    {
        $body = json_decode($request->getContent(), true);
        $payOS = new PayOS($this->payOSClientId, $this->payOSApiKey, $this->payOSChecksumKey);
        try {
            $cancelBody = is_array($body) && @$body["cancellationReason"] ?? 'nothing';
            $response = $payOS->cancelPaymentLink($id, $cancelBody);
            return response()->json([
                "error" => 0,
                "message" => "Success",
                "data" => $response
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => $th->getCode(),
                "message" => $th->getMessage(),
                "data" => null
            ]);
        }
    }
}
