<div class="page-title">

    <div class="title-env">
        <h1 class="title">Cities</h1>

        <p class="description"></p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1">
            <li>
                <a href="<?= site_url('admin/dashboard') ?>"><i class="fa-home"></i>Dashboard</a>
            </li>
            <li class="active">
                <strong>Cities</strong>
            </li>
        </ol>

    </div>

</div>

<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">List Of Cities</h3>

        <div class="panel-options">
            <a href="<?php echo site_url('admin/cities/manage'); ?>" class="btn btn-secondary btn-sm"
               style="color:#fff">Add</a>
        </div>
    </div>
    <div class="panel-body">

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>City</th>
                <th>Operations</th>
            </tr>
            </thead>

            <tbody class="middle-align">
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo $item->name ?></td>
                    <td>
                        <a href="<?php echo site_url('admin/zipcodes/index/' . $item->city_id); ?>"
                           class="btn btn-danger btn-sm btn-icon icon-left">
                            Zipcodes
                        </a>

                        <a href="<?php echo site_url('admin/cities/manage/' . $item->city_id); ?>"
                           class="btn btn-orange btn-sm btn-icon icon-left">
                            Edit
                        </a>

                        <a href="<?php echo site_url('admin/cities/delete/' . $item->city_id); ?>"
                           class="btn btn-danger btn-sm btn-icon icon-left">
                            Delete
                        </a>


                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                <?= $pagination ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function ($) {
        $("#datatable").dataTable();
    });
</script>

<link rel="stylesheet" href="<?= STYLE_CSS ?>/datatables/dataTables.bootstrap.css">
<script src="<?= STYLE_JS ?>/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= STYLE_JS ?>/datatables/dataTables.bootstrap.js"></script>
<script src="<?= STYLE_JS ?>/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
<script src="<?= STYLE_JS ?>/datatables/tabletools/dataTables.tableTools.min.js"></script>

