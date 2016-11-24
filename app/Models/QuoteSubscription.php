<?php

namespace App\Models;

class QuoteSubscription extends BaseModel
{
	/**
	 * Get the quote that owns the subscription.
	 */
	public function quote()
	{
		return $this->belongsToMany('App\Models\Quote', 'quote_goods');
	}
}
