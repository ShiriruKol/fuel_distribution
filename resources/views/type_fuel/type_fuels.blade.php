@extends('layouts.main_layout')

@section('title')
    Заявки на топливо
@endsection
@section('content')
    {{--{{ Breadcrumbs::render() }}--}}
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Заявки на топливо</h5>
    <div class="relative overflow-x-auto mt-3">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-l-lg">
                    Сотрудник
                </th>
                <th scope="col" class="px-6 py-3">
                    Топливо
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
                        {{$type->fuel_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$type->number_fuel}} л.
                    </td>
                    <td class="px-6 py-4">
                        {{$type->created_at}}
                    </td>
                    <td>
                        <form style="display: inline-block" action="{{route('type_fuel.update', $type->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit"
                               class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                Одобрить
                            </button>
                        </form>
                        <form style="display: inline-block" action="{{--{{route('type_fuel.update', $type->id)}}--}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                               class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                Отклонить
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
