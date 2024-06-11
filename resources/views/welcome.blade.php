@extends("template.app")

@section("title", "Welcome")

@section("card-title")
<h5 class="text-success text-center mt-3">
    @if(session('flash_message'))
      {{ session('flash_message') }}
    @endif
</h5>
@endsection

@section("card-body")
<div class="container">
    <h1 class="text-primary text-center">WELCOME BUDDY</h1>
</div>
@endsection