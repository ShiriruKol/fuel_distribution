@extends('layouts.main_layout')

@section('title')
    Удаление: {{$fuel->name}}
@endsection
@section('content')
    {{ Breadcrumbs::render() }}
    <h5 class=" text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Вы действительно хотите удалить: {{$fuel->name}}</h5>
    <div class="text-center">
        <form action="{{route('fuels.destroy', $fuel)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Да</button>
            <a href="{{route('fuels.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Нет</a>
        </form>

    </div>
@endsection
