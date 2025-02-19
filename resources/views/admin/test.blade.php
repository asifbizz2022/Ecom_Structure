@extends('admin.layout._main')
@section('content')
{{ auth()->guard('admin')->user()->name }}
@endsection