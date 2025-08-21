<div class='col-md-6'>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif        
    <form wire:submit.throttle.2000ms="addUser(' параметр из формы')">        
        <div class='mb-3'>
            <input type='text' name='name' class='form-control @error('form.name') is-invalid @enderror' wire:model.blur='form.name' placeholder='Name'>
            @error('form.name')<div class='inavalid-feedback'> {{ $message }} </div>@enderror
        </div> 
        <div class='mb-3'>
            <input type='text' name='email' class='form-control @error('form.email') is-invalid @enderror' wire:model.blur='form.email' placeholder='Email'>
            @error('form.email')<div class='inavalid-feedback'> {{ $message }} </div>@enderror
        </div> 
        <div class='mb-3'>
            <input type='text' name='password' class='form-control @error('form.password') is-invalid @enderror' wire:model.blur='form.password' placeholder='Password'>
            @error('form.password')<div class='inavalid-feedback'> {{ $message }} </div>@enderror
        </div> 
            <button type="submit" class='btn btn-primary my-2' >Add User</button> 
        <div wire:loading wire:target='addUser' class="spinner-border text-danger" role="status">  
            <span class="visually-hidden">Loading...</span>
        </div> 
    </form>     
            <button  wire:click="$refresh" class='btn btn-success my-2'  >refresh</button> 
        <div wire:loading class="spinner-border text-danger" role="status">  
            <span class="visually-hidden">Loading...</span>
        </div> 
</div>
