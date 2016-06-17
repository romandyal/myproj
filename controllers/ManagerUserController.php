<?php

class ManagerUserController extends AdminBase
{

    public function actionIndex()
    {
        $userId = User::checkLogged();
        self::checkManager();
        $usersArr = User::getUsersList();

        require_once(ROOT . '/views/manager/index.php');

        return true;
    }

}