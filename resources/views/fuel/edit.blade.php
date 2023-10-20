@extends('layouts.main_layout')

@section('title')
    Добавление топлива
@endsection
@section('content')
    {{ Breadcrumbs::render() }}

    <div class="mt-3 content-center">
        <div>
            <form class="w-80" action="{{ route('fuels.update', $fuel->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="mb-6 ">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Наименование
                        топлива</label>
                    <input value="{{$fuel->name}}" type="text" id="name" name="name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="наименование" required>
                    @error('name')
                    <div class="mt-1 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                         role="alert">
                        <span class="font-medium">Danger alert!</span> {{$message}}
                    </div>
                    @enderror
                    <label for="total_number" class="mt-2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Общее кол-во(л.)</label>
                    <input value="{{$fuel->total_number}}" type="text" id="total_number" name="total_number"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="общее количество" required>
                    @error('total_number')
                    <div class="mt-1 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                         role="alert">
                        <span class="font-medium">Danger alert!</span> {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Изменить
                </button>
            </form>
        </div>

    </div>

@endsection
