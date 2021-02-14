@extends('layouts.layout')
@section('content')
@if (isset($error))
<h3 class="mt-5" style="color: red">{{$error}}</h3>
@endif
<form action="showuser" method="post" class="col-4 mx-auto border mt-5">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="login">Логин: </label>
        <input type="text" name="login" class="form-control">
    </div>
    <div class="form-group">
        <label for="passw1">Пароль: </label>
        <input type="password" name="passw1" class="form-control">
    </div>
    <div class="form-group">
        <label for="passw2">Повторите пароль: </label>
        <input type="password" name="passw2" class="form-control">
    </div>
    <div class="form-group">
        <label for="age">Возраст: </label>
        <input type="number" name="age" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" name="email" class="form-control">
    </div>
    <input type="submit" name="regbtn" class="btn btn-success container-fluid" value="Регистрация">
</form>
@endsection
