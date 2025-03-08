@extends('base')

@section('content')

    <div class="w-full bg-yellow-300">
         
        <h1 class=" p-2 text-lg font-semibold mx-auto">Post</h1>
        <div class=" p-2"><a href="post/create"><x-secondary-button>Create Post</x-secondary-button></a>
        </div>
    </div>
    <div class="w-full bg-emerald-300 p-3 flex items-center justify-center">
    <div class=" columns-1 sm:grid-cols-4 sm:grid ">
    @foreach($posts as $post)
    <a href="post/{{$post->id}}">
    <div class="bg-blue-500 w-40 h-60 m-3 rounded-md ">
        <div  class='w-full rounded-t-md h-[70%] bg-red-400'><img class='w-full rounded-t-md h-full' src="{{ $post->image[0]->path}}" alt="{{$post->content}}"> </div>
        <div class=" text-white text-center font-bold">{{$post->title}}</div>
        <div class=" text-white text-center ">Posted by: <span class="text-gray-300"> {{ $post->user->name }}</span></div>
    </div></a>
    @endforeach
    </div>
    </div>

@stop