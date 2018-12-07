@extends('layouts.app')
@section('content')
        <div class="container">
        	<h2 id="contacts-heading">Contacts</h2>
            @foreach($contact_lists as $contact_list)
                <div class="contact-list">
                	<ul class="list-group">
                		<a href="{{ url('/contacts/view/' . $contact_list['id']) }}">
                			<li class="list-group-item">{{$contact_list['name']}}</li>
                		</a>
                	</ul>
                </div>
            @endforeach
        </div>
@endsection