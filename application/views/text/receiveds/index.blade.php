@if(count($receiveds) == 0)
	<p>No receiveds.</p>
@else
	<table>
		<thead>
			<tr>
				<th>User Id</th>
				<th>Content</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			@foreach($receiveds as $received)
				<tr>
					<td><a href="{{URL::to('users/view/'.$received->id)}}">User #{{$received->user_id}}</a></td>
					<td>{{$received->content}}</td>
					<td>
						<a href="{{URL::to('text/receiveds/view/'.$received->id)}}" class="btn">View</a>
						<a href="{{URL::to('text/receiveds/edit/'.$received->id)}}" class="btn">Edit</a>
						<a href="{{URL::to('text/receiveds/delete/'.$received->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<p><a class="btn success" href="{{URL::to('text/receiveds/create')}}">Create new Text Received</a></p>