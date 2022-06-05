<?php
    include("vendor/autoload.php");
    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\Auth;

    $table = new UsersTable(new MySQL());
    $all = $table->getAll();
    $auth = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div style="float: right">
            <a href="profile.php"> Profile </a> | <a href="actions/logout.php" 
            class="text-danger"> Logout </a>
        </div>

        <h1 class="mt-5 mb-5"> Manage User
            <span class="badge bg-danger text-white">
                <?= count($all) ?>
            </span>
        </h1>

        <table class="table table-striped table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
                <?php $no = 0 ?>
            <?php foreach ($all as $user): ?>
                        <?php $no += 1 ?>
                <tr>
                    <td><?php echo $no;  ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td>
                        <?php if($user->value === '1'): ?>
                            <span class="badge bg-primary"> 
                                <?= $user->role ?>
                            </span>
                        <?php elseif($user->value === '2'): ?>
                            <span class="badge bg-danger">
                                <?= $user->role ?>
                            </span>
                        <?php else: ?>
                            <span class="badge bg-success">
                                <?= $user->role ?>
                            </span>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if($auth->value < 3): ?>
                            <div class=" dropdown">

                                <a href="#" class="btn btn-sm btn-outline-primary 
                                    dropdown-toggle" data-toggle="dropdown"> Change Role
                                </a>

                                <div class="dropdown-menu">
                                    <a href="actions/role.php?id=<?= $user->id ?>&role=3" 
                                        class="dropdown-item"> User </a>
                                    <a href="actions/role.php?id=<?= $user->id ?>&role=2" 
                                        class="dropdown-item"> Manager </a>
                                    <a href="actions/role.php?id=<?= $user->id ?>&role=1" 
                                        class="dropdown-item">Admin</a>
                                </div>

                                <?php if($user->suspended): ?>
                                    <a href="actions/unsuspend.php?id=<?= $user->id ?>" 
                                        class="btn btn-sm btn-danger">Suspended</a>
                                <?php else: ?>
                                    <a href="actions/suspend.php?id=<?= $user->id ?>"
                                        class="btn btn-sm btn-outline-success">Active</a>
                                <?php endif ?>

                                <?php if($user->id !== $auth->id): ?>
                                    <a href="actions/delete.php?id=<?= $user->id ?>" 
                                        class="btn btn-sm btn-outline-danger"
                                    onClick="return confirm('Are you sure?')">Delete</a>
                                <?php endif ?>

                            </div>
                        <?php endif ?>

                    </td>
                </tr>
               
            <?php endforeach ?>
        </table>
    
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>
