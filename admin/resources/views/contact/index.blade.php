@extends('admin.admin_template')
@section('content')

@if($message=Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
@endif
<div id="div_form">
        <form method="get" action="/contactsearch">
            <input type="search" name="search" class="form-control" id="search"> 
            <button type="submit" id="btnSearch" class="btn btn-primary"  >Search</button>
        </form>
    </div>
<div class="table_div">
	<table class="table table-bordered" style="width: 100%">
		<tr>
			<th> Id</th>
			<th>UserName</th>
			<th>Email</th>
			<th>Contact</th>
			<th>message</th>
			<th>Admin Note</th>
		</tr>
		@foreach($contact_details as $contact)
			<tr>
				<td>{{$contact->id}}</td>
				<td>{{$contact->name}}</td>
				<td>{{$contact->email}}</td>
				<td>{{$contact->contact_no}}</td>
				<td>{{$contact->message}}</td>
				<td>{{$contact->note_admin}}</td>
			</tr>
		@endforeach
	</table>
	{!! $contact_details->links() !!}
@endsection
