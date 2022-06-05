<?php
    include("../vendor/autoload.php");
    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\HTTP;

    $data = [
        "name" => $_POST['name'] ?? 'Unknown',
        "email" => $_POST['email'] ?? 'Unknown',
        "phone" => $_POST['phone'] ?? 'Unknown',
        "address" => $_POST['address'] ?? 'Unknown',
        "password" => md5($_POST['password']),
        "role_id" => 3,
    ];

     $email = $_POST['email'];
     $table = new UsersTable(new MySQL());
     $user = $table->findByEmail($email);

     if($user ["num"] > 0 ){
         HTTP::redirect("../index.php", "created=true");
     }

    if( $table ) {
        $table->insert($data);
        HTTP::redirect("../index.php", "registered=true");
        
    } else {
        HTTP::redirect("/register.php", "error=true");
    }