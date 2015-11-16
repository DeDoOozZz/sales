<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Files</h3>
    </div>
    <div class="panel-body">
        <?php if (validation_errors()) : ?>

            <div class="alert alert-danger">
                <?php echo validation_errors() ?>
            </div>

        <?php endif ?>
        <form role="form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">File Number</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Number" name="number"
                           value="<?php echo set_value('number', $item->number) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">ME Number</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="ME Number" name="me_number"
                           value="<?php echo set_value('me_number', $item->me_number) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Directory Code</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Brc site code/GGN" name="brc_site_code"
                           value="<?php echo set_value('brc_site_code', $item->brc_site_code) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Service Providers</label>

                <div class="col-sm-10">
                    <?= form_dropdown('service_provider_id', dd2menu('service_providers', array('service_provider_id' => 'name'), False, False, array('service_providers.name' => 'ASC')), set_value('service_provider_id', $item->service_provider_id), 'class="form-control"') ?>

                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Company</label>

                <div class="col-sm-4">
                    <?= form_dropdown('company_id', dd2menu('companies', array('company_id' => 'business_name'), False, False, array('companies.business_name' => 'ASC')), set_value('company_id', $item->company_id), 'class="form-control s2example-1 selected_company" onchange="company_changes(this.value)"') ?>

                </div>

                <label class="col-sm-1 control-label" for="field-1">Facility</label>

                <div class="col-sm-5">
                    <?= form_dropdown('branch_id', array(''), set_value('branch_id', $item->branch_id), 'class="form-control selected_branch"') ?>

                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Certificate</label>

                <div class="col-sm-10">
                    <?= form_dropdown('certificate_id', dd2menu('certificates', array('certificate_id' => 'name'), False, False, array('certificates.name' => 'ASC')), set_value('certificate_id', $item->certificate_id), 'class="form-control " id="" onchange="certificate_changes(this.value)"') ?>

                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Crops</label>

                <div class="col-sm-10  selected_crop">
                    <? //= form_dropdown('crop_id', dd2menu('crops', array('crop_id' => 'name')), set_value('crop_id', $item->crop_id), 'class="form-control selected_crop"') ?>

                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Grade</label>

                <div class="col-sm-10">
                    <?= form_dropdown('grade_id', dd2menu('grades', array('grade_id' => 'name'), False, False, array('grades.name' => 'ASC')), set_value('grade_id', $item->grade_id), 'class="form-control  selected_grade"') ?>

                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Categories</label>

                <div class="col-sm-10 categories">
                    <? // = form_dropdown('category_id', dd2menu('categories', array('category_id' => 'name'), False, False,  array('categories.name'=>'ASC')), set_value('category_id', $item->category_id), 'class="form-control selected_category"') ?>

                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Options</label>

                <div class="col-sm-10">
                    <?= form_dropdown('option_id', dd2menu('options', array('option_id' => 'name'), False, False, array('options.name' => 'ASC')), set_value('option_id', $item->option_id), 'class="form-control  selected_option" ') ?>

                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Consultants</label>

                <div class="col-sm-10">
                    <?= form_dropdown('consultant_id', dd2menu('consultants', array('consultant_id' => 'first_name'), False, False, array('consultants.first_name' => 'ASC')), set_value('consultant_id', $item->consultant_id), 'class="form-control selected_consultant"') ?>

                </div>
            </div>
            <div class="form-group-separator"></div>

            <!--            <div class="form-group">-->
            <!--                <label class="col-sm-2 control-label" for="field-1">Reg</label>-->
            <!---->
            <!--                <div class="col-sm-10">-->
            <!--                    <input type="text" class="form-control" placeholder="Reg" name="reg_id"-->
            <!--                           value="--><?php //echo set_value('reg_id', $item->reg_id)  ?><!--">-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="form-group-separator"></div>-->

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Issue Date</label>

                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control datepicker" placeholder="Issue Date" name="issue_date"
                               data-format="yyyy-mm-dd"
                               value="<?php echo set_value('issue_date', $item->issue_date) ?>">

                        <div class="input-group-addon">
                            <a href="#"><i class="linecons-calendar"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Re-evaluation</label>

                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control datepicker" placeholder="Re-evaluation"
                               name="re_evaluation" data-format="yyyy-mm-dd"
                               value="<?php echo set_value('re_evaluation', $item->re_evaluation) ?>">

                        <div class="input-group-addon">
                            <a href="#"><i class="linecons-calendar"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Expire Date</label>

                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control datepicker" placeholder="Expire Date" name="expire_date"
                               data-format="yyyy-mm-dd"
                               value="<?php echo set_value('expire_date', $item->expire_date) ?>">

                        <div class="input-group-addon">
                            <a href="#"><i class="linecons-calendar"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">

                <label class="col-sm-2 control-label" for="field-1">Documents</label>

                <div class="col-sm-10">
                    <input type="file" multiple="multiple" name="documents[]" class="file form-control">
                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1"></label>

                <div class="col-sm-10">
                    <table width="100%" class="files table table-bordered table-striped file-document-description">
                        <thead>
                        <tr class="file-document-description">
                            <td class="col-sm-5">File</td>
                            <td class="col-sm-7">Comment</td>
                        </tr>
                        </thead>
                        <tbody class="middle-align">
                        <?php foreach ($files as $file): ?>
                            <tr class="file-document-description">
                                <td class="col-sm-5"><a
                                        href="<?= base_url('cdn/files') . '/' . $file->document ?>"><?= $file->document ?></a>
                                    <a href="javascript:void(0)"
                                       class="RemoveDocument">X</a></td>
                                <td class="col-sm-7"><input type="text" name="file_comment[]"
                                                            value="<?= $file->comment ?>"><input type="hidden"
                                                                                                 name="file_name[]"
                                                                                                 value="<?= $file->document ?>">
                                </td>
                            </tr>
                        <? endforeach ?>
                        </tbody>
                    </table>

                    <script>
                        var numFiles = $("input:file")[0].files.length;

                        $("input:file").change(function () {
                            $('.files').show();
                            $($("input:file")[0].files).each(function (indx, file) {
                                $('.files tbody').append('<tr>' +
                                    '<td class="col-sm-3">' + file.name + '</td>' +
                                    '<td class="col-sm-9"><input type="text" name="file_comment[]"></td>' +
                                    '</tr>');
                            });
                        });
                    </script>
                </div>

            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Status</label>

                <div class="col-sm-10">
                    <? foreach (dd2menu('status', array('status_id' => 'name'), FALSE, TRUE, array('status.name' => 'ASC')) as $key => $value): ?>
                        <label>
                            <?= form_radio("status_id", $key, set_radio('status_id', $key, $item->status_id == $key ? TRUE : FALSE)) ?> <?= $value ?>
                            <br/>
                        </label>
                        <br>
                    <? endforeach ?>

                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Payment</label>

                <div class="col-sm-10">
                    <input type="radio" value="yes" name="payment"
                           <?php if (set_value('payment', $item->payment) == 'yes'): ?>checked="checked"<? endif; ?>>
                    yes <br/>
                    <input type="radio" value="no" name="payment"
                           <?php if (set_value('payment', $item->payment) == 'no'): ?>checked="checked"<? endif; ?>> No

                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-10 control-label"></label>

                <div class="col-sm-10">
                    <input type="submit" class="btn btn-secondary " name="submit" value="Submit">
                    <a href="<?php echo site_url('admin/files/index'); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </div>


        </form>

    </div>
