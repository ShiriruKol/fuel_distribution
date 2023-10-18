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
