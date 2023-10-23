<?php

use App\Models\Fuel;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;



Breadcrumbs::for('home.index', function (BreadcrumbTrail $trail): void {

    $trail->push('Главная', route('home.index'));

});

Breadcrumbs::for('fuels.index', function (BreadcrumbTrail $trail): void {

    $trail->parent('home.index');
    $trail->push('Виды топлива', route('fuels.index'));

});

Breadcrumbs::for('fuels.show', function (BreadcrumbTrail $trail, Fuel $fuel): void {

    $trail->parent('fuels.index');
    $trail->push('Топливо: ' . $fuel->name, route('fuels.show', $fuel));

});

Breadcrumbs::for('fuels.create', function (BreadcrumbTrail $trail): void {

    $trail->parent('fuels.index');
    $trail->push('Добавление топлива', route('fuels.create'));

});

Breadcrumbs::for('fuels.confirm', function (BreadcrumbTrail $trail, Fuel $fuel): void {

    $trail->parent('fuels.index');
    $trail->push('Удаление: ' . $fuel->name, route('fuels.confirm', $fuel));

});

Breadcrumbs::for('fuels.edit', function (BreadcrumbTrail $trail, Fuel $fuel): void {

    $trail->parent('fuels.index');
    $trail->push('Изменение: ' . $fuel->name, route('fuels.edit', $fuel));

});

Breadcrumbs::for('type_fuel.create', function (BreadcrumbTrail $trail, Fuel $fuel): void {

    $trail->parent('fuels.show', $fuel);
    $trail->push('Добавление выписки пользователя', route('type_fuel.create', $fuel));

});
