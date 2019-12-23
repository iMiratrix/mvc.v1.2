<?php

class Model_Registration extends Model
{
    public static function checkLogin($login)
    {
        if (!empty($login)) return true;
        else return false;
    }

    public static function checkPassword($password)
    {
        if (!empty($password)) return true;
        else return false;
    }

    public static function checkEmail($email)
    {
        if (!empty($email)) return true;
        else return false;
    }

    public static function checkUserLogin($login)
    {
        $pdo = (new Connection())->create();
        $sql = 'SELECT * FROM users WHERE login = :login';
        $result = $pdo->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) return true;
        else return false;

    }

    public static function generateHash($password)
    {
        if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
            $salt = '$2y$10$' . substr(md5(uniqid(rand(), true)), 0, 22);
            return crypt($password, $salt);
        }
    }

    public static function newuser($login, $password, $email)
    {
        $pdo = (new Connection())->create();
        $sql = 'INSERT INTO users(login,password,email) VALUES(:login,:password,:email)';
        $params = ['login' => $login, ':password' => $password, 'email' => $email];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    }
}

