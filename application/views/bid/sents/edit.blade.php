<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users/view/'.$sent->user->id)}}">User</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('bid/sents')}}">Bid Sents</a> <span class="divider">/</span>
		</li>
		<li class="active">Editing Bid Sent</li>
	</ul>
</div>

{{Form::open(null, 'post', array('class' => 'form-stacked span16'))}}
	<fieldset>
		<div class="clearfix">
			{{Form::label('user_id', 'User Id')}}

			<div class="input">
				{{Form::text('user_id', Input::old('user_id', $sent->user_id), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('delivery_time', 'Delivery Time')}}

			<div class="input">
				{{Form::text('delivery_time', Input::old('delivery_time', $sent->delivery_time), array('class' => 'span6'))}}
			</div>
		</div>

		<div class="actions">
			{{Form::submit('Save', array('class' => 'btn primary'))}}

			or <a href="{{URL::to(Request::referrer())}}">Cancel</a>
		</div>
	</fieldset>
{{Form::close()}}