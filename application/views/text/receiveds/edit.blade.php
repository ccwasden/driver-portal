<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users/view/'.$received->user->id)}}">User</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('text/receiveds')}}">Text Receiveds</a> <span class="divider">/</span>
		</li>
		<li class="active">Editing Text Received</li>
	</ul>
</div>

{{Form::open(null, 'post', array('class' => 'form-stacked span16'))}}
	<fieldset>
		<div class="clearfix">
			{{Form::label('user_id', 'User Id')}}

			<div class="input">
				{{Form::text('user_id', Input::old('user_id', $received->user_id), array('class' => 'span6'))}}
			</div>
		</div>
		<div class="clearfix">
			{{Form::label('content', 'Content')}}

			<div class="input">
				{{Form::text('content', Input::old('content', $received->content), array('class' => 'span6'))}}
			</div>
		</div>

		<div class="actions">
			{{Form::submit('Save', array('class' => 'btn primary'))}}

			or <a href="{{URL::to(Request::referrer())}}">Cancel</a>
		</div>
	</fieldset>
{{Form::close()}}