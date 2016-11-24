<?php

namespace App\Models;

class QuoteService extends BaseModel
{
	/**
	 * Get the quote that owns the service.
	 */
    public function quote()
    {
		return $this->belongsToMany('App\Models\Quote', 'quote_goods');
    }
}
