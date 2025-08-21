<?php

namespace App\Livewire\Action;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\User;

use App\Livewire\Forms\UserForm;


class UserCreate extends Component
{
    public UserForm $form;

    public function addUser()
    {
        $user = $this->form->saveUser();
        // при вызове метода dispatch() будет отправлено событие post-created, 
        // и все остальные компоненты на странице, которые прослушивают это событие, 
        // получат уведомление.
        // можем передать дополнительные данные вместе с событием, $user
        // dump($user);
        $this->dispatch('post-created', $user);
    }

    public function render()
    {
        return view('livewire.action.user-create');
    }
}
