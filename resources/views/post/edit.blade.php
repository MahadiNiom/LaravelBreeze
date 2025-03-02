@extends('base')

@section('content')
    <form action="/post/{{$post->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex grid-cols-10">
            <div class="col-span-2">
                <label for="title">Title</label>
            </div>
            <div class="col-span-8">
                <input required type="text" id="title" name='title' value="{{$post->title}}">
            </div>
            <div class="col-span-2">
                <label for="content">Content</label>
            </div>
            <div class="col-span-8">
                <input  type="text" name="content" id="content" value="{{$post->content}}">
            </div>
            <div class="col-span-2">
                <x-submit-button>Submit</x-submit-button>
            </div>
        </div>
    </form>
@stop