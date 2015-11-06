<div class="page-title">

    <div class="title-env">
        <h1 class="title">Files</h1>

        <p class="description"></p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1">
            <li>
                <a href="<?= site_url('admin/dashboard') ?>"><i class="fa-home"></i>Dashboard</a>
            </li>
            <li class="active">
                <strong>Files</strong>
            </li>
        </ol>

    </div>

</div>

<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">List Of Files</h3>

        <div class="panel-options">
            <!--<a href="<?php echo site_url('admin/files/manage'); ?>" class="btn btn-secondary btn-sm" style="color:#fff">Add</a>-->
        </div>
    </div>
    <div class="panel-body">
        <form role="form" class="form-horizontal" role="form" method="get" enctype="multipart/form-data" id="form">
            <div class="form-group">
                <div class="col-sm-2">
                    Consultant
                </div>
                <div class="col-sm-4">
                    <?= form_dropdown('consultant', dd2menu('consultants', array('consultant_id' => 'first_name')), set_value('consultant', $this->input->get('consultant')), 'class="form-control"') ?>
                </div>

                <div class="col-sm-2">
                    Certificates
                </div>
                <div class="col-sm-4">
                    <?= form_dropdown('certificate', dd2menu('certificates', array('certificate_id' => 'name')), set_value('certificate', $this->input->get('certificate')), 'class="form-control"') ?>
                </div>
            </div>


            <div class="form-group">


                <div class="col-sm-2">
                    Country
                </div>
                <div class="col-sm-4">
                    <?= form_dropdown('country', dd2menu('countries', array('country_id' => 'name')), set_value('country', $this->input->get('country')), 'class="form-control"') ?>
                </div>


                <div class="col-sm-2">
                    Status
                </div>
                <div class="col-sm-4">
                    <?= form_dropdown('status', dd2menu('status', array('status_id' => 'name')), set_value('status', $this->input->get('status')), 'class="form-control"') ?>
                </div>
            </div>

            <div class="form-group-separator"></div>

            <div class="form-group">
                <div class="col-sm-2">
                    Serial
                </div>
                <div class="col-sm-4">
                    <?= form_input('serial', set_value('serial', $this->input->get('serial')), 'class="form-control" id="autocomplete"') ?>
                </div>
            </div>

            <div class="form-group-sm">
                <div class="">
                    <input type="submit" value="Search" class="btn btn-success">
                </div>
            </div>

        </form>
        <div class="form-group-separator"></div>

        <table class="table table-bordered table-striped" id="datatable">
            <?
            function sorting($var, $order_by, $sorting )
            {

                $_sorting = 'ASC&';
                if($order_by == $var && $sorting == 'ASC') {
                    $_sorting = 'DESC&';
                }

                return $_sorting;
            }
            ?>
                    <thead>
            <tr>
                <th>#</th>
                <th style="white-space: nowrap;"><a style="text-decoration: underline"
                       href="<?php echo site_url('admin/files/new_index/?order_by=serial&sorting=' . sorting('serial', $order_by, $sorting ) . $get); ?>">Serial</a></th>
                <th style="white-space: nowrap;">ME Number</th>
                <th style="white-space: nowrap;">Company</th>
                <th style="white-space: nowrap;">Facility</th>
                <th style="white-space: nowrap;"><a style="text-decoration: underline"
                       href="<?php echo site_url('admin/files/new_index/?order_by=consultant&sorting=' . sorting('consultant', $order_by, $sorting ) . $get); ?>">Consultant</a></th>
                <th style="white-space: nowrap;"><a style="text-decoration: underline"
                       href="<?php echo site_url('admin/files/new_index/?order_by=certification&sorting=' . sorting('certification', $order_by, $sorting ) . $get); ?>">Certificate</a></th>
                <th style="white-space: nowrap;"><a style="text-decoration: underline"
                       href="<?php echo site_url('admin/files/new_index/?order_by=status&sorting=' . sorting('status', $order_by, $sorting ) . $get); ?>">Status</a></th>
            </tr>
            </thead>

            <tbody class="middle-align">
            <?php if (!$i = $this->uri->segment(4)) $i = 0;
            foreach ($items as $item): ?>
                <tr>

                    <td><?= ++$i ?></td>
                    <td><?php echo $item->serial ?></td>
                    <td><?php echo $item->me_number ?></td>
                    <td class="company"
                        data-id="<?php echo $item->company_id ?>" data-num="<?= $i ?>"><?php echo $item->business_name ?></td>
                    <td class="facility" data-id="<?php echo $item->branch_id ?>" data-num="<?= $i ?>"><?php echo $item->branch_name ?></td>
                    <td class="consultant" data-id="<?php echo $item->consultant_id ?>" data-num="<?= $i ?>"><?php echo $item->consultant ?></td>
                    <td><?php echo $item->certificate ?></td>
                    <td><?php echo $item->status ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <?= $pagination ?>
    </div>
