@extends('base')

@section('content')


    <div class=" text-center text-lg font-bold ">{{ $post->title }}</div>
    <div class=" text-center text-lg font-bold ">{{ $post->content }}</div>
    <div class=" text-center text-lg font-bold ">Posted by: <span class="text-gray-700"> {{ $post->user->name }}</span></div>
    <div class=" text-center text-lg font-bold ">Posted at: <span class="text-gray-700"> {{ $post->created_at }}</span></div>
    <div class=" text-center text-lg font-bold ">Updated at: <span class="text-gray-700"> {{ $post->updated_at }}</span></div>
    <div class=" text-center text-lg font-bold ">Image:</div>
    <div class = "flex justify-center">
        <div class="columns-2 p-2 m-2 rounded-md border border-dashed border-gray-950 border-rounded-md">
            @foreach($post->image as $img)
                <a class=" m-2" href="{{$img->path}}"><img class="w-40 p-2 border-2 border-gray-950" src="{{$img->path}}" alt="none"></a>
            @endforeach
        </div>
    </div>

    <div class="flex justify-center">
        
    <div class="columns-1 ">
        @can('edit-post', $post)
        <a href="/post/{{$post->id}}/edit"><button class=" rounded-md bg-gray-700 text-white p-2 m-2 hover:bg-amber-700 ">Edit this post</button></a>
        <form action="/post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <x-danger-button>Delete this Post</x-danger-button>
        </form>
        @endcan

        </div>
    </div>
    
@stop