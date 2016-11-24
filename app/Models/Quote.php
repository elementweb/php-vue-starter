<?php

namespace App\Models;

class Quote extends BaseModel
{
    /**
     * Get the user that this quote belong to.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the services for the quote.
     */
    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'quote_services');
    }

    /**
     * Get the subscriptions for the quote.
     */
    public function subscriptions()
    {
        return $this->belongsToMany('App\Models\Subscription', 'quote_subscriptions');
    }

    /**
     * Get the goods for the quote.
     */
    public function goods()
    {
        return $this->belongsToMany('App\Models\Good', 'quote_goods');
    }

    public static function addNew($data)
    {
        $quote = new self();

        $quote->user_id = $data['user_id'];
        $quote->charge_total = $data['charge_total'];
        $quote->hash = substr(md5(rand()), 0, 20);

        $quote->save();

        return [
            "id" => $quote->id,
            "hash" => $quote->hash
        ];
    }
}
