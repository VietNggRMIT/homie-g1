<h1>
    {{$heading}} ({{count($listings)}})
</h1>
<hr>
<form>
    
</form>
@foreach ($listings as $listing)

    <h1>Listing name: <a href="/listing/{{$listing->id}}">{{$listing->listing_name}}</a></h1>
    <div {!! $listing->listing_available == 0 ? 'style="opacity: 0.1"' : 'style="opacity: 1"' !!}>
        <div>ID: {{$listing->id}}</div>
        <div>Listing description: {{$listing->listing_description}}</div>
        <div>Listing address: {{$listing->listing_address_subdivision_1 . "-" . $listing->listing_address_subdivision_2}}</div>
        Image: <img src="#">
        <div>Listing price: {{$listing->listing_price}}</div>
        <div>Listing rating: {{$listing->listing_rating}}</div>
        <div>Listing available: {{$listing->listing_available}}</div>
        <div>Created at: {{$listing->created_at}}, Updated at: {{$listing->updated_at}}</div>
        <div>Posted by: <a href="/user/{{$listing->user_id}}"> {{$listing->user_real_name}}</a></div>
    </div>
    <hr>

@endforeach
