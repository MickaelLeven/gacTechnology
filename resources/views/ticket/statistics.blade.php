@extends('template.template')

@section('body')
    	<div class="col-lg-4 col-sm-6">
    		<div class="circle-tile ">
    			<a href="#">
    				<div class="circle-tile-heading dark-blue">
            			<i class="fa fa-user-circle fa-fw fa-3x"></i>
            		</div>
            	</a>
            	<div class="circle-tile-content dark-blue">
              		<div class="circle-tile-description text-faded">Nombre de Comptes</div>
              		<div class="circle-tile-number text-faded ">{{ $count_account }}</div>
            		<div class="circle-tile-footer">
            			En savoir plus
            		</div>
            	</div>
          	</div>
        </div>
        <div class="col-lg-4 col-sm-6">
    		<div class="circle-tile ">
    			<a href="#">
    				<div class="circle-tile-heading dark-blue">
            			<i class="fa fa-file-alt fa-fw fa-3x"></i>
            		</div>
            	</a>
            	<div class="circle-tile-content dark-blue">
              		<div class="circle-tile-description text-faded">Nombre de Factures</div>
              		<div class="circle-tile-number text-faded ">{{ $count_invoice }}</div>
            		<div class="circle-tile-footer">
            			En savoir plus
            		</div>
            	</div>
          	</div>
        </div>
        <div class="col-lg-4 col-sm-6">
    		<div class="circle-tile ">
    			<a href="#">
    				<div class="circle-tile-heading dark-blue">
            			<i class="fa fa-users fa-fw fa-3x"></i>
            		</div>
            	</a>
            	<div class="circle-tile-content dark-blue">
              		<div class="circle-tile-description text-faded">Nombre de Clients</div>
              		<div class="circle-tile-number text-faded ">{{ $count_customer }}</div>
            		<div class="circle-tile-footer">
            			En savoir plus
            		</div>
            	</div>
          	</div>
        </div>
        <div class="col-lg-4 col-sm-6">
    		<div class="circle-tile ">
    			<a href="#">
    				<div class="circle-tile-heading red">
            			<i class="fa fa-ticket-alt fa-fw fa-3x"></i>
            		</div>
            	</a>
            	<div class="circle-tile-content red">
              		<div class="circle-tile-description text-faded">Nombre de Tickets (Total)</div>
              		<div class="circle-tile-number text-faded ">{{ $count_tickets }}</div>
            		<div class="circle-tile-footer">
            			En savoir plus
            		</div>
            	</div>
          	</div>
        </div>
        <div class="col-lg-4 col-sm-6">
    		<div class="circle-tile ">
    			<a href="#">
    				<div class="circle-tile-heading red">
            			<i class="fa fa-envelope fa-fw fa-3x"></i>
            		</div>
            	</a>
            	<div class="circle-tile-content red">
              		<div class="circle-tile-description text-faded">Nombre de Tickets (SMS)</div>
              		<div class="circle-tile-number text-faded ">{{ $count_tickets_sms }}</div>
            		<div class="circle-tile-footer">
            			En savoir plus
            		</div>
            	</div>
          	</div>
        </div>
        <div class="col-lg-4 col-sm-6">
    		<div class="circle-tile ">
    			<a href="#">
    				<div class="circle-tile-heading red">
            			<i class="fa fa-phone fa-fw fa-3x"></i>
            		</div>
            	</a>
            	<div class="circle-tile-content red">
              		<div class="circle-tile-description text-faded">Nombre de Tickets (Appel)</div>
              		<div class="circle-tile-number text-faded ">{{ $count_tickets_phone }}</div>
            		<div class="circle-tile-footer">
            			durée totale : {{ $total_duration->total }}
            		</div>
            	</div>
          	</div>
        </div>
        <div class="col-lg-4 col-sm-6">
    		<div class="circle-tile ">
    			<a href="{{ route('stats-tickets-data') }}">
    				<div class="circle-tile-heading red">
            			<i class="fa fa-question fa-fw fa-3x"></i>
            		</div>
            	</a>
            	<div class="circle-tile-content red">
              		<div class="circle-tile-description text-faded">Nombre de Tickets (Autres)</div>
              		<div class="circle-tile-number text-faded ">{{ $count_tickets_data }}</div>
            		<div class="circle-tile-footer">
            			En savoir plus
            		</div>
            	</div>
          	</div>
        </div>
@endsection