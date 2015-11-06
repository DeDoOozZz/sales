<section class="vbox">

    <section class="scrollable wrapper">
        <section class="panel">
            <header class="panel-heading">
                <?= lang('settings_unit_title') ?>
            </header>
            <br />
            <?= form_open_multipart(false, 'class="form-horizontal" data-validate="parsley"') ?>
            <? if (validation_errors()): ?>
            <div class="error"><?= validation_errors() ?></div>
            <? endif ?>            
            <div class="form-group">
                <label class="col-sm-3 control-label"><?= lang('settings_title') ?></label>
                <div class="col-sm-9">
                    <?= form_input('setting[title]', set_value('setting[title]', $item->title), 'class="bg-focus form-control" data-required="true" id="title"') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Page Limit</label>
                <div class="col-sm-9">
                    <?= form_input('setting[pagination_limit]', set_value('setting[pagination_limit]', $item->pagination_limit), 'class="bg-focus form-control" data-required="true" id="pagination_limit"') ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Show Ad each (number of articles)</label>
                <div class="col-sm-9">
                    <?= form_input('setting[ad]', set_value('setting[ad]', $item->ad), 'class="bg-focus form-control" data-required="true" id="ad"') ?>
                </div>
            </div>
            <hr />


            <h4>Latest Category News Settings</h4>

            <div class="form-group">
                <label class="col-sm-3 control-label">Select Categories</label>
                <div class="col-sm-9">
                    <?php foreach (dd2menu('categories', array('category_id' => 'title'), false, true) as $key => $value ): ?>
                    <label>
                        <input type="checkbox" name="lcn[random_cats][]" value="<?= $key ?>" <?php if(set_value('lcn[random_cats][]', in_array($key, $item->random_cats))): ?> checked="checked" <? endif ?> >
                        <?= $value ?>
                    </label>
                    <br>
                    <? endforeach ?>
                </div>
            </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Number of articles</label>
                            <div class="col-sm-9">
            <?= form_input('lcn[num_of_articles]', set_value('lcn[num_of_articles]', $item->num_of_articles), 'class="bg-focus form-control" data-required="true" id="ad"') ?>
                            </div>
                        </div>
            <!--
            
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Text</label>
                            <div class="col-sm-9">
            <?= form_textarea('lcn[lcn_text]', set_value('lcn[lcn_text]', $item->lcn_text), 'class="bg-focus form-control" data-required="true" id="ad"') ?>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-7">
            <?= form_upload('image', null, 'class="bg-focus form-control" data-required="true" id="ad"') ?>
                            </div>
                            <div class="col-sm-2">
                                <a href="javascript:delete_image()" class="btn btn-danger btn-xl" style="width: 100%;">Remove</a>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Code</label>
                            <div class="col-sm-9">
            <?= form_textarea('lcn[lcn_code]', set_value('lcn[lcn_code]', $item->lcn_code), 'class="bg-focus form-control" data-required="true" id="ad"') ?>
                            </div>
                        </div>-->
            <div class="form-group-separator"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Editor1</label>
                <div class="compose-message-editor col-sm-9">
                    <textarea class="form-control" name="lcn[editor1]" id="editor1"><?php echo set_value('lcn[editor1]', $item->editor1) ?></textarea>
                </div>
            </div>

            <div class="form-group-separator"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Editor2</label>
                <div class="compose-message-editor col-sm-9">
                    <textarea class="form-control" name="lcn[editor2]" id="editor2"><?php echo set_value('lcn[editor2]', $item->editor2) ?></textarea>
                </div>
            </div>

            <div class="form-group-separator"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Editor3</label>
                <div class="compose-message-editor col-sm-9">
                    <textarea class="form-control" name="lcn[editor3]" id="editor3"><?php echo set_value('lcn[editor3]', $item->editor3)?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-secondary"><?= lang('global_submit') ?></button>
                    <button type="reset" class="btn btn-white"><?= lang('global_reset') ?></button>
                </div>
            </div>
            <?= form_close() ?>
        </section>
    </section>
</section>

<script src="<?= STYLE_JS ?>/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
    function delete_image() {
        $.get('<?= site_url('admin/settings/remove_image') ?>', function (d) {
            alert('Image has been removed successfully');
        });
    }



    $(document).ready(function () {
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
    });
</script>