<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users')}}">Users</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('deliveryreq/receiveds')}}">Deliveryreq Receiveds</a> <span class="divider">/</span>
		</li>
		<li class="active">New Deliveryreq Received</li>
	</ul>
</div>

{{Form::open(null, 'post', array('class' => 'form-stacked span16'))}}
	<fieldset>
		<div class="clearfix">
			{{Form::label('user_id', 'User Id')}}

			<div class="input">
				{{Form::text('user_id', Input::old('user_id', $user_id), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('esl', 'Esl')}}

			<div class="input">
				{{Form::text('esl', Input::old('esl'), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('store_lat', 'Store Lat')}}

			<div class="input">
				{{Form::text('store_lat', Input::old('store_lat'), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('store_lng', 'Store Lng')}}

			<div class="input">
				{{Form::text('store_lng', Input::old('store_lng'), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('delivery_time', 'Delivery Time')}}

			<div class="input">
				{{Form::text('delivery_time', Input::old('delivery_time'), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('pickup_time', 'Pickup Time')}}

			<div class="input">
				{{Form::text('pickup_time', Input::old('pickup_time'), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('name', 'Name')}}

			<div class="input">
				{{Form::text('name', Input::old('name'), array('class' => 'span6'))}}
			</div>
		</div>

		<div class="actions">
			{{Form::submit('Save', array('class' => 'btn primary'))}}

			or <a href="{{URL::to(Request::referrer())}}">Cancel</a>
		</div>
	</fieldset>
{{Form::close()}}