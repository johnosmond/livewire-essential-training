<div>
    <form wire:submit="search">
        <input type="text" wire:model.live="query" />
    </form>
    <div>@error('query'){{ $message }}@enderror</div>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>

    {{ $users->links() }}
</div>
