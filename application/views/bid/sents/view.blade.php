<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users/view/'.$sent->user->id)}}">User</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('bid/sents')}}">Bid Sents</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Bid Sent</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>User id:</strong>
	{{$sent->user_id}}
</p>
<p>
	<strong>Delivery time:</strong>
	{{$sent->delivery_time}}
</p>

<p><a href="{{URL::to('bid/sents/edit/'.$sent->id)}}" class="btn">Edit</a> <a href="{{URL::to('bid/sents/delete/'.$sent->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
