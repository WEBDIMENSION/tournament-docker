<h2>Sponsors</h2>
@foreach($sponsors as $sponsor)
    <div class="card mb-4">
        <img class="card-img-top" src="{{$sponsor['src']}}" alt="{{$sponsor['title']}}">
        <div class="card-body">
           <p class="card-text">{{$sponsor['title']}}</p>
        </div>
    </div>
@endforeach
{{--@foreach($sponsors as $sponsor)--}}
{{--@endforeach--}}
