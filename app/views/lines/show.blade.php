@extends('layouts.master')
@section('content')
	<div class="well">
		
	
	    <h1> {{ $line->name }} </h1>
	    
	       <span>Description: {{ ($line->lin_description) ? $line->lin_description : 'No description' }} </span>

	    <p class="pull-right">
	    	{{ link_to('lines', 'Volver atrás') }} |
	    	 {{ link_to_route('lines.edit', 'Editar', $line->id, array('class' => 'btn btn-primary')) }}</p>
    </div>
@stop