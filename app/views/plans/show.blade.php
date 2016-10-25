@extends('layouts.master')
@section('content')
  
  @if(isset($errors))
	   <ul>
	      @foreach($errors as $item)
	         <li> {{ $item }} </li>
	      @endforeach
	   </ul>
	@endif

 	<div class="row">

	<div class="col-md-8 col-md-offset-2">
		<h3>
			Plan 
		</h3>

		<hr />

		@if($plan)
			<p>
				<label>
					Identificador:
				</label>
				{{ $plan->id }}
			</p>
			<p>
				<label>
					Molde:
				</label>
				{{ $plan->model->mold->name }}
			</p>
			<p>
				<label>
					Modelo:
				</label>
				{{ $plan->model->name }}
			</p>
			<p>
				<label>
					Fecha de inicio:
				</label>
				{{ date('d F Y', strtotime($plan->production_date_begin)) }}
			</p>
			<p>
				<label>
					Fecha termino:
				</label>
				{{ date('d F Y', strtotime($plan->production_date_end)) }}
			</p>
			<p>
				<label>
					Hora de inicio:
				</label>
				{{ $plan->production_time_begin }}
			</p>
			<p>
				<label>
					Hora termino:
				</label>
				{{ $plan->production_time_end }}
			</p>
			<p>
				<label>
					Cantidad:
				</label>
				<b>{{ $plan->quantity }}</b>
			</p>

			
			<p>
			<label>
					Estatus
				</label>
			 	<span  class="label label-{{ ($plan->status_plan == 1) ? 'success' : 'danger' }}" >
                    @if($plan->status_plan == 1)
                        Activo
                    @elseif($plan->status_plan == 2)
                        Inactivo
                    @else
                        <i class="text-danger">Erroneo</i>
                    @endif
                </span>
			</p>

			<p>
				<label>
					Tipo de plan:
				</label>
				{{ $plan->type->name }}
			</p>

			<p>
				<label>
					Linea:
				</label>
				{{ $plan->line->name }}
			</p>

			<p>
				<label>
					Creado
				</label>
				{{ $plan->created_at }}
			</p>
			<p>
				<label>
					Comentarios:
				</label>
				{{ $plan->comment }}
			</p>
		@endif
		{{ link_to_route('plan.edit', 'Editar', $plan->id, array('class' => 'btn btn-primary')) }}
		<a class="text-warning">Regresar</a>
		
  	</div>

  </div>
@stop