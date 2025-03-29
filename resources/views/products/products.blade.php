@extends('components.layouts.app.home-layout')

@section('content')
    <div class="w-full h-full px-5 py-3 box-border">
        <a href="{{ url("/products/create") }}"><button>Create Product</button></a>
    </div>
@endsection