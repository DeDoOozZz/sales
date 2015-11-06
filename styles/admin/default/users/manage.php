<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Users</h3>
    </div>
    <div class="panel-body">
        <?php if (validation_errors()) : ?>

                <div class="alert alert-danger">
                    <?php echo validation_errors() ?>
                </div>

        <?php endif ?>
        <form role="form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Name</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Name" name="name"
                           value="<?php echo set_value('name', $item->name) ?>">
                </div>
            </div>
          
            <div class="form-group-separator"></div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Username</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Username" name="username"
                           value="<?php echo set_value('username', $item->username) ?>">
                </div>
            </div>
          
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Email</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Email" name="email"
                           value="<?php echo set_value('email', $item->email) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Phone</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Phone" name="phone"
                           value="<?php echo set_value('phone', $item->phone) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Password</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Password" name="password"
                           value="<?php echo set_value('password') ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Receive Alerts</label>

                <div class="col-sm-10">
                    <input type="checkbox" name="alert" value="1" <?= set_value('alert', $item->alert) == 1 ? "checked='checked'" : null ?> > Receive Alerts
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Permission</label>

                <div class="col-sm-10 user-permission">
                    <? foreach ($permissions as $permi => $permtitle): ?>
                        <h3><?= $permtitle ?></h3>
                        <? foreach ($oprations as $oprk => $oprv): ?>
                            <div class="col-sm-3">
                                <input type="checkbox"   name="permission[<?= $permi ?>_<?= $oprk ?>]" <?php if (set_value('permission[' . $permi . '_' . $oprk . ']', in_array($permi . '_' . $oprk, $selected_permission))): ?>checked="checked" <? endif ?>> <?= $oprv ?><br />
                                
                            </div>
                        <? endforeach ?><br /> <br />
                        <div class="form-group-separator"></div>
                        
                    <? endforeach ?>
                        

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <input type="submit" class="btn btn-secondary " name="submit" value="Submit">
                    <a href="<?php echo site_url('admin/users/index'); ?>" class="btn btn-danger">Cancel</a>

                </div>
            </div>


        </form>

    </div>
</div>

