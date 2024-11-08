@extends('autentication')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<a href="{{ route('home') }}">Login</a>


<h2>Login</h2>

@if (session()->has('success'))
    {{ session()->get('success') }}
@endif 

@if (auth()->check())
    Você entrou  {{ auth()->user()->firstname }}  <a href="{{ route('login.destroy') }}">Sair</a>
@else
<form action="{{ route('login.store') }}" method="POST">
    @csrf
    <input type="text" name="email">
    @error('email')
        <span>
            {{ $message }}
        </span>
    @enderror
    <input type="password" name="password">
    @error('password')
    <span>
        {{ $message }}
    </span>
    @enderror
    <button type="submit">Entrar</button>
</form>
@endif
@error('Error')
    <span>
        {{ $message }}
    </span>
@enderror 



@endsection