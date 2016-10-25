<?php
	class Plan extends Eloquent {

		public function line() {
			return $this->belongsTo('Line');
		}

		public function user() {
			return $this->belongsTo('User');
		}

		public function item() {
			return $this->belongsTo('ItemMaster', 'item_master_id', 'id');
		}

		protected $table = 'plan';
	}
?>