<button type="button" class="btn btn-primary"><a href="/">Go back to all listings</a></button>

<hr>

{{-- <div>ID: {{$user['id']}}</div>
<div>User description: {{$user'user_description']}}</div>
<div>User real name: {{$user['user_real_name']}}</div>
<div>User password: {{$user['user_password']}}</div>
<div>User contact: {{$user['user_phone_number'] . "-" . $user['user_email_address']}}</div>
<div>Created at: {{$user['created_at']}}, Updated at: {{$user['updated_at']}}</div> --}}

<div>ID: {{$user->id}}</div>
<div>User description: {{$user->user_description}}</div>
<div>User real name: {{$user->user_real_name}}</div>
<div>User password: {{$user->user_password}}</div>
<div>User contact: {{$user->user_phone_number . "-" . $user->user_email_address}}</div>
<div>Created at: {{$user->created_at}}, Updated at: {{$user->updated_at}}</div><br>

<div>Available listings:<div>
    @foreach ($listings as $listing)
        <div><a href="{{ route('listings.show', ['listing' => $listing->id]) }}">{{$listing->listing_name}}</a><div>
    @endforeach