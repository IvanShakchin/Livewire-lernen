{{-- Обязателен корневой элемент --}}
<div>
    
    <h1>Список пользователей</h1>
    <p>{{ $title }}</p> 
    <p>{{ $second_title }}</p>
    {{-- способ простомтра значения на странице --}}
    @dump($name)
    <input type='text' placeholder='Noting...' wire:model.live='name'>
    <input type='text' placeholder='Noting...' wire:model.live='age'>
    <input type='text' placeholder='Noting...' wire:model.live='doc'>
    <input type='text' placeholder='Noting...' wire:model.live='cat'>
    <p>Name: {{ $name }}</p>
    <p>lastName: {{ $lastName }}</p>
    <p>FullName: {{ $FullName }}</p>
    <p>Age: {{ $age }}</p>
    <p>Doc: {{ $doc }}</p>
    <p>Cat: {{ $cat }}</p>

    <div class='input-group mb-3'>
      <input type='text' class='form-control' wire:model='user_add'>  
      <button class='btn btn-primary' wire:click='add'>Add user</button>
    </div>

    <ul>
        @foreach($user_arr as $user)
            <li>{{ $user }}</li>  
        @endforeach
    </ul>


</div>
