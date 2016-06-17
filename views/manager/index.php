<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="col-md-7">
        <div class="center-container-edit">

            <section id="contact" class="contact">

                <div class="section-header">
                    <h2>Пользователи: </h2>
                </div>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>email</th>
                        <th>Пароль</th>
                        <th>Телефон</th>
                        <th>Права</th>

                    </tr>
                    <?php foreach ($usersArr as $user): ?>
                        <tr>
                            <td>
                                    <?php echo $user['id']; ?>
                            </td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['password']; ?></td>
                            <td><?php echo $user['phone']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </section>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>