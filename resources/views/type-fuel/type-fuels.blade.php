@extends('layouts.main_layout')

@section('title')Топливо@endsection

@section('content')
    Все виды топлива
    @foreach($types as $type)
        <div>
            {{$type->id}} {{$type->number_fuel}}
        </div>
    @endforeach
@endsection
