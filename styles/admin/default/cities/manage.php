<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Cities</h3>
    </div>
    <div class="panel-body">
        <?php if(validation_errors()) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <?php echo validation_errors() ?>
                </div>
            </div>
        <?php endif ?>
        <form role="form" class="form-horizontal" role="form" method="post">

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">City</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="City" name="name"
                           value="<?php echo set_value('name', $item->name) ?>">
                </div>
            </div>

            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <input type="submit" class="btn btn-secondary " name="submit" value="Submit">
                    <a href="<?php echo site_url('admin/cities/index'); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </div>


        </form>

    </div>
</div>

