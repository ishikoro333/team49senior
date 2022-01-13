@extends('includes.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header text-center">
                <h3 class="card-text">{{ config('const.title.acount', 'acount') }}</h3>
            </div>
            @if ( $errors -> any() )
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                    <div class="form-group mt-2 mb-2">
                        <label for="name">{{ config('const.user.name', 'name') }}</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="email">{{ config('const.user.email', 'email') }}</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label for="password">{{ config('const.user.new_password', 'new_password') }}</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    @if ((Auth::user()->id == $user -> id) && $user -> manager_flg == 1)
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="manager_flg" value=1 checked name="manager_flg">
                        <label class="form-check-label" for="manager_flg">{{ config('const.user.manager', 'manager') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="remove_manager_flg" value=0 name="manager_flg">
                        <label class="form-check-label" for="remove_manager_flg">{{ config('const.user.remove_manager', 'remove_manager') }}</label>
                    </div>
                    @endif
                    @if ((Auth::user()->id == $user -> id) && $user -> manager_flg == 0)
                        <input type="hidden" class="form-check-input" id="manager_flg" value=0 name="manager_flg">
                        <label class="form-check-label" for="manager_flg"></label>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="add_manager_flg" value=1 name="manager_flg">
                        <label class="form-check-label" for="add_manager_flg">{{ config('const.user.manager', 'manager') }}</label>
                    </div>
                    @endif
                    @if(Auth::user()->id !== $user -> id)
                    <div class="mb-2">
                        <input type="hidden" class="form-check-input" id="manager_flg" value="{{ $user->manager_flg }}" name="manager_flg">
                    </div>
                        @endif
                    <div class="mb-2">
                        <button class="btn btn-outline-primary" type="submit">{{ config('const.button.update', 'update') }}</button>
                    </div>
                </form>
                <div class="form-group">
                    <form action="{{ route('users.destroy', $user->id) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="{{ config('const.button.delete', 'delete') }}" class="btn btn-outline-danger" onclick="{{ config('const.message.delete') }}">
                    </form>
                </div>

                <div class="border-bottom mt-2 mb-2"></div>
                @if(Auth::user()->manager_flg == 1)
                    <div class="">
                        <a href="{{ route('seniorList.index', $user->id) }}" class="btn btn-sm btn-outline-dark mt-2 ml-4">{{ config('const.button.senior') }}</a>
                    </div>
                @endif
                        <a href="{{ route('seniorList.index') }}" class="form-group btn btn-sm btn-outline-dark mt-2 ml-4">{{ config('const.button.back') }}</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
