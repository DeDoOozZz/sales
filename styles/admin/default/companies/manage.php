<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Companies</h3>
    </div>
    <div class="panel-body">
        <?php if (validation_errors()) : ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors() ?>
                </div>
        <?php endif ?>
        <form role="form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Business Name <span class="input-required">*</span></label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Business Name" name="business_name"
                           value="<?php echo set_value('business_name', $item->business_name) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Business Type <span class="input-required">*</span></label>

                <div class="col-sm-10">
                    <?= form_dropdown('business_type_id', dd2menu('business_types', array('business_type_id' => 'name')), set_value('business_type_id', $item->business_type_id), 'class="form-control"') ?>
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
                <label class="col-sm-2 control-label" for="field-1">State/Prov./Gov </label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="State/Prov./Gov" name="state"
                           value="<?php echo set_value('state', $item->state) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Phone </label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Phone " name="phone"
                           value="<?php echo set_value('phone', $item->phone) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Email </label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Email " name="email"
                           value="<?php echo set_value('email', $item->email) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Website</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Website" name="website"
                           value="<?php echo set_value('website', $item->website) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Person in Charge</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Person in Charge" name="person_in_charge"
                           value="<?php echo set_value('person_in_charge', $item->person_in_charge) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
                     
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Person in charge Phone</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Person in charge Phone" name="person_in_charge_phone"
                           value="<?php echo set_value('person_in_charge_phone', $item->person_in_charge_phone) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
            
              <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1"> Person in Charge email </label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Person in Charge email " name="person_in_charge_email"
                           value="<?php echo set_value('person_in_charge_email', $item->person_in_charge_email) ?>">
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
                <label class="col-sm-2 control-label" for="field-1">Logo</label>

                <div class="col-sm-10">
                    <input type="file" class="form-control"  name="logo">
                </div>
            </div>
            <div class="form-group-separator"></div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <input type="submit" class="btn btn-secondary " name="submit" value="Submit">
                    <a href="<?php echo site_url('admin/companies/index'); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </div>


        </form>

    </div>
</div>