</div>

<style>
    .myToolTip {
        position: absolute;
        display: none;
        background: #eee;
        color: #777;
        z-index: 999999;
        left: 0;
        top: 0;
        min-width: 200px;
        padding: 5px;
        border: 1px solid #000;
        border-radius: 5px;
    }
    .company, .facility, .consultant {
        position: relative;
    }
</style>
<script>
    $(document).ready(function () {
        $('select').change(function () {

            if ($(this).attr('name') == 'consultant')
                $.get('<?= site_url('admin/files/ajax_filter_certificate') ?>', $('#form').serialize(), function (dr) {
                    $('select[name=certificate]').html(dr);
                });

            if ($(this).attr('name') == 'consultant' ||
                $(this).attr('name') == 'certificate'
            )
                $.get('<?= site_url('admin/files/ajax_filter_country') ?>', $('#form').serialize(), function (dr) {
                    $('select[name=country]').html(dr);
                });

            if ($(this).attr('name') == 'consultant' ||
                $(this).attr('name') == 'certificate' ||
                $(this).attr('name') == 'country'
            )
                $.get('<?= site_url('admin/files/ajax_filter_status') ?>', $('#form').serialize(), function (dr) {
                    $('select[name=status]').html(dr);
                });

        });

        $('.company').hover(function (event) {
            updateToolTip('company', $(this).data('id'), event, $(this).data('num'), $(this));
        }, function () {
//            $('.myToolTip').hide();
        });

        $('.facility').hover(function (event) {
            updateToolTip('facility', $(this).data('id'), event, $(this).data('num'), $(this));
        }, function () {
//            $('.myToolTip').hide();
        });

        $('.consultant').hover(function (event) {
            updateToolTip('consultant', $(this).data('id'), event, $(this).data('num'), $(this));
        }, function () {
//            $('.myToolTip').hide();
        });

    });
    function updateToolTip($entity, $id, event, num, $this) {
        var tooltipDiv = $('#' + $entity + '_' + $id + '_' + num);
        if(tooltipDiv.length) {
            tooltipDiv.show();

        } else {
            $this.append("<div class=\"myToolTip\" id=\"" + $entity + "_" + $id + '_' + num + "\"></div>");
            var tooltipDiv = $('#' + $entity + '_' + $id + '_' + num);
            tooltipDiv.show();
//            tooltipDiv.css('left', event.pageX);
//            tooltipDiv.css('top', event.pageY);
            $.get('<?= site_url('admin/files') ?>/get_' + $entity + "_details/" + $id, function (res) {
                tooltipDiv.html(res);
                tooltipDiv.show();
            });
        }
        $('.myToolTip').mouseleave(function(){
            $('.myToolTip').hide();
        });
    }
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<script>
    $(function () {
        $("#autocomplete").autocomplete({
            source: "<?= site_url('admin/files/serial_autocomplete') ?>",
            minLength: 1
        });
    });
</script>


