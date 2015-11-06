<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading"><?= lang('global_search') ?></header>
            <?= form_open_multipart(false, 'class="form-horizontal" method="get"') ?><br />
            <div class="form-group">
                <label class="col-sm-3 control-label"><?= lang('users_username') ?></label>
                <div class="col-sm-4">
                    <?= form_input('username', set_value('username'), 'class="bg-focus form-control" data-required="true" id="username"') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label"><?= lang('users_usergroup_id') ?></label>
                <div class="col-sm-4">
                    <?= form_dropdown('usergroup_id', ddgen('usergroups', array('usergroup_id', 'name')), set_value('usergroup_id'), 'class="bg-focus form-control" data-required="true" id="usergroup_id"') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label"><?= lang('users_email') ?></label>
                <div class="col-sm-4">
                    <?= form_input('email', set_value('email'), 'class="bg-focus form-control" data-required="true" id="email"') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label"><?= lang('users_joindate') ?></label>
                <div class="col-sm-4">
                    <div class="m-b"><?= form_input('joindate', set_value('joindate'), 'rows="5" data-trigger="keyup"class="form-control  input-sm input-s datepicker"  data-date-format="yyyy-mm-dd hh:ii:ss" data-required="true" id="joindate"') ?></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary" name="search"><?= lang('global_search') ?></button>
                </div>
            </div>
            <?= form_close() ?>
        </section>
    </div>
</div>