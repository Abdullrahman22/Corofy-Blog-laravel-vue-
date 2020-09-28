@extends('layouts.webTemplate')

@section('webContent')

    <form method="POST" action="{{ route('adminLogin') }}">
        
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Email address </label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Type Enter email..." autocomplete="off">
            @error('email')
                <small class="form-text text-danger">{{$message }}</small> <!-- message is var in laravel -->
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"> Password </label>
            <input type="password" class="form-control" name="password" placeholder="Type Password..." autocomplete="off" >
            @error('password')
                <small class="form-text text-danger">{{$message }}</small> <!-- message is var in laravel -->
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>
    
@endsection