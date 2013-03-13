<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users/view/'.$received->user->id)}}">User</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('text/receiveds')}}">Text Receiveds</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Text Received</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>User id:</strong>
	{{$received->user_id}}
</p>
<p>
	<strong>Content:</strong>
	{{$received->content}}
</p>

<p><a href="{{URL::to('text/receiveds/edit/'.$received->id)}}" class="btn">Edit</a> <a href="{{URL::to('text/receiveds/delete/'.$received->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
