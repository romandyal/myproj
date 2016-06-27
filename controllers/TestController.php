<?php
class TestController {

    public function actionIndex() {


        print_r(Db::getConnection());

        return true;
    }
}