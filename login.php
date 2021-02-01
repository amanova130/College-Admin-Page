<?php require_once("login_action.php");?>
 
<main class="form-signin container card">
    <form action="" method="post" action="login_action.php" class="form ">
        <h1 class="h3 mb-3 fw-normal">Please login</h1>
        <div class="text-danger h5"><?php echo $errorMsg; ?></div>
        <label for="inputName" class="visually-hidden">User name</label>
        <input type="text" id="inputName" name='user_name' class="form-control" placeholder="User name" required autofocus>
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" id="inputPassword" name='password' class="form-control" placeholder="Password" required>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name='submit'>Login</button>
    </form>
</main>

