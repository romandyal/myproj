<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="col-md-7">
        <div class="center-container-edit">

            <h4>Удалить пользователя #<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить этого пользователя?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>
            <br>

            <div>
                <a href="/admin/user/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
            </div>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>