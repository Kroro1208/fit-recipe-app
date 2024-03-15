<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home >レシピ一覧
Breadcrumbs::for('recipes', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('レシピ一覧', route('recipes.index'));
});

Breadcrumbs::for('recipes.show', function (BreadcrumbTrail $trail, $recipe) {
    $trail->parent('recipes');
    $trail->push($recipe->title, route('recipes.show', $recipe->id));
});

Breadcrumbs::for('recipes.create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('レシピ投稿', route('recipes.create'));
});

Breadcrumbs::for('recipes.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('レシピ編集');
});

