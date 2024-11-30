<?php
// app/Http/Controllers/PaymentController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Charge;
use Tymon\JWTAuth\Claims\Subject;

class SubscriptionController extends Controller
{
    public function getSubscriberData(Request $req){
        $UserModel = new Subscription();
        $id = $req->id;
        $data = $UserModel->getSubscriberinfo($id);
        return response()->json($data);
    }

    public function processPayment(Request $request)
    {
        $subscribe = new Subscription;
            $subscribe->username=$request->name;
            $subscribe->userid=$request->id;
            $subscribe->amount=$request->amount;
            $subscribe->save();
            $id=$request->id;
            $update= User::where('id','=',$id)->first();
            $update->status='1';
            $update->save();

        try {
            // Set your Stripe secret key
            Stripe::setApiKey('sk_test_51NsJylSDWf8pw13Yejis6JZtlEJTU8LmhafAoT297bxWnkjVL4xGhP50onqeyBeHVCd5wUfhf16l6EonsBtYgdCR00yA0ElZ67');
            // Validate the incoming request data (e.g., amount, token)
            $request->validate([
                'amount' => 'required|numeric',
                'token' => 'required|string',
                'card' => 'required|string',
            ]);

            $paymentMethod = \Stripe\PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'token' => $request->token,
                ],
            ]);

            //return $paymentMethod;

            // $paymentIntent = \Stripe\PaymentIntent::confirm(
            //     'sk_test_51NsJylSDWf8pw13Yejis6JZtlEJTU8LmhafAoT297bxWnkjVL4xGhP50onqeyBeHVCd5wUfhf16l6EonsBtYgdCR00yA0ElZ67',
            //     [
            //         'payment_method' => $paymentMethod->id,
            //     ]
            // );
    
            // Create a customer and attach the PaymentMethod to the customer
            $customer = \Stripe\Customer::create([
                'name' => $request->name,
                'payment_method' => $paymentMethod->id,
            ]);
    
            // Create a PaymentIntent with customer and payment_method
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->amount * 100, // The amount to charge, in cents
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'customer' => $customer->id, // Associate the customer with the PaymentIntent
                'payment_method' => $paymentMethod->id, // Specify the payment method
            ]);
            
            // Confirm the PaymentIntent
            //$paymentIntent->confirm();
            // if($paymentIntent->status === 'requires_action'){
            //     return response()->json(['message' => 'redirect',
            //     'userstatus'=>1,
            // ]);
            // }

            $paymentIntent->confirm();
            // if ($paymentIntent->status === 'succeeded') {
            //     return response()->json(['message' => 'Payment successful',
            //                             'userstatus'=>1,
            //                         ]);
            // } else {
            //     return response()->json(['error' => 'Payment failed'], 400);
            // }

            if ($paymentIntent->status === 'requires_action') {
                // Retrieve the client secret
                $clientSecret = $paymentIntent->client_secret;
        
                // Send the client secret to the client-side JavaScript
                return response()->json(['message' => 'requires_action', 'client_secret' => $clientSecret]);
            }
        
            if ($paymentIntent->status === 'succeeded') {
                return response()->json(['message' => 'Payment successful', 'userstatus' => 1]);
            } else {
                return response()->json(['error' => 'Payment failed'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
