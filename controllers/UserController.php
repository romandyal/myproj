<?php

class UserController
{
    public function actionRegister()
    {
        // Переменные для формы
        $name = false;
        $email = false;
        $password = false;
        $phone = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['InputName'];
            $email = $_POST['InputEmail'];
            $password = $_POST['InputPassword'];
            $phone = $_POST['InputPhone'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            if (User::checkPhoneExists($phone)) {
                $errors[] = 'Такой телефон уже используется';
            }
            if (User::checkNameExists($name)) {
                $errors[] = 'Такой логин уже используется';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = User::register($name, $email, $password, $phone);
            }
        }

        require_once (ROOT . '/views/user/register.php');

        return true;
    }
}