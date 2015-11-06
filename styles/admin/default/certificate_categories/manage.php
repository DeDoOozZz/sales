<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Categories</h3>
    </div>
    <div class="panel-body">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger">
                <?php echo validation_errors() ?>
            </div>
        <?php endif ?>
        <form role="form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Category</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Name" name="name"
                           value="<?php echo set_value('name', $item->name) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Certificate</label>

                <div class="col-sm-10">
                    <? foreach ($certificates as $st => $stv): ?>
                        <label>
                            <input type="checkbox" name="certificates[]"
                                   value="<?= $st ?>" <?= set_checkbox('certificates[]', $st, in_array($st, $selected_certificates)) ?> >
                                   <?= $stv ?>
                        </label>
                        <br>
                    <? endforeach ?>
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <input type="submit" class="btn btn-secondary " name="submit" value="Submit">
                    <a href="<?php echo site_url('admin/consultants/index'); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </div>


        </form>

    </div>
</div>

