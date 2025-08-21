<div class='col-md-6'>
    <ul> 
        @forelse($users as $user)
            <li wire:key="{{ $user->id }}" wire:transition>{{ $user->name }} ({{ $user->email }}) | <a href='#' wire:click.prevent='deleteUser({{ $user->id }})' wire:confirm='Вы уверены?'>Delete</a></li>
        @empty
            <p>Таблица users пуста ...</p>
        @endforelse
    </ul>
</div>
