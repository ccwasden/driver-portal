<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users')}}">Users</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing User</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>Username:</strong>
	{{$user->username}}
</p>
<p>
	<strong>Password:</strong>
	{{$user->password}}
</p>
<p>
	<strong>Foursquare token:</strong>
	{{$user->foursquare_token}}
</p>
<p>
	<strong>Foursquare id:</strong>
	{{$user->foursquare_id}}
</p>
<p>
	<strong>Phone:</strong>
	{{$user->phone}}
</p>

<p><a href="{{URL::to('users/edit/'.$user->id)}}" class="btn">Edit</a> <a href="{{URL::to('users/delete/'.$user->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
<h2>Text Sents</h2>

@if(count($user->text_sents) == 0)
	<p>No text sents.</p>
@else
	<table>
		<thead>
			<th></th>
		</thead>

		<tbody>
			@foreach($user->text_sents as $text_sent)
				<tr>
					<td><a href="{{URL::to('text/sents/view/'.$text_sent->id)}}">View</a> <a href="{{URL::to('text/sents/edit/'.$text_sent->id)}}">Edit</a> <a href="{{URL::to('text/sents/delete/'.$text_sent->id)}}">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('text/sents/create/'.$user->id)}}">Create new text sent</a></p>
<h2>Text Receiveds</h2>

@if(count($user->text_receiveds) == 0)
	<p>No text receiveds.</p>
@else
	<table>
		<thead>
			<th></th>
		</thead>

		<tbody>
			@foreach($user->text_receiveds as $text_received)
				<tr>
					<td><a href="{{URL::to('text/receiveds/view/'.$text_received->id)}}">View</a> <a href="{{URL::to('text/receiveds/edit/'.$text_received->id)}}">Edit</a> <a href="{{URL::to('text/receiveds/delete/'.$text_received->id)}}">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('text/receiveds/create/'.$user->id)}}">Create new text received</a></p>
<h2>Deliveryreq Receieveds</h2>

@if(count($user->deliveryreq_receieveds) == 0)
	<p>No deliveryreq receieveds.</p>
@else
	<table>
		<thead>
			<th></th>
		</thead>

		<tbody>
			@foreach($user->deliveryreq_receieveds as $deliveryreq_receieved)
				<tr>
					<td><a href="{{URL::to('deliveryreq/receieveds/view/'.$deliveryreq_receieved->id)}}">View</a> <a href="{{URL::to('deliveryreq/receieveds/edit/'.$deliveryreq_receieved->id)}}">Edit</a> <a href="{{URL::to('deliveryreq/receieveds/delete/'.$deliveryreq_receieved->id)}}">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('deliveryreq/receieveds/create/'.$user->id)}}">Create new deliveryreq receieved</a></p>
<h2>Bid Sents</h2>

@if(count($user->bid_sents) == 0)
	<p>No bid sents.</p>
@else
	<table>
		<thead>
			<th></th>
		</thead>

		<tbody>
			@foreach($user->bid_sents as $bid_sent)
				<tr>
					<td><a href="{{URL::to('bid/sents/view/'.$bid_sent->id)}}">View</a> <a href="{{URL::to('bid/sents/edit/'.$bid_sent->id)}}">Edit</a> <a href="{{URL::to('bid/sents/delete/'.$bid_sent->id)}}">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('bid/sents/create/'.$user->id)}}">Create new bid sent</a></p>
