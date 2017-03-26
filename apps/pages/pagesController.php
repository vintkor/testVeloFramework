<?php

class pagesController extends Bike
{
    public function test_home()
    {
        echo 'Главная страница';
    }

    public function test_contact()
    {
        echo 'Страница контакты';
        routeList();
    }
}