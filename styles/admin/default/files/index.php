<div class="page-title">
    <div class="title-env">
        <h1 class="title">Files</h1>
        <p class="description"></p>
    </div>
    <div class="breadcrumb-env">
        <ol class="breadcrumb bc-1" >
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
            <a href="<?php echo site_url('admin/files/manage'); ?>" class="btn btn-secondary btn-sm" style="color:#fff">Add</a>
        </div>
    </div>
    <div class="panel-body">
        <form role="form" class="form-horizontal" role="form" method="get" enctype="multipart/form-data" id="form">
            <div class="form-group">
                <div class="col-sm-2">
                    Serial
                </div>
                <div class="col-sm-4">
                    <?= form_input('serial', set_value('serial', $this->input->get('serial')), 'class="form-control" id="autocomplete"') ?>
                </div>
            </div>

            <div class="form-group-separator"></div>

            <div class="form-group-sm">
                <div class="">
                    <input type="submit" value="Search" class="btn btn-success">
                </div>
            </div>

        </form>
        <div class="form-group-separator"></div>


        <table class="table table-bordered table-striped" id="datatable">
            <thead>
                <tr>
                    <th>File Number</th>
                    <th>Company</th>
                    <th>Facility</th>
                    <th>Serial</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody class="middle-align">
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo $item->number ?></td>
                        <td><?php echo $item->business_name ?></td>
                        <td><?php echo $item->branch_name ?></td>
                        <td><?php echo $item->serial ?></td>
                        <td>
                            <a href="<?php echo site_url('admin/files/manage/' . $item->file_id); ?>" class="btn btn-orange btn-sm btn-icon icon-left">
                                Edit
                            </a>

                            <a data-href="<?php echo site_url('admin/files/delete/' . $item->file_id); ?>" class="btn btn-danger btn-sm btn-icon btn-delete"
                               data-toggle="modal" data-target="#deleteMsg" style="color:#fff;">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?= $pagination ?>

    </div>
</div>

<div class="modal fade" id="deleteMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">System Message</h4>
            </div>
            <div class="modal-body">
                <span style="color:#777;">Are you sure need to delete this record ?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-grey btn-icon" data-dismiss="modal" style="color: grey;">No</button>
                <a class="btn btn-danger btn-icon modal_delete_btn" href="" >Delete</a>
            </div>
        </div>
    </div>
</div>


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<script>
    $('.btn-delete').click(function () {
        $('.modal_delete_btn').attr('href', $(this).data('href'));

//        return false;
    });


</script>
<script>
    $(function() {
        $( "#autocomplete" ).autocomplete({
            source: "<?= site_url('admin/files/serial_autocomplete') ?>",
            minLength: 1
        });
    });
</script>

