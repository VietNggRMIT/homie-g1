<h1>
    Image rows: ({{count($images)}})
</h1>
<hr>

@foreach ($images as $image)

    <div>id (PRIMARY KEY): {{$image['id']}}</div>
    <div style="display: flex; flex-direction: row; align-items: center">image_path:
        <img width="50" src="{{ asset('images/' . $image['image_path']) }}">
    </div>
    <div style="margin-bottom: 2em;">listing_id (FOREIGN KEY): {{ $image['listing_id'] }}</div>

@endforeach
