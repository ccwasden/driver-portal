@if(count($users) == 0)
	<p>No users.</p>
@else
	<table>
		<thead>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Foursquare Token</th>
				<th>Foursquare Id</th>
				<th>Phone</th>
				<th>Text Sents</th>
				<th>Text Receiveds</th>
				<th>Deliveryreq Receieveds</th>
				<th>Bid Sents</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->username}}</td>
					<td>{{$user->password}}</td>
					<td>{{$user->foursquare_token}}</td>
					<td>{{$user->foursquare_id}}</td>
					<td>{{$user->phone}}</td>
					<td>{{count($user->text_sents)}}</td>
					<td>{{count($user->text_receiveds)}}</td>
					<td>{{count($user->deliveryreq_receieveds)}}</td>
					<td>{{count($user->bid_sents)}}</td>
					<td>
						<a href="{{URL::to('users/view/'.$user->id)}}" class="btn">View</a>
						<a href="{{URL::to('users/edit/'.$user->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('users/delete/'.$user->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('users/create')}}">Create new User</a></p>