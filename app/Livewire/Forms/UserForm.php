<?php

namespace App\Livewire\Forms;


use Livewire\Attributes\Validate;
use Livewire\Form;

use App\Models\User;

class UserForm extends Form
{
    // вариант с отделным сообщением на каждую проверку
    #[Validate('required', message: 'Имя обязательно')]
    #[Validate('min:3', message: 'Имя не менее 3 букв')]
    #[Validate('max:300', message: 'Имя не более 300 букв')]
    public string $name = '';

    #[Validate('required|email|max:30')]
    public string $email = '';

    #[Validate('required|min:6')]
    public string $password = '';

    public function saveUser()
    {
        $validated = $this->validate();
        // получаем данные о созданном пользователе $user
        $user = User::create($validated);
        $this->reset();
        session()->flash('success','пользователь успешно создан');
        return $user;
    }



}
