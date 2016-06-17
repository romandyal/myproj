<?php

class CabinetController
{

    public function actionIndex()
    {
        $userId = User::checkLogged();

        require_once (ROOT . '/views/cabinet/index.php');

        return true;
    }

    /**
     * Action для страницы "Редактирование данных пользователя"
     */
    public function actionEdit()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Заполняем переменные для полей формы
        $name = $user['name'];
        $password = $user['password'];
        $phone = $user['phone'];
        $email = $user['email'];

        // Флаг результата
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $name = $_POST['name'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            // Флаг ошибок
            $errors = false;

            // Валидируем значения
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = User::edit($userId, $name, $password, $phone, $email);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }
}