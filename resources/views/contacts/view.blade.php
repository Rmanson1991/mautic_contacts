@extends('layouts.app')
@section('content')
        <div class="container">
          <h2 id="contacts-heading">Contact - {{$contact['First Name']}} {{$contact['Last Name']}}</h2>
            <ul class="contact-details-list" id="contacts-list">
              @foreach($contact as $key => $value)
                <li class="contact-details-list-item">
                  <span class="key-span">{{$key}}: </span><span class="value-span">{{$value}}</span>
                </li>
              @endforeach
            </ul>
        </div>
@endsection
