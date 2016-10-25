<?php

class Bom extends \Eloquent {

	protected $fillable = [];

	protected $table = 'boms';

	public function parent () {
		return $this->belongsTo('ItemMaster', 'item_id_parent', 'id');
	}

	public function child () {
		return $this->belongsTo('ItemMaster', 'item_id_child', 'id');
	}

	public function user () {
		return $this->belongsTo('User', 'user_id', 'id');
	}

}