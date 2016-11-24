<?php

namespace App\Models;

class QuoteGood extends BaseModel
{
	/**
	 * Get the quote that owns the good.
	 */
    public function quote()
    {
		return $this->belongsToMany('App\Models\Quote', 'quote_goods');
    }
}
