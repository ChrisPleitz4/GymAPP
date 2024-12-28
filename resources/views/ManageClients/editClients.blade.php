@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))

@section('content')
    <h1>Modificar membresía, {{ Auth::user()->role->name }}!,{{Auth::user()->name}}</h1>
@endsection