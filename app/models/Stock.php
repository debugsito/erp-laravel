<?php

class Stock extends \Eloquent {
	protected $fillable = [];

	public function material () {
		return $this->belongsTo('ItemMaster', 'item_id', 'id');
	}

	public function location () {
		return $this->belongsTo('Location', 'location_id', 'id');
	}

	public function movement () {
		return $this->belongsTo('MovementType', 'movement_type_id', 'id');
	}

	public function category () {
		return $this->belongsTo('OrderCategory', 'order_category_id', 'id');
	}

	public function type () {
		return $this->belongsTo('StockType', 'stock_type_id', 'id');
	}
}