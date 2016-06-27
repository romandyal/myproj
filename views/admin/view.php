<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="col-md-7">
        <div class="center-container-edit">

            <section id="contact" class="contact">

                <div class="section-header">
                    <h2>Пользователь <?php echo $user['name'];?> </h2>
                </div>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID </th>
                        <th>Имя </th>
                        <th>email</th>
                        <th>Пароль</th>
                        <th>Телефон</th>
                        <th>Права </th>

                    </tr>
                    <tr>
                        <td>
                            <a href="/admin/user/view/<?php echo $user['id']; ?>">
                                <?php echo $user['id']; ?>
                            </a>
                        </td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                    </tr>

                </table>

            </section>
        <div>
        <a href="/admin/user/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
    </div>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>