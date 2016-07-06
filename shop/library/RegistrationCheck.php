<?php
$data =$_POST;
if (isset($data['registration']) )
{
// registration
    $user = R::dispense('user');
    $user->full_name = $data['login'];
    $user->email = $data['email'];
    $user->username = $data['username'];
    $user->password = password_hash($data['password'], PASSWORD_BCRYPT);
    R::store($user);
//   echo '<div id="regg" style="color: green">Registration ok !</div>' . '<hr>';
    if(trim($data['login']) == '')
    {
        $errors[] = 'Errors Login';
    }
    if (trim($data['email']) == '')
    {
        $errors[] ='Errors Email';
    }
    if ($data['password'] == '')
    {
        $errors[] ='Errors Password';
    }
    if(R::count('user', "login = ?", array($data['login'])) >0  )
    {
        $errors[] = 'Такой пользователь уже существует';
    }
    if(R::count('user', "email = ?", array($data['email'])) >0  )
    {
        $errors[] = 'Такой пользователь уже существует';
    }
    if (empty($errors))
    {

    }else
    {
        echo '<div id="inspection">'.array_shift( $errors).'</div>' . '<hr>';
    }
}