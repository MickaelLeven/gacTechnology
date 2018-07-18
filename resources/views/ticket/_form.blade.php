@csrf

<div class="form-group">
	<label>Type :</label>
	<select name="type" class="form-control js_select_type_ticket">
		@foreach($types_ticket as $type_ticket)
			<option value="{{ $type_ticket->type }}" 
				@if(isset($ticket) && ($ticket->type == $type_ticket->type)) selected @endif
				@if(strpos($type_ticket->type, "appel") !== false)
					type="phone"
				@elseif(strstr($type_ticket->type, "sms") !== false)
					type="sms"
				@else
					type="data"
				@endif
			>
				{{ $type_ticket->type }}
			</option>
		@endforeach
	</select>
</div>

<div class="form-group {!! $errors->has('account_invoice') ? 'has-error' : '' !!}">
	<label>Compte :</label>
	<input type="number" name="account_invoice" class="form-control" @if(isset($ticket)) value="{{ $ticket->account_invoice }}" @endif>
	{!! $errors->first('account_invoice', '<small class="help-block">:message</small>') !!}
</div>

<div class="form-group {!! $errors->has('invoice_id') ? 'has-error' : '' !!}">
	<label>Facture n° :</label>
	<input type="number" name="invoice_id" class="form-control" @if(isset($ticket)) value="{{ $ticket->invoice_id }}" @endif>
	{!! $errors->first('invoice_id', '<small class="help-block">:message</small>') !!}
</div>

<div class="form-group {!! $errors->has('customer_id') ? 'has-error' : '' !!}">
	<label>Identifiant du client :</label>
	<input type="number" name="customer_id" class="form-control" @if(isset($ticket)) value="{{ $ticket->customer_id }}" @endif>
	{!! $errors->first('customer_id', '<small class="help-block">:message</small>') !!}
</div>

<div class="well">
	<label>Date :</label><br/>
	<div class="input-group mb-3 calandar date {!! $errors->has('date') ? 'has-error' : '' !!}">
    	<input name="date" type="text" class="form-control" data-format="dd/MM/yyyy"  @if(isset($ticket)) value="{{ \Carbon\Carbon::parse($ticket->date)->format('d/m/y') }}" @endif>
    	<div class="input-group-append">
        	<span class="add-on input-group-text">
              	<i class="fas fa-clock" data-time-icon="icon-time" data-date-icon="icon-calendar">
              	</i>
            </span>
        </div>
	</div>
	{!! $errors->first('date', '<small class="help-block">:message</small>') !!}
</div>

<div class="well">
	<label>Heure :</label><br/>
	<div class="input-group mb-3 timepicker {!! $errors->has('time') ? 'has-error' : '' !!}">
    	<input name="time" type="text" class="form-control" data-format="hh:mm:ss"  @if(isset($ticket)) value="{{ $ticket->time }}" @endif>
    	<div class="input-group-append">
        	<span class="add-on input-group-text">
              <i class="fas fa-clock" data-time-icon="icon-time" data-date-icon="icon-calendar">
              	
              </i>
            </span>
        </div>
	</div>
	{!! $errors->first('time', '<small class="help-block">:message</small>') !!}
</div>

<div class="well js_div_phone">
	<label>Durée réelle :</label><br/>
	<div class="input-group mb-3 timepicker {!! $errors->has('duration') ? 'has-error' : '' !!}">
    	<input name="duration" type="text" class="form-control" data-format="hh:mm:ss"  @if(isset($ticket)) value="{{ $ticket->duration }}" @endif>
    	<div class="input-group-append">
        	<span class="add-on input-group-text">
              <i class="fas fa-clock" data-time-icon="icon-time" data-date-icon="icon-calendar">
              	
              </i>
            </span>
        </div>
	</div>
	{!! $errors->first('duration', '<small class="help-block">:message</small>') !!}
</div>

<div class="well js_div_phone">
	<label>Durée facturée :</label><br/>
	<div class="input-group mb-3 timepicker {!! $errors->has('duration_invoice') ? 'has-error' : '' !!}">
    	<input name="duration_invoice" type="text" class="form-control" data-format="hh:mm:ss"  @if(isset($ticket)) value="{{ $ticket->duration_invoice }}" @endif>
    	<div class="input-group-append">
        	<span class="add-on input-group-text">
              <i class="fas fa-clock" data-time-icon="icon-time" data-date-icon="icon-calendar">
              	
              </i>
            </span>
        </div>
	</div>
	{!! $errors->first('duration_invoice', '<small class="help-block">:message</small>') !!}
</div>
<div class="form-group {!! $errors->has('weight') ? 'has-error' : '' !!} js_div_data">
	<label> Volume consommé :</label>
	<input type="number" step="any"  name="weight" class="form-control" @if(isset($ticket)) value="{{ $ticket->weight }}" @endif>
	{!! $errors->first('weight', '<small class="help-block">:message</small>') !!}
</div>
<div class="form-group {!! $errors->has('weight_invoice') ? 'has-error' : '' !!} js_div_data">
	<label>Volume facturée :</label>
	<input type="number" step="any"  name="weight_invoice" class="form-control" @if(isset($ticket)) value="{{ $ticket->weight_invoice }}" @endif>
	{!! $errors->first('weight_invoice', '<small class="help-block">:message</small>') !!}
</div>