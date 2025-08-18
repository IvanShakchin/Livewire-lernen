<div class='row'>
    <div class='col-md-6'>
         {{-- wire:keydown.enter='addUser' - возможность отправлять данное кнопкой ентер --}}
         {{-- есть список всех доступных модификаторов клавиш в доках --}}
        {{-- <input type='text' class='form-control' wire:model='username' wire:keydown.enter='addUser'>
        <button type="button" wire:click="addUser" class='btn btn-primary my-2'>Add User</button>   --}}
    </div>

     {{-- .throttle.2000 - Ограничьте время работы обработчика --}}
    <form wire:submit.throttle.2000ms="addUser(' параметр из формы')">
    
        <div class='mb-3'>
            <input type='text' name='name' class='form-control @error('name') is-invalid @enderror' wire:model.blur='name' placeholder='Name'>
            @error('name')<div class='inavalid-feedback'> {{ $message }} </div>@enderror
        </div> 
        <div class='mb-3'>
            <input type='text' name='email' class='form-control @error('email') is-invalid @enderror' wire:model.blur='email' placeholder='Email'>
            @error('email')<div class='inavalid-feedback'> {{ $message }} </div>@enderror
        </div> 
        <div class='mb-3'>
            <input type='text' name='password' class='form-control @error('password') is-invalid @enderror' wire:model.blur='password' placeholder='Password'>
            @error('password')<div class='inavalid-feedback'> {{ $message }} </div>@enderror
        </div> 
        <button type="submit" class='btn btn-primary my-2' >Add User</button> 

        {{-- wire:loading - индикаторами загрузки: --}}
        {{-- wire:target='addUser' - таргетирует срабатывание лоадера на нужное событие --}}
        <div wire:loading wire:target='addUser' class="spinner-border text-danger" role="status">  
            <span class="visually-hidden">Loading...</span>
        </div> 

    </form>
    <div class='col-md-6'>
        <ul>       

            @forelse($users as $user)
            {{-- wire:key="{{ $user->id }}" добавляем для правильной сортировки списков --}}
            {{-- простой лоадер добавлил из ботстрапа https://getbootstrap.com/docs/5.3/components/spinners/#border-spinner --}}
            {{-- prevent - отменяет дефолтное срабатывание ссылки --}}
            {{-- wire:transition - анимация для элемента    --}}
                <li wire:key="{{ $user->id }}" wire:transition>{{ $user->name }} ({{ $user->email }}) | <a href='#' wire:click.prevent='deleteUser({{ $user->id }})' wire:confirm='Вы уверены?'>Delete</a></li>
            @empty
                <p>Таблица users пуста ...</p>
            @endforelse
        </ul>
    </div> 

    <div>
        {{--Пример Магические экшены --}}
        {{-- «обновление» компонента. Например, если у вас есть компонент, 
        проверяющий статус чего-либо в базе данных, вы можете показать пользователям 
        кнопку, позволяющую обновить отображаемые результаты. --}}
        <button  wire:click="$refresh" class='btn btn-success my-2'  >refresh</button> 
        <div wire:loading class="spinner-border text-danger" role="status">  
            <span class="visually-hidden">Loading...</span>
        </div> 
    </div>

</div>
