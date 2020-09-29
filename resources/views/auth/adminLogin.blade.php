@extends('layouts.webTemplate')

@section('webContent')

    <div id="auth-admin">
        <div class="form">
            <form method="POST" action="{{ route('adminLogin') }}">
                <h2 class="text-center">Admin Login</h2>
                <br>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1"> Email address </label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Type Admin Email..." autocomplete="off" required>
                    @error('email')
                        <small class="form-text text-danger">{{$message }}</small> <!-- message is var in laravel -->
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"> Password </label>
                    <input type="password" class="form-control" name="password" placeholder="Type Password..." autocomplete="off" minlength="8" required>
                    @error('password')
                        <small class="form-text text-danger">{{$message }}</small> <!-- message is var in laravel -->
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
    </div>
    
@endsection