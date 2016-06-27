<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="col-md-7">
        <div class="center-container-edit">

            <section id="contact" class="contact">

                <div class="section-header">
                    <h2>Найти пользователя: </h2>
                </div>

                <form action="#" method="post">

                    <p>Имя,email или телефон:</p>
                    <input type="text" name="userData" placeholder="">

                    <br>
                    <br>
                    <input type="submit" name="submit" class="btn btn-default" value="Найти">
                </form>
                    <br>
            </section>
            <?php if(isset($res)): ?>
            <div>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>email</th>
                        <th>Пароль</th>
                        <th>Телефон</th>
                        <th>Права</th>
                    </tr>
                        <tr>
                            <td>
                                    <?php echo $res['id']; ?>
                            </td>
                            <td><?php echo $res['name']; ?></td>
                            <td><?php echo $res['email']; ?></td>
                            <td><?php echo $res['password']; ?></td>
                            <td><?php echo $res['phone']; ?></td>
                            <td><?php echo $res['role']; ?></td>

                        </tr>
                </table>

            </div>
            <?php endif;?>

            <br>

            <div>
                <a href="/admin/user/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
            </div>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>