<?php

class Intransit extends \Eloquent {
	protected $fillable = [];

	public function material () {
		return $this->belongsTo('ItemMaster', 'item_id', 'id');
	}

	public function vendor () {
		return $this->belongsTo('Vendor', 'vendor_id', 'id');
	}

}