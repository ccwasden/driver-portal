@if(count($sents) == 0)
	<p>No sents.</p>
@else
	<table>
		<thead>
			<tr>
				<th>User Id</th>
				<th>Delivery Time</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($sents as $sent)
				<tr>
					<td><a href="{{URL::to('users/view/'.$sent->id)}}">User #{{$sent->user_id}}</a></td>
					<td>{{$sent->delivery_time}}</td>
					<td>
						<a href="{{URL::to('bid/sents/view/'.$sent->id)}}" class="btn">View</a>
						<a href="{{URL::to('bid/sents/edit/'.$sent->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('bid/sents/delete/'.$sent->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('bid/sents/create')}}">Create new Bid Sent</a></p>