</div>
<script>

    function company_changes(id) {
        $.post('<?= site_url('admin/files/get_branches') ?>/<?= set_value('branch_id', $item->branch_id) ?>', {company_id: id}, function (response) {
            $('.selected_branch').html(response);
        });
    }
    function certificate_changes(id) {

        var array = $("input[name='category_id\[\]']:checked").map(function () {
            return this.value;
        }).get();
        var myJsonString = JSON.stringify(array);

        $.post('<?= site_url('admin/files/get_categories') ?>/' + id + '/<?= $item->file_id ?>', {arr: myJsonString}, function (response) {
            $('.categories').html(response);
        });

        $.post('<?= site_url('admin/files/get_grades') ?>/' + id + '/<?= $item->grade_id ?>', function (response) {
            $('.selected_grade').html(response);
        });

        $.post('<?= site_url('admin/files/get_option') ?>/' + id + '/<?= $item->option_id ?>', function (response) {
            $('.selected_option').html(response);
        });

        var _array = $("input[name='crop_id\[\]']:checked").map(function () {
            return this.value;
        }).get();
        var myJsonString = JSON.stringify(_array);


        $.post('<?= site_url('admin/files/get_crops') ?>/' + id + '/<?= $item->file_id ?>', function (response) {
            $('.selected_crop').html(response);
        });
    }

    $('.RemoveDocument').on('click', function () {
        $(this).parent().parent().remove();
    });


    <? if ($_POST): ?>
    company_changes(<?= set_value('company_id', $item->company_id) ?>);
    certificate_changes(<?= set_value('certificate_id', $item->certificate_id) ?>);
    <? endif ?>
    certificate_changes(<?= set_value('certificate_id', $item->certificate_id) ?>);
    company_changes(<?= set_value('company_id', $item->company_id) ?>);
</script>
<style>
    .file-document-description input[type="text"] {
        width: 100%;
        line-height: 25px;
        border: 1px solid #dedede;
        padding-left: 10px;
    }

    .file-document-description input[type="text"]:focus {
        outline: 0;
    }

    a.RemoveDocument {
        float: right;
        background-color: #ab2d32;
        color: #fff;
        width: 15px;
        line-height: 15px;
        text-align: center;
        font-size: 8px;
        border-radius: 2px;
        text-decoration: none;
    }

    a.RemoveDocument:hover {
        text-decoration: none;
    }
</style>