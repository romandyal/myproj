

<?php if(isset($userId)):?>
<div class="col-md-3">
    <div class="right-container">
        <a href="/cabinet/edit">
            <button class="btn btn-default pull-left">Редактировать</button>
        </a>
        <?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) {

            echo '<a href="/admin/user">';
            echo '<button class="btn btn-default pull-left">Пользователи</button>';
            echo '</a>';

            echo '<a href="/admin/user/test">';
            echo '<button class="btn btn-default pull-left">Тест ORM</button>';
            echo '</a>';
        }elseif(isset($_SESSION['role']) && $_SESSION['role'] == 'manager'){
            echo '<a href="/manager/user">';
            echo '<button class="btn btn-default pull-left">Пользователи</button>';
            echo '</a>';
        }?>




    </div>
</div>
<?php endif;?>

</div>
</div>



<!-- SCRIPTS -->
<script type="text/javascript" src="/template/Blvck - Personal vCard &amp; Resume Template_files/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="/template/Blvck - Personal vCard &amp; Resume Template_files/jquery.onepage-scroll.min.js"></script>
<script type="text/javascript" src="/template/Blvck - Personal vCard &amp; Resume Template_files/jquery.easing.min.js"></script>
<script type="text/javascript" src="/template/Blvck - Personal vCard &amp; Resume Template_files/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="/template/Blvck - Personal vCard &amp; Resume Template_files/jquery.filterizr.js"></script>
<script type="text/javascript" src="/template/Blvck - Personal vCard &amp; Resume Template_files/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/template/Blvck - Personal vCard &amp; Resume Template_files/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="/template/Blvck - Personal vCard &amp; Resume Template_files/owl.carousel.min.js"></script>-->
<script type="text/javascript" src="/template/Blvck - Personal vCard &amp; Resume Template_files/custom.js"></script>
<script type="text/javascript" src="/template/Blvck - Personal vCard &amp; Resume Template_files/smoothscroll.min.js"></script>


<div style="position: absolute; z-index: -10000; top: 0px; left: 0px; right: 0px; height: 4927px;"></div></body></html>