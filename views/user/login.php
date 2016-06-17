<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="col-md-4">
    <div class="center-container">

        <section id="contact" class="contact">

            <div class="section-header">
                <h2>Вход</h2>
            </div>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <!-- Contact Form -->
                <form method="post">

                    <div class="row"><!-- Row -->

                        <div class="col-md-12 col-sm-12 col-xs-12"><!-- Email input -->
                            <div class="form-group">
                                <input type="email" class="form-control" id="InputEmail" name="InputEmail" value="<?php if($email){echo $email;}?>" placeholder="<?php if($email){echo $email;}else{echo 'Email';}?>" required="">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12"><!-- Password input -->
                            <div class="form-group">
                                <input type="password" class="form-control" id="InputPassword" name="InputPassword" value="<?php if($password){echo $password;}?>" placeholder="<?php if($password){echo $password;}else{echo 'Пароль';}?>">
                            </div>
                        </div>

                    </div><!-- Row end -->

                    <input type="submit" name="submit" id="submit" value="Отправить форму" class="btn btn-default pull-left"><!-- Send Button -->

                </form>
                <!-- Contact Form end -->
        </section>
        <!-- Section Contact end -->
    </div>

</div>


<?php include ROOT . '/views/layouts/footer.php'; ?>

