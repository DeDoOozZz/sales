<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Crops</h3>
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
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <input type="submit" class="btn btn-secondary " name="submit" value="Submit">
                    <a href="<?php echo site_url('admin/crops/index'); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </div>


        </form>

    </div>
</div>

