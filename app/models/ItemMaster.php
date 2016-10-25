<?php

class ItemMaster extends \Eloquent {
	protected $fillable = [];

	public function unit () {
		return $this->belongsTo('ItemUnit', 'unit_item_id', 'id');
	}

	public function type () {
		return $this->belongsTo('ItemType', 'type_id', 'id');
	}
}