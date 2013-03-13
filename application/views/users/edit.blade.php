<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users')}}">Users</a> <span class="divider">/</span>
		</li>
		<li class="active">Editing User</li>
	</ul>
</div>

{{Form::open(null, 'post', array('class' => 'form-stacked span16'))}}
	<fieldset>
		<div class="clearfix">
			{{Form::label('username', 'Username')}}

			<div class="input">
				{{Form::text('username', Input::old('username', $user->username), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('password', 'Password')}}

			<div class="input">
				{{Form::text('password', Input::old('password', $user->password), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('foursquare_token', 'Foursquare Token')}}

			<div class="input">
				{{Form::text('foursquare_token', Input::old('foursquare_token', $user->foursquare_token), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('foursquare_id', 'Foursquare Id')}}

			<div class="input">
				{{Form::text('foursquare_id', Input::old('foursquare_id', $user->foursquare_id), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('phone', 'Phone')}}

			<div class="input">
				{{Form::text('phone', Input::old('phone', $user->phone), array('class' => 'span6'))}}
			</div>
		</div>

		<div class="actions">
			{{Form::submit('Save', array('class' => 'btn primary'))}}

			or <a href="{{URL::to(Request::referrer())}}">Cancel</a>
		</div>
	</fieldset>
{{Form::close()}}