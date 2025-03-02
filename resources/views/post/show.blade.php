@extends('base')

@section('content')
    <div>{{ $post->title }}</div>
    @foreach($post->image as $img)
        <div class="grid grid-cols-5">
            <img class="w-40" src="{{$img->path}}" alt="">
        </div>
    @endforeach

    
    @can('edit-post', $post)
    <a href="/post/{{$post->id}}/edit">Edit</a>
    <form action="/post/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <x-danger-button>Delete this Post</x-danger-button>
    </form>
    @endcan

@stop