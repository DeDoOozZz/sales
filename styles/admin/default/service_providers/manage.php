<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Services Provides</h3>
    </div>
    <div class="panel-body">
        <?php if (validation_errors()) : ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors() ?>
                </div>
        <?php endif ?>
        <form role="form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Name <span class="input-required">*</span> </label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Name" name="name"
                           value="<?php echo set_value('name', $item->name) ?>">
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
                <label class="col-sm-2 control-label" for="field-1">Address</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Address" name="address"
                           value="<?php echo set_value('address', $item->address) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
            
             <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">City</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="City" name="city"
                           value="<?php echo set_value('city', $item->city) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">State / Prov. / Gov. </label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="State" name="state"
                           value="<?php echo set_value('state', $item->state) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Country <span class="input-required">*</span></label>

                <div class="col-sm-10">
                    <?= form_dropdown('country_id', dd2menu('countries', array('country_id' => 'name')), set_value('country_id', $item->country_id ? $item->country_id : '63'), 'class="form-control s2example-1"') ?>
                </div>
            </div>
            <div class="form-group-separator"></div>
            
           

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Note</label>

                <div class="col-sm-10">
                    <textarea class="form-control" placeholder="Note"  name="note" style="height: 100px;"><?php echo set_value('note', $item->note) ?></textarea>
                </div>
            </div>
            <div class="form-group-separator"></div>



            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <input type="submit" class="btn btn-secondary " name="submit" value="Submit">
                    <a href="<?php echo site_url('admin/service_providers/index'); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </div>


        </form>

    </div>
</div>

