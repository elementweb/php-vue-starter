<?php

namespace App\Controllers;

use Respect\Validation\Validator;
use App\Helpers\View;
use App\Models\Quote;
use App\Models\Subscription;
use App\Models\Service;
use App\Models\Good;
use App\Models\QuoteSubscription;
use App\Models\QuoteService;
use App\Models\QuoteGood;
use App\Models\User;

class QuotesController extends Controller
{
    public function displayQuoteForm()
    {
        $data = [
        ];
        
        return View::make('public', 'public.quote', $data);
    }

    public function submitQuote()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        header('Content-Type: application/json');

        /**
         * VALIDATE INPUTS FIRST
         */

        if(empty($data['personal']['first_name'])){
            return json_encode([
                'status' => 'ERROR',
                'error_msg' => 'please enter first name'
            ]);
        }

        if(empty($data['personal']['last_name'])){
            return json_encode([
                'status' => 'ERROR',
                'error_msg' => 'please enter last name'
            ]);
        }

        if(empty($data['personal']['email']) || !Validator::email()->validate($data['personal']['email'])){
            return json_encode([
                'status' => 'ERROR',
                'error_msg' => 'please enter valid email address'
            ]);
        }

        $user_id = User::addNew([
            "first_name" => $data['personal']['first_name'],
            "last_name" => $data['personal']['last_name'],
            "email" => $data['personal']['email'],
            "phone" => $data['personal']['phone'],
            "password" => $data['personal']['password']
        ]);

        $quote = Quote::addNew([
            "user_id" => $user_id,
            "charge_total" => 0.00
        ]);

        $charge_total = 0;

        foreach($data['products']['subscriptions'] as $subscription){
            $charge_per_day = Subscription::find($subscription['id'])->charge_per_day;

            $quoteSubscription = new QuoteSubscription();

            $quoteSubscription->quote_id = $quote['id'];
            $quoteSubscription->subscription_id = $subscription['id'];
            $quoteSubscription->days = $subscription['qty'];
            $quoteSubscription->charge_per_day = $charge_per_day;
            $quoteSubscription->subtotal = $subscription['qty'] * $charge_per_day;
            $quoteSubscription->start = $subscription['start'];
            $quoteSubscription->end = $subscription['end'];

            $quoteSubscription->save();

            $charge_total += $subscription['qty'] * $charge_per_day;
        }

        foreach($data['products']['services'] as $service){
            $charge_per_hour = Service::find($service['id'])->charge_per_hour;

            $quoteService = new QuoteService();

            $quoteService->quote_id = $quote['id'];
            $quoteService->service_id = $service['id'];
            $quoteService->hours = $service['qty'];
            $quoteService->charge_per_hour = $charge_per_hour;
            $quoteService->subtotal = $service['qty'] * $charge_per_hour;
            $quoteService->day = $service['day'];
            $quoteService->hour = $service['hour'];

            $quoteService->save();

            $charge_total += $service['qty'] * $charge_per_hour;
        }

        foreach($data['products']['goods'] as $good){
            $charge_per_unit = Good::find($good['id'])->charge_per_unit;

            $quoteGood = new QuoteGood();
            $quoteGood->quote_id = $quote['id'];
            $quoteGood->good_id = $good['id'];
            $quoteGood->quantity = $good['qty'];
            $quoteGood->charge_per_unit = $charge_per_unit;
            $quoteGood->subtotal = $good['qty'] * $charge_per_unit;

            $quoteGood->save();

            $charge_total += $good['qty'] * $charge_per_unit;
        }

        $quote = Quote::find($quote['id']);
        $quote->charge_total = $charge_total;
        $quote->save();

        return json_encode([
            'status' => 'OK',
            'quote_hash' => $quote['hash']
        ]);
    }

    public function displayQuoteComplete($arg)
    {
        $quote = Quote::where('hash', $arg['quote_hash'])->get()->toArray();
        $quote = reset($quote);

        $data = [
            "quote" => $quote
        ];
        
        return View::make('public', 'public.quote-complete', $data);
    }

    public function deleteQuote()
    {
        $data = [
        	"action" => "delete",

        	"quote_id" => $_POST['id']
        ];

        return json_encode($data);
    }
}