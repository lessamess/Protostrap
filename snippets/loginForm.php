<?php
if(empty($loginaction)){
        $loginaction = "";
}
$loginFirstUser = $users[1][$config['loginWith']];
?>

<div class="row">
    <span class="col-xs-12 col-md-12">
        <h3>Sign in</h3>
    </span>
</div>
<div class="row">
    <span class="col-xs-12 col-md-3">



        <form action='<?php echo $loginaction ;?>' method='post' id="loginform">
            <div class="form-group">
                <label for="login">Username</label>
                <input id="login" name='login' class='form-control' type='text' placeholder='Username' autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="" placeholder="Password" >
                    <span class="input-group-addon passwordToggle"><i class="fa fa-square-o"></i> Show</span>
                </div>
            </div>

            <button type='button' class="btn-block btn btn-primary loginFirstUser" data-key="<?php echo $loginFirstUser ;?>">Sign in</button>
        </form>
    </span>
    <span class="col-xs-12 col-md-offset-1 col-md-6">
    <strong>User-Roles</strong><br>
        Click the following to sign in as:<br>
        <?php foreach($users as $key => $user){ ?>
            <strong><a href="javascript:void(0);" class="loginUser" data-key="<?php echo  $user[$config['loginWith']];?>"><?php echo  $roles[$user['role']]['name']; ?></a></strong><br>
            <?php }

        echo "<br>";

        if ($loggedIn){
            echo "You are currently signed in as:<br> ". $activeUser['fullName']." <br>Role: ".$roles[$userrole]['name']." <br>";?>
            <a href="?logout=true">Log out</a>
        <?php } else {
            echo "You are currently not signed in.";
        }?>
    </span>
</div>