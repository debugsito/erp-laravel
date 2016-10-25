<?php

class SalesOrder extends \Eloquent {
	protected $fillable = [];

	public function customer () {
		return $this->belongsTo('Customer', 'customer_id', 'id');
	}

	public function material () {
		return $this->belongsTo('ItemMaster', 'item_id', 'id');
	}

	public function po () {
		return $this->belongsTo('Intransit', 'po_id', 'id');
	}

	public function method () {
		return $this->belongsTo('ShipMethod', 'ship_method_id', 'id');
	}
}