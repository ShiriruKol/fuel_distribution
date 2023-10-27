@extends('layouts.main_layout')

@section('title')
    Заявки на топливо
@endsection
@section('content')
    {{ Breadcrumbs::render() }}
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{'Список заявок сотрудника: ' . auth()->user()->name}}</h5>
    <div class="relative overflow-x-auto mt-3">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-l-lg">
                    Топливо
                </th>
                <th scope="col" class="px-6 py-3">
                    Кол-во взятого топлива
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg">
                    Статус
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$type->fuel_name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$type->number_fuel}} л.
                    </td>
                    <td class="px-6 py-4">
                        {{$type->created_at}}
                    </td>
                    <td>
                        @if($type->status == 1)
                            <a href="#"
                               class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Одобрена</a>
                        @else
                            <a href="#"
                               class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Не одобрена</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
