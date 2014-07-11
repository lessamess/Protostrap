            <?php if(empty($loginaction)){
                    $loginaction = "";
                } ?>

            <div class="row">
                <span class="col-xs-12 col-md-12">
                    <h3>Sign in</h3>
                </span>
            </div>
            <div class="row">
                <span class="col-xs-12 col-md-3">
                    <form action='<?php echo $loginaction ;?>' method='post' id="loginform">
                        <div class="form-group"><input id="login" name='login' class='form-control' type='text' placeholder='Username'></div>
                        <div class="input-group">
                              <input type="password" class="form-control" name="" placeholder="Password">
                              <span class="input-group-addon passwordToggle"><i class="fa fa-square-o"></i> Show</span>
                        </div>

                        <br>



                        <button type='submit' class='btn-block btn btn-primary'>Sign in</button>
                    </form>
                </span>
                <span class="col-xs-12 col-md-offset-1 col-md-6">
                <strong>User-Roles</strong><br>
                    Click the following to log in as:<br>
                    <?php foreach($users as $key => $user){ ?>
                        <strong><a href="javascript:void(0);" class="loginUserselection" data-key="<?= $user['email'];?>"><?= $roles[$user['role']]['name']; ?></a></strong><br>
                        <?php }?>
                </span>
            </div>