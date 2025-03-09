<div>
    <input type="text" wire:model="query" class="form-control" placeholder="Search...">
    
    @if (!empty($query))
        <ul class="list-group mt-2">
            @if ($posts->isNotEmpty())
                <li class="list-group-item active">Posts</li>
                @foreach ($products as $product)
                    <li class="list-group-item">{{ $posts->name }}</li>
                @endforeach
            @endif
            
            @if ($users->isNotEmpty())
                <li class="list-group-item active">Users</li>
                @foreach ($users as $user)
                    <li class="list-group-item">{{ $user->name }}</li>
                @endforeach
            @endif
        </ul>
    @endif
</div>
