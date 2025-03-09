<div class=" z-50 absolute w-[40%] ">
@if($results['users']->isNotEmpty())
    <h3 class=" bg-gray-700 text-white ">Users</h3>
    <ul>
        @foreach($results['users'] as $user)
            <a href="/profile/{{ $user->id }}"><li class=" bg-blue-300 hover:bg-blue-500 p-2 " >{{ $user->name }}</li></a>
        @endforeach
    </ul>
@endif

@if($results['posts']->isNotEmpty())
    <h3 class=" bg-gray-700 text-white ">Posts</h3>
    <ul>
        @foreach($results['posts'] as $post)
            <a href="/post/{{ $post->id }}"><li class=" bg-blue-300 hover:bg-blue-500 p-2 " >{{ $post->title }}</li></a>
        @endforeach
    </ul>
@endif

@if($results['users']->isEmpty() && $results['posts']->isEmpty())
    <p class=" bg-gray-300 text-red-500 " >No results found.</p>
@endif
</div>