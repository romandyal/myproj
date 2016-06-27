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
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($usersArr as $user): ?>
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
                            <td><a href="/admin/user/view/<?php echo $user['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                            <td><a href="/admin/user/update/<?php echo $user['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="/admin/user/delete/<?php echo $user['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </section>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>