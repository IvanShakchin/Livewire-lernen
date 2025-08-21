<div class='col-md-8'>
    <ul> 
        @forelse($users as $user)
            <li wire:key="{{ $user->id }}" wire:transition>{{ $user->name }} ({{ $user->email }}) | <a href='#' wire:click.prevent='deleteUser({{ $user->id }})' wire:confirm='Вы уверены?'>Delete</a></li>
        @empty
            <p>Таблица users пуста ...</p>
        @endforelse
    </ul>
    {{-- обращаемся к колекции $users и вызываем метод links --}}
    {{-- отмена скрола (data: ['scrollTo' => false]) --}}
    {{-- 'vendor.livewire.my-bootstrap' - подключение своего шаблона --}}
    {{ $users->links('vendor.livewire.my-bootstrap',data: ['scrollTo' => false]) }}
    {{-- В качестве альтернативы вы можете указать любой CSS-селектор в параметре scrollTo, --}}
    {{-- и Livewire найдет ближайший элемент, соответствующий этому селектору, 
    и будет прокручивать страницу до него после каждой навигации: --}}

    {{-- для больших списков можно использовать cursorPaginate --}}
</div>
