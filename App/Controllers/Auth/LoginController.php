<?php

namespace App\Controllers\Auth;

use Framework\Database;
use Framework\Session;
use Framework\Validation;

class LoginController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            //1- validate email , password
            $email = $_POST['email'];
            $password = $_POST['password'];


            $errors = [];
            if (!Validation::email($email)) {
                $errors['email'] = 'این ایمیل استاندارد نمیباشد';
            }
            if (!Validation::stringSize($password, 5)) {
                $errors['password'] = 'پسورد اشتباه است .';
            }


            if (!empty($errors)) {

                //reload user page register with old data
                $oldLoginData = array(
                    'email' => $email
                );

                adminView('login', [
                    'errors' => $errors,
                    'clientInfo' => $oldLoginData
                ]);
                exit();


            }
            //2- email exists
            $user = $this->userExists($email);

            //3- check password
            if (!password_verify($password, $user['password'])) {
                $oldLoginData = array(
                    'email' => $email
                );
                $errors['credential'] = 'ایمیل یا پسورد اشتباه است .';

                adminView('login', [
                    'errors' => $errors,
                    'clientInfo' => $oldLoginData
                ]);
                exit();

            }

            //4- session => user ====>
            Session::set('user', $user);

            //5- redirect => admin_panel
            redirect('administrator');


        }

    }

    protected function userExists($email)
    {
        $sql = 'select * from users where email=:email';

        $user = $this->db->query($sql, [
            'email' => $email
        ])->fetch();


        if ($user) {

            return $user;
        } else {
            $oldLoginData = array(
                'email' => $email
            );
            $errors['credential'] = 'ایمیل یا پسورد اشتباه است .';
            adminView('login', [
                'errors' => $errors,
                'clientInfo' => $oldLoginData
            ]);
            exit();
        }

    }

    public function create()
    {
        adminView('login');
    }
}
