<?php

namespace App\Livewire\Action;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On; 

use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;


class ActionsExample extends Component
{
    // подключаем трейт пагинации
    // По умолчанию пагинатор Livewire отслеживает текущую страницу 
    // в строке запроса URL-адреса браузера следующим образом: ?page=2.
    // убрать это можно добавив , WithoutUrlPagination
    use WithPagination;



    public function deleteUser( int $id)
    {
        User::find($id)->delete();
    }
    
    // этот метод срабатывает при событии post-created
    #[On('post-created')] 
    public function updataUserList($user = null)
    {
       //dump($user);
       // здесь можно выполнять дополнительную логику
    }

    public function render($user = null)
    {
        return view('livewire.action.actions-example',[
            // добавляем сортировку списка новые вверху
            'users'=> User::query()->orderBy('id','desc')->paginate(10),
        ]);
    }
}
