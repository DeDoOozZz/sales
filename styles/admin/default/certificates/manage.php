<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Certificates</h3>
    </div>
    <div class="panel-body">
        <?php if (validation_errors()) : ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors() ?>
                </div>
        <?php endif ?>
        <form role="form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Name <span class="input-required">*</span></label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo set_value('name', $item->name) ?>">
                </div>
            </div>

            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Crops</label>

                <div class="col-sm-10">
                    <? foreach($crops as $k => $crop): ?>
                    <input type="checkbox"
                           name="crops[]"
                           value="<?= $k ?>" <?php if(set_value('crops[]', in_array($k, $selected_crops))):  ?> checked="checked" <? endif ?>>
                    <?= $crop ?><br />
                    <? endforeach ?>
                </div>
            </div>

            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Short Code <span
                        class="input-required">*</span></label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Short Code" name="short_code"
                           value="<?php echo set_value('short_code', $item->short_code) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Description</label>

                <div class="col-sm-10">
                    <textarea class="form-control" placeholder="Description" name="description"
                              style="height: 100px;"><?php echo set_value('description', $item->description) ?></textarea>
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Note</label>

                <div class="col-sm-10">
                    <textarea class="form-control" placeholder="Note" name="note"
                              style="height: 100px;"><?php echo set_value('note', $item->note) ?></textarea>
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <input type="submit" class="btn btn-secondary " name="submit" value="Submit">
                    <a href="<?php echo site_url('admin/certificates/index'); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </div>


        </form>

    </div>
</div>

