@extends('base')

@section('content')
    <div class="flex items-center justify-center  h-screen">
        <img class=' max-w-60 sm:max-w-96 border-2 border-gray-950 shadow-lg ' src="{{$image->path}}" alt="">
        <form action="{{$image->id}}" method="POST">
            @csrf
            @method('DELETE')
            <x-danger-button>Delete This image</x-danger-button>
        </form>
    </div>

@stop