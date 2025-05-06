{{-- $donations variable is passed into this layout --}}

@extends('components.layouts.app.home-layout')
@section('content')
    {{ $donations->links() }}
@endsection