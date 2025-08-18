<?php

namespace App\Livewire\Action;

use Livewire\Attributes\Validate;
use App\Models\User;
use Livewire\Component;


class ActionsExample extends Component
{
    // public string $username;
    // public array $users = [];

    // вариант с отделным сообщением на каждую проверку
    #[Validate('required', message: 'Имя обязательно')]
    #[Validate('min:3', message: 'Имя не менее 3 букв')]
    #[Validate('max:300', message: 'Имя не более 300 букв')]
    public string $name;

    #[Validate('required|email|max:30')]
    public string $email;

    #[Validate('required|min:6')]
    public string $password;

    public function addUser($param)
    {
        //dd($this->all()); //метод all для принятия всех данных формы
        //dd($this->only(['name','email'])); //метод only по аналогии
        //dump($this->pull(['name','email'])); // pull принимает и очищает форму
        // $validated = $this->validate([ 
        //     'name' => 'required|min:3|max:300',
        //     'email' => 'required|email|max:30',
        //     'password' => 'required|min:6'
        // ]);

        //dd($validated);

        // пример для отладки покажет на экране ответ от запроса
        //dd('clicked');

        //заполняем массив users[] пришедшим username
        // $this->users[] = $this->username . $param;

        // //пример сброса свойств, очищаем input после клика по button
        //  $this->username = ''; 
        // или возврат в исходное состояние 

        // User::create([
        //     'name'=>$this->name,
        //     'email'=>$this->email,
        //     'password'=>$this->password,

        // ]);

        $validated = $this->validate();
        //dd($validated);


        //в место кода выше подставляем данные из валидации
        User::create($validated);
        $this->reset();// вариант сброса без параметров сброситься все
        //$this->reset('name','email','password');
    }

    public function deleteUser( int $id)
    {
        User::find($id)->delete();
    }
    public function render()
    {
        return view('livewire.action.actions-example',[
            'users'=>User::all(),
        ]);
    }
}
