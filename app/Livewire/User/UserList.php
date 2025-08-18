<?php

namespace App\Livewire\User;

use Livewire\Component;

class UserList extends Component
{
    // Это ДИНАМИЧЕСКИЕ свойства
    // назначать свойство можно с типизацией или без нее
    // со значением или без значения по умолчанию
    public string $name = 'John';

    public string $lastName;
    public string $FullName;

    public string $title;
    public string $second_title;

    public array $user_arr= [
        'пользователь 1',
        'пользователь 2',
        'пользователь 3'
        ];

    public string $user_add;

    public function mount($lastName ='данное по умолчанию')
    {
        // тут можно реализовывать прием данных из бд
        $this->lastName = $lastName; 
        $this->FullName = $this->name.'  '.$this->lastName;
    }

    public function add()
    {
        $this->user_arr[] = $this->user_add;
    }

    public function render()
    {
        
        // 'age'=>47 пример передачи статического свойства
        return view('livewire.user.user-list',[
            'age'=>47
          // вариант передачи данных через with  
        ])->with(['doc'=>'Djek','cat'=>'Sneginka']);
    }

    // принципиальная разница в передаче данных
    // свойство - когда планируем менять данные на странице
    // статика - когда просто отображаем данные на странице

}
