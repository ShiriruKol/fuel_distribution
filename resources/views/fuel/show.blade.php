@extends('layouts.main_layout')

@section('title')
    Топливо: {{$fuel->name}}
@endsection
@section('content')
    {{--{{ Breadcrumbs::render() }}--}}
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Топливо: {{$fuel->name}}</h5>
    <div class="relative overflow-x-auto">
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
