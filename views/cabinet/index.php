<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="col-md-4">
        <div class="center-container">

            <section id="contact" class="contact">

                <div class="section-header">
                    <h2>Привет
                    <?php if(isset($_SESSION['user'])){echo $_SESSION['name'];} ?>



                    </h2>
                </div>

            </section>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>