@extends("template.app")

@section("title", "Register")

@section("card-title")
<h3 class="text-center mt-3">REGISTER</h3>
@endsection

@section("card-body")
<div class="container">
    <form action="{{ route('registration') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6 mb-2">
                <label for="email">EMAIL</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 mb-2">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 mb-2">
                <label for="gender">GENDER</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">SELECT</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6"></div>
            <div class="col-6 text-right">
                <button type="submit" class="btn btn-success btn-sm">REGISTER</button>
                <a href="/" class="btn btn-secondary btn-sm">BACK</a>
            </div>
            @if(session('flash_message'))
               <div class="text-success m-1">{{ session('flash_message') }}</div>
            @endif
        </div>
    </form>
</div>
@endsection