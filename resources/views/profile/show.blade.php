@extends('base')

@section('content')


    <div class="w-full items-center justify-center">
        <h1 class=" px-4 py-2  text-white text-xl font-bold bg-slate-700 ">{{  $user->name }}</h1>

        <h2 class=" text-lg px-4 py-2  ">Email: {{ $user->email }}</h2>
        <div class=" bg-gray-700 text-white p-2 ">
            <h2 class=" text-lg ">Posts:</h2>
            <ul>
                @foreach($posts as $post)
                    <a href="/post/{{ $post->id }}"><li class=" bg-blue-300 hover:bg-blue-500 p-2 " >{{ $post->title }}</li></a>
                @endforeach
            </ul>
        </div>
    </div>

@stop