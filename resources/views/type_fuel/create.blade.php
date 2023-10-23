@extends('layouts.main_layout')

@section('title')Добавление выписки пользователя@endsection

@section('content')

    {{ Breadcrumbs::render() }}

    <div class="mt-3 content-center">
        <div>
            <form class="w-80" action="{{ route('type_fuel.store') }}" method="post">
                @csrf
                <div class="mb-6 ">
                    <label for="number_fuel" class="mt-2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Общее кол-во(л.)</label>
                    <input value="{{old('number_fuel')}}" type="text" id="number_fuel" name="number_fuel"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="общее количество" required>
                    @error('number_fuel')
                    <div class="mt-1 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                         role="alert">
                        <span class="font-medium">Ошибка</span> {{$message}}
                    </div>
                    @enderror

                    <label for="user_id" class="mt-2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Выберите пользователя</label>
                    <select id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Выберите пользователя</option>
                        @foreach($users as $user)
                            @if($user->id == old('user_id'))
                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @endif
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <div class="mt-1 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                         role="alert">
                        <span class="font-medium">Ошибка</span> {{$message}}
                    </div>
                    @enderror

                    <label for="fuel_id" class="mt-2 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Топливо</label>
                    <select id="fuel_id" name="fuel_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{$fuel->id}}" selected>{{$fuel->name}}</option>
                    </select>
                    @error('fuel_id')
                    <div class="mt-1 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                         role="alert">
                        <span class="font-medium">Ошибка</span> {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Добавить
                </button>
            </form>
        </div>

    </div>

@endsection
