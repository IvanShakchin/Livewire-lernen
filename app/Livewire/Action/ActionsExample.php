<?php

namespace App\Livewire\Action;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On; 

use App\Livewire\Forms\UserForm;

class ActionsExample extends Component
{
    public UserForm $form;

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
            'users'=> User::query()->orderBy('id','desc')->get(),
        ]);
    }
}
