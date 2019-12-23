<?php

class Controller_Registration extends Controller
{
    /**
     * Controller_Registration constructor.
     */

    function __construct()
    {
        $this->model = new Model_Registration();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('registration_view.php', 'template_view.php');
    }

    function action_registration()
    {
        if (isset($_POST['submit'])) {
            $index['title'] = 'Регистрация';
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!Model_Registration::checkLogin($login)) $errors[] = 'Поле login пустое';
            if (!Model_Registration::checkPassword($password)) $errors[] = 'Поле password пустое';
            if (!Model_Registration::checkEmail($email)) $errors[] = 'Поле email пустое';
            else {
                $checkLogin = Model_Registration::checkUserLogin($login);
                if ($checkLogin == true) $errors[] = 'Пользователь с таким Логином, уже зарегистрирован, введите другой Логин';
                else {
                    $hashed_password = Model_Registration::generateHash($password);
                    $data = Model_Registration::newuser($login, $hashed_password, $email);
                    View::generate('registration_view.php', 'template_view.php', $data);
                }

            }

        }
    }

}


