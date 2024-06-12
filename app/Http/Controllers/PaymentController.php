<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PayOS\PayOS;

class PaymentController extends Controller
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

    public function handlePayOSWebhook(Request $request)
    {
       $body = json_decode($request->getContent(), true);

       if ($body != null) {
            $webhookData = $body;
            $payOS = new PayOS($this->payOSClientId, $this->payOSApiKey, $this->payOSChecksumKey);
            $response = $payOS->verifyPaymentWebhookData($webhookData);

            if ($response['code'] == '00') {
                $order = Order::where('code', $response['orderCode'])->first();
                $order->status = 'Pending';
                $order->save();
            }
            error_log('reponse code: '.$response['code']);
       }
    }

    public function handlePaymentRedirect(Request $request) {
       

        $payOS = new PayOS($this->payOSClientId, $this->payOSApiKey, $this->payOSChecksumKey);

        try {
            $response = $payOS->getPaymentLinkInformation($request->input('orderCode'));
            $order = Order::where('code', $response['orderCode'])->first();

            if (!$order) {
                return "Invalid order!";
            }

            if ($response['status'] == 'CANCELLED') {
                $order->status = 'Cancelled';
            }

            if ($response['status'] == 'PAID') {
                $order->status = 'Pending';
            }

            $order->save();

            
            return Redirect::route('restaurant.order', ['id' => $order->restaurant_id, 'order_id' => $order->id]);
            
            
        } catch (\Throwable $th) {
            return $th->getMessage();
            return Redirect::route('home')->error($th->getMessage());
        }
        
        
        

        

    
    }
}
