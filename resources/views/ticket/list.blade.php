@extends('template.template')

@section('body')
	<table id="tickets-table" class="table table-striped">
		<thead>
			<tr class="text-center">
				<th>N° du compte</th>
				<th>N° de la facture</th>
				<th>N° du client</th>
				<th>Date</th>
				<th>Heure</th>
				<th>Durée réele</th>
				<th>Durée facture</th>
				<th>Type</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($tickets as $ticket)
				<tr class="text-center">
					<td>{{ $ticket->account_invoice }}</td>
					<td>{{ $ticket->invoice_id }}</td>
					<td>{{ $ticket->customer_id }}</td>
					<td>{{ \Carbon\Carbon::parse($ticket->date)->format('d/m/Y') }}</td>
					<td>{{ $ticket->time }}</td>
					<td>{{ $ticket->duration }}</td>
					<td>{{ $ticket->duration_invoice }}</td>
					<td>{{ $ticket->type }}</td>
					<td>
						<a href="{{ route('update-ticket', array('id' => $ticket->id)) }}">
							<i class="fas fa-pencil-alt"></i> 
						</a>
						<a href="{{ route('delete-ticket', array('id' => $ticket->id)) }}">
							<i class="fas fa-trash-alt"></i>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $tickets->links() }}
@endsection
