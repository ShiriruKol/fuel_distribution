@extends('layouts.main_layout')

@section('title')
    Топливо: {{$fuel->name}}
@endsection
@section('content')
    {{ Breadcrumbs::render() }}
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Топливо: {{$fuel->name}} <br> Всего топлива: {{ $fuel->total_number }} л. (Оставшееся топливо: {{ $remaining_fuel }})</h5>
    <a href="{{route("type_fuel.create", $fuel->id)}}" class="text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-lime-600 dark:hover:bg-lime-700 focus:outline-none dark:focus:ring-lime-800">Добавить пользователя</a>
    <div class="relative overflow-x-auto mt-3">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-l-lg">
                    Имя пользователя
                </th>
                <th scope="col" class="px-6 py-3">
                    Кол-во взятого топлива
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg">
                    Действия
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$type->user_name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$type->number_fuel}} л.
                    </td>
                    <td class="px-6 py-4">
                        {{$type->created_at}}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="#">Изменить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
