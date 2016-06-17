<?php

return array (

    'user/register' => 'user/register', // actionRegister in UserController
    'user/login' => 'user/login', //actionLogin in UserController
    'user/logout' => 'user/logout', // actionLogout в UserController

    'cabinet/edit' => 'cabinet/edit', // actionEdit в CabinetController
    'cabinet' => 'cabinet/index', // actionIndex in CabinetController

    // Управлене пользователями:
    'admin/user/update/([0-9]+)' => 'adminUser/update/$1', // actionUpdate в AdminUserController
    'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1', // actionDelete в AdminUserController
    'admin/user/view/([0-9]+)' => 'adminUser/view/$1', // actionView в AdminUserController
    'admin/user' => 'adminUser/index', // actionIndex в AdminUserController

    // Менеджеры
    'manager/user' => 'managerUser/index', // actionIndex в AdminUserController

    '' => 'site/index',
);