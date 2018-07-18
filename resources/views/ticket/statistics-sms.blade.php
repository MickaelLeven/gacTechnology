@extends('template.template')

@section('body')
	<table id="tickets-table" class="table table-striped">
		<thead>
			<tr class="text-center">
				<th>N° du client</th>
				<th>Données consomées</th>
				<th>Date</th>
				<th>Heure</th>
			</tr>
		</thead>
		<tbody>
			@foreach($customers as $customer)
				@foreach($customer->top as $top)
    				<tr class="text-center">
    					<td>{{ $customer->id }}</td>
    					<td>{{ $top->weight_invoice }}</td>
    					<td>{{ \Carbon\Carbon::parse($top->date)->format('d/m/y') }}</td>
    					<td>{{ $top->time }}</td>
    				</tr>
				@endforeach
			@endforeach
		</tbody>
	</table>
@endsection