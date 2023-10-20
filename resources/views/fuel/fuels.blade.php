@extends('layouts.main_layout')

@section('title')
    Топливо
@endsection

@section('content')
    {{Breadcrumbs::render()}}
    <div class="text-center mt-3">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Все виды топлива</h5>
        <a href="{{route('fuels.create')}}" class="cursor-pointer focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Добавить</a>
    </div>

    <div class="mt-4 md:grid-cols-3 grid grid-cols-4 gap-4">
        @foreach($fuels as $fuel)
            <div class="text-center">
                <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$fuel->name}}</h5>
                    <a href="{{route('fuels.edit', $fuel->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Изменить</a>
                    <a href="{{route("fuels.show", $fuel->id)}}" class="text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-lime-600 dark:hover:bg-lime-700 focus:outline-none dark:focus:ring-lime-800">Показать</a>
                    <a href="{{route("fuels.confirm", $fuel->id)}}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Удалить</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
