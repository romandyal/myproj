<?php

class User
{
    public static function checkName($name)
    {
        $name = (string)$name;
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет телефон: не меньше, чем 10 символов
     * @param string $phone <p>Телефон</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPhone($phone)
    {
        $phone = (int) $phone;
        if(is_int($phone)) {
            if (strlen($phone) >= 10) {
                return true;
            }
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email,$stat=true)
    {
        // Соединение с БД
        $db = Db::getConnection($stat);

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function checkPhoneExists($phone,$stat=true)
    {
        // Соединение с БД
        $db = Db::getConnection($stat);

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM user WHERE phone = :phone';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function checkNameExists($name,$stat=true)
    {
        // Соединение с БД
        $db = Db::getConnection($stat);

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM user WHERE name = :name';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Регистрация пользователя
     * @param string $name <p>Имя</p>
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @param string $phone <p>Телефон</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function register($name, $email, $password, $phone, $stat=true)
    {
        // Соединение с БД
        $db = Db::getConnection($stat);

        // Текст запроса к БД
        $sql = 'INSERT INTO user (name, email, password, phone) '
            . 'VALUES (:name, :email, :password, :phone)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return mixed : integer user id or false
     */
    public static function checkUserData($email, $password,$stat=true)
    {
        // Соединение с БД
        $db = Db::getConnection($stat);

        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        // Обращаемся к записи
        $user = $result->fetch();

        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }
        return false;
    }

    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public static function auth($userId, $userName, $userRole)
    {

        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
        $_SESSION['name'] = $userName;
        $_SESSION['role'] = $userRole;

    }

    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function checkLogged()
    {

        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

    }

    /**
     * Возвращает пользователя с указанным id
     * @param integer $id <p>id пользователя</p>
     * @return array <p>Массив с информацией о пользователе</p>
     */
    public static function getUserById($id,$stat=true)
    {
        // Соединение с БД
        $db = Db::getConnection($stat);

        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    /**
     * Проверяет является ли пользователь гостем
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Редактирование данных пользователя
     * @param integer $id <p>id пользователя</p>
     * @param string $name <p>Имя</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function edit($id, $name, $password, $phone, $email, $stat=true)
    {
        // Соединение с БД
        $db = Db::getConnection($stat);

        // Текст запроса к БД
        $sql = "UPDATE user 
            SET name = :name, email =:email,  password = :password, phone =:phone
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Возвращает список пользователей
     * @return array <p>Список пользователей</p>
     */
    public static function getUsersList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT * FROM user ORDER BY id DESC');
        $usersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['name'] = $row['name'];
            $usersList[$i]['email'] = $row['email'];
            $usersList[$i]['password'] = $row['password'];
            $usersList[$i]['phone'] = $row['phone'];
            $usersList[$i]['role'] = $row['role'];
            $i++;
        }
        return $usersList;
    }

    /**
     * Редактирует пользователя с заданным id
     * @param integer $id <p>id пользователя</p>
     * @param string $userName <p>Имя пользователя</p>
     * @param string $userEmail <p>Почта пользователя</p>
     * @param string $userPassword <p>Пароль пользователя</p>
     * @param string $userPhone <p>Телефон пользователя</p>
     * @param string $role <p>Права пользователя</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateUserById($id, $userName, $userEmail, $userPassword, $userPhone, $role)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE user
            SET
                name = :name,
                email = :email,
                password = :password,
                phone = :phone,
                role = :role
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $userName, PDO::PARAM_STR);
        $result->bindParam(':email', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':password', $userPassword, PDO::PARAM_STR);
        $result->bindParam(':phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Удаляет пользователя с заданным id
     * @param integer $id <p>id пользователя</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteUserById($id,$stat=true)
    {
        // Соединение с БД
        $db = Db::getConnection($stat);

        // Текст запроса к БД
        $sql = 'DELETE FROM user WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}