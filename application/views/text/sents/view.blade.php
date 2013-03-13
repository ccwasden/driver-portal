<div class="span16">
	<ul class="breadcrumb span6">
		<li>
			<a href="{{URL::to('users/view/'.$sent->user->id)}}">User</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="{{URL::to('text/sents')}}">Text Sents</a> <span class="divider">/</span>
		</li>
		<li class="active">Viewing Text Sent</li>
	</ul>
</div>

<div class="span16">
<p>
	<strong>User id:</strong>
	{{$sent->user_id}}
</p>
<p>
	<strong>Content:</strong>
	{{$sent->content}}
</p>

<p><a href="{{URL::to('text/sents/edit/'.$sent->id)}}" class="btn">Edit</a> <a href="{{URL::to('text/sents/delete/'.$sent->id)}}" class="btn danger" onclick="return confirm('Are you sure?')">Delete</a></p>
