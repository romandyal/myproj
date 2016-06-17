<?php

class AdminUserController extends AdminBase{

    public function actionIndex()
    {
        $userId = User::checkLogged();
        self::checkAdmin();
        $usersArr = User::getUsersList();
        
        require_once(ROOT . '/views/admin/index.php');

        return true;
    }

    /**
     * Action для страницы "Просмотр пользователя"
     */
    public function actionView($id)
    {
        $userId = User::checkLogged();
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретном пользователе
        $user = User::getUserById($id);

        // Подключаем вид
        require_once(ROOT . '/views/admin/view.php');
        return true;
    }

    /**
     * Action для страницы "Удалить пользователя"
     */
    public function actionDelete($id)
    {
        $userId = User::checkLogged();
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем заказ
            User::deleteUserById($id);

            // Перенаправляем пользователя на страницу управления
            header("Location: /admin/user");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/delete.php');
        return true;
    }

    /**
     * Action для страницы "Редактирование пользователя"
     */
    public function actionUpdate($id)
    {
        $userId = User::checkLogged();
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретном пользователе
        $user = User::getUserById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $userName = $_POST['userName'];
            $userEmail = $_POST['userEmail'];
            $userPassword = $_POST['userPassword'];
            $userPhone = $_POST['userPhone'];
            $role = $_POST['role'];

            // Сохраняем изменения
            User::updateUserById($id, $userName, $userEmail,$userPassword, $userPhone, $role);

            // Перенаправляем пользователя на страницу управлениями пользователями
            header("Location: /admin/user/view/$id");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/update.php');
        return true;
    }
    
}