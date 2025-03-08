@extends('base')

@section('content')

    <div class="flex items-center justify-center">
    <form action="/post" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg w-full">
        @csrf
        <h2 class="text-xl font-semibold mb-4">Submit Your Content</h2>
        
        <label class="block mb-2 text-gray-700">Title</label>
        <input required type="text" name="title" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Enter title">
        
        <label class="block mt-4 mb-2 text-gray-700">Content</label>
        <textarea value="" name="content" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none" rows="4" placeholder="Enter content"></textarea>
   
        <label class="block mb-2 text-gray-700">Image url(Seperate with comma for multiple url upload)</label>
        <input multiple type="text" name="path" class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Enter title">
        
        <x-primary-button>Submit</x-primary-button>
        </form>
    </div>

    
<!--    <form action="/post" method="POST">
        @csrf
        <div class="flex grid-cols-10 w-full h-auto">
            <div class="col-span-2">
                <label for="title">Title</label>
            </div>
            <div class="col-span-8">
                <input type="text" id="title" name='title' required>
            </div>
            <div class="col-span-2 ">
                <label for="content">Content</label>
            </div>
            <div class="col-span-8 ">
                <input type="text" name="content" id="content" required>
            </div>
            <div class="col-span-2">
                <x-submit-button>Submit</x-submit-button>
            </div>
        </div>
    </form>       -->
@stop