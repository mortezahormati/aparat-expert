<?php


namespace App\Controllers\Auth;

use Framework\Database;
use Framework\Validation;

class RegisterController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function create()
    {
        adminView('register');
    }

    protected function ValidateEmailUnique($email){
        $sql ='select email from users where email=:email';
         return  $this->db->query($sql , [
           'email' => $email
        ])->fetch();
    }

    public function store()
    {
        $allowed_field = [
            'name' , 'family' , 'nick_name' , 'password' , 'email'
        ];

        $newUserData = array_intersect_key($_POST , array_flip($allowed_field));
        $confirm_password =trim($_POST['confirm-password']);

        //       1- validate data
        $errors = [];
        if(!Validation::email($newUserData['email'])){
            $errors['email'] = 'لطفا ایمیل معتبر وارد فرمایید';
        }
        if(!Validation::stringSize($newUserData['name'] , 3 ) || !Validation::alphabet($newUserData['name'])){
            $errors['name'] = 'لطفا نام کمتر سه گاراگتر نباشد و به صورت حروف فارسی یا لاتین ( از وارد کردن سمبل و اعداد بپرهیزید) ';
        }
        if(!Validation::stringSize($newUserData['family'] , 4 ) || !Validation::alphabet($newUserData['family'])) {
            $errors['family'] = 'لطفا نام کمتر چهار گاراگتر نباشد و به صورت حروف فارسی یا لاتین ( از وارد کردن سمبل و اعداد بپرهیزید) ';

        }
        if(!Validation::matchString($newUserData['password'] ,$confirm_password ) || !Validation::stringSize($newUserData['password'] , 6 ) ){
            $errors['password'] = 'پسورد شما منطبق نیست یا حداقل تعداد کارکتر برای ثبت پسورد برابر با مقدار 6 است';
        }

        if(!Validation::matchString($newUserData['password'] ,$confirm_password ) || !Validation::stringSize($newUserData['password'] , 6 ) ){
            $errors['password'] = 'پسورد شما منطبق نیست یا حداقل تعداد کارکتر برای ثبت پسورد برابر با مقدار 6 است';
        }
        //check email not exists
        //sql =>  user where email=$_post['email']

        if($this->ValidateEmailUnique($newUserData['email'])){
            $errors['email_is_exists'] = 'این ایمیل قبلا در سیستم ثبت شده است .';
        }

        if(!empty($errors)){

            //reload user page register with old data
            $oldUserData = array(
                'email' => $newUserData['email'] ,
                'name' => $newUserData['name'] ,
                'family' => $newUserData['family'] ,
                'nick_name' => $newUserData['nick_name'] ,
            );

            adminView('register', [
                'errors' => $errors ,
                'clientInfo' => $oldUserData
            ]);


        }else{
            //2- store user and redirect to route login
            $fields=[];
            $values=[];
            $newUserData['password'] = password_hash($newUserData['password'], PASSWORD_DEFAULT);
            foreach ($newUserData as $field => $value){
                $fields[] = $field;
                //convert empty values to null
                if($value === ''){
                    $newUserData[$field] = null;

                }
                $values[] = ':'.$field;
            }
            $fields = implode(', ' , $fields);
            $values = implode(', ',$values);

            $sql = "insert into users ({$fields}) values ({$values})";
            $this->db->query($sql ,$newUserData);
            $_SESSION['userRegisteredSuccessfully'] = ' کاربر با موفقیت ثبت نام شد.';
            redirect("login");
            exit();
        }

    }




}