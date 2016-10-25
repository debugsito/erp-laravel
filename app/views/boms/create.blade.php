<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Create BOM</h4>
</div>

<div class="modal-body">
	<div class="form-group">	
	{{ Form::open(array('route' => 'item_masters.search_item', 'id' => 'form-bom-item-search', 'method' => 'GET')) }}
		<div class="input-group">
			<input type="text" name="item" class="form-control" placeholder="Playera, pintura...">
			<span class="input-group-btn">
				<input type="submit" value="Search item" class="btn btn-default" />
			</span>
		</div>	
	{{ Form::close() }}
	</div>
	<div class="form-group content-search-item-create-bom">
		<table class="table" id="content-search-item-create-bom">
			<thead>
				<th>Name</th>
				<th>Add</th>
			</thead>
			<tbody>
				<tr><td></td></tr>
			</tbody>
		</table>
	</div>
	<hr />
	{{ Form::model($bom, array('route' => 'boms.store', 'id' => 'form-bom')) }}
	@include('boms._form')
	<hr />
	{{ Form::submit('Guardar', array('class' => 'btn btn-success btn-save')) }}
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	{{ Form::close() }}
</div>
<!--<div class="modal-footer">
</div>-->
