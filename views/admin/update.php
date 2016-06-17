<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="col-md-7">
        <div class="center-container-edit">

            <section id="contact" class="contact">

                <div class="section-header">
                    <h2>Редактировать: <?php echo $user['name'];?></h2>
                </div>

                <form action="#" method="post">

                    <p>Имя пользователя</p>
                    <input type="text" name="userName" placeholder="" value="<?php echo $user['name']; ?>">

                    <p>email</p>
                    <input type="text" name="userEmail" placeholder="" value="<?php echo $user['email']; ?>">

                    <p>Пароль</p>
                    <input type="text" name="userPassword" placeholder="" value="<?php echo $user['password']; ?>">

                    <p>Телефон</p>
                    <input type="text" name="userPhone" placeholder="" value="<?php echo $user['phone']; ?>">

                    <p>Права</p>
                    <select name="role">
                        <option value="user" <?php if ($user['role'] == 'user') echo ' selected="selected"'; ?>>Пользователь </option>
                        <option value="manager" <?php if ($user['role'] == 'manager') echo ' selected="selected"'; ?>>Менеджер </option>
                        <option value="admin" <?php if ($user['role'] == 'admin') echo ' selected="selected"'; ?>>Администратор</option>

                    </select>
                    <br>
                    <br>
                    <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                </form>

            </section>
            <br>

            <div>
                <a href="/admin/user/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
            </div>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>