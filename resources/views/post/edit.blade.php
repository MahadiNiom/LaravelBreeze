@extends('base')

@section('content')
<div class="flex items-center justify-center">
    <form action="/post/{{$post->id}}" method="POST">
        @csrf
        @method('PATCH')
        <h2 class="text-xl font-semibold mb-4">Submit Your Content</h2>
        
        <label class="block mb-2 text-gray-700">Title</label>
        <input required value="{{ $post->title }}" type="text" name="title" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Enter title">
        
        <label class="block mt-4 mb-2 text-gray-700">Content</label>
        <textarea value="{{ $post->content }}" name="content" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none" rows="4" placeholder="Enter content"></textarea>
   
        <label class="block mb-2 text-gray-700">Image url(Seperate with comma for multiple url upload)</label>
        <input multiple type="text" name="path" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Enter title">
        
        <x-primary-button>Submit</x-primary-button>
    </form>

</div>
<div class=" flex justify-center ">    
    <div class=" columns-2 p-2 m-2 border border-gray-300 rounded-md">
        @foreach($post->image as $image)
            <a class='m-2 ' href="{{ $image->id }}"><img class="size-40 border-2 border-gray-950 shadow-md" src="{{$image->path}}" alt=""></a>
        @endforeach
    </div>
</div>

@stop