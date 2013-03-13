<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users/view/'.$received->user->id)}}">User</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('deliveryreq/receiveds')}}">Deliveryreq Receiveds</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Deliveryreq Received</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>User id:</strong>
	{{$received->user_id}}
</p>
<p>
	<strong>Esl:</strong>
	{{$received->esl}}
</p>
<p>
	<strong>Store lat:</strong>
	{{$received->store_lat}}
</p>
<p>
	<strong>Store lng:</strong>
	{{$received->store_lng}}
</p>
<p>
	<strong>Delivery time:</strong>
	{{$received->delivery_time}}
</p>
<p>
	<strong>Pickup time:</strong>
	{{$received->pickup_time}}
</p>
<p>
	<strong>Name:</strong>
	{{$received->name}}
</p>

<p><a href="{{URL::to('deliveryreq/receiveds/edit/'.$received->id)}}" class="btn">Edit</a> <a href="{{URL::to('deliveryreq/receiveds/delete/'.$received->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
