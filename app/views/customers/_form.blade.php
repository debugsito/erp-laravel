<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		  	{{ Form::label ('client_first_name', 'First name') }}
			{{ Form::text ('client_first_name', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		  	{{ Form::label ('client_last_name', 'Last name') }}
			{{ Form::text ('client_last_name', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		  	{{ Form::label ('cell_phone', 'Cell phone') }}
			{{ Form::text ('cell_phone', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		  	{{ Form::label ('email', 'Email') }}
			{{ Form::text ('email', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		  	{{ Form::label ('city', 'City') }}
			{{ Form::text ('city', null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		  	{{ Form::label ('company_name', 'Company name') }}
			{{ Form::text ('company_name', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		  	{{ Form::label ('phone_number', 'Phone number') }}
			{{ Form::text ('phone_number', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		  	{{ Form::label ('address_stree_1', 'Address: Stree 1') }}
			{{ Form::text ('address_stree_1', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		  	{{ Form::label ('address_stree_2', 'Address: Street 2') }}
			{{ Form::text ('address_stree_2', null, array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
		  	{{ Form::label ('zipcode', 'Zipcode') }}
			{{ Form::text ('zipcode', null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="col-md-12">
		
		<div class="form-group">
		  {{ Form::label ('details_note', 'Details note') }}
		  {{ Form::textarea ('details_note',null, array('class' => 'form-control')) }}
		</div>
	</div>
</div>


