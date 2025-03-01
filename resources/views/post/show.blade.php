@extends('base')

@section('content')
    <div>{{ $post->title }}</div>
    @can('edit-post', $post)
    <a href="/post/{{$post->id}}/edit">Edit</a>
    <form action="/post/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <x-danger-button>Delete this Post</x-danger-button>
    </form>
    @endcan

@stop