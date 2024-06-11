@extends("template.app")

@section("title", "Login")

@section("card-title")
<h3 class="text-center mt-3">LOGIN</h3>
@endsection

@section("card-body")
<div class="container">
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6 mb-2">
                <label for="email">EMAIL</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="username" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 mb-2">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-success btn-sm">LOGIN</button>
                <a href="/register" class="btn btn-secondary btn-sm">REGISTER</a>
            </div>
        </div>
    </form>
</div>
@endsection