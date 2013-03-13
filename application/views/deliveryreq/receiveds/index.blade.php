@if(count($receiveds) == 0)
	<p>No receiveds.</p>
@else
	<table>
		<thead>
			<tr>
				<th>User Id</th>
				<th>Esl</th>
				<th>Store Lat</th>
				<th>Store Lng</th>
				<th>Delivery Time</th>
				<th>Pickup Time</th>
				<th>Name</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($receiveds as $received)
				<tr>
					<td><a href="{{URL::to('users/view/'.$received->id)}}">User #{{$received->user_id}}</a></td>
					<td>{{$received->esl}}</td>
					<td>{{$received->store_lat}}</td>
					<td>{{$received->store_lng}}</td>
					<td>{{$received->delivery_time}}</td>
					<td>{{$received->pickup_time}}</td>
					<td>{{$received->name}}</td>
					<td>
						<a href="{{URL::to('deliveryreq/receiveds/view/'.$received->id)}}" class="btn">View</a>
						<a href="{{URL::to('deliveryreq/receiveds/edit/'.$received->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('deliveryreq/receiveds/delete/'.$received->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('deliveryreq/receiveds/create')}}">Create new Deliveryreq Received</a></p>