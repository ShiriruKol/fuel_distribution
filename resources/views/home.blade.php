@extends('layouts.main_layout')

@section('title')Главная страница@endsection

@section('content')

    <div class="divbg">
        <div class="text-center divtxt">
            <h1 class="ts mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl">
                Веб-приложение для учета топлива
            </h1>
            <p class="ts mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Проводите учет топлива между сотрудниками предприятия, создавайте, обновляйте, редактируйте информацию о переданном количестве топлива между сотрудниками.</p>
            <a href="{{route('fuels.index')}}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Начать
                {{--w-3.5 h-3.5 ml-2--}}
                <i class="fa-solid fa-arrow-right w-3.5 h-3.5 ml-2"></i>
            </a>
        </div>
    </div>

@endsection
