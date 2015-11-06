<style>
    td.for_uploaded_img{
        text-align: center;
    }
    .uploaded_img{
        width:75px;
        height: 75px;
        display: block;
        border: 5px solid #fff;
        border-radius:100%;
    }
    .uploaded_img img{
        width:100%;
        border-radius: 100%;
        overflow: hidden;
    }
</style>
<div class="page-title">

    <div class="title-env">
        <h1 class="title">Companies</h1>
        <p class="description"></p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?= site_url('admin/dashboard') ?>"><i class="fa-home"></i>Dashboard</a>
            </li>
            <li class="active">
                <strong>Companies</strong>
            </li>
        </ol>

    </div>

</div>

<!-- Admin Table-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">List Of Companies</h3>
        <div class="panel-options">
            <a href="<?php echo site_url('admin/companies/manage'); ?>" class="btn btn-secondary btn-sm" style="color:#fff">Add</a>
        </div>
    </div>
    <div class="panel-body">

        <table class="table table-bordered table-striped" id="datatable">
            <thead>
                <tr>
                    <th>Business Name</th>
                    <th>Business Type</th>
                    <th>Logo</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody class="middle-align">
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo $item->business_name ?></td>
                        <td><?php echo $item->name ?></td>
                        <td class="form_uploaded_img"><span class="uploaded_img"><img src="<?php echo $item->logo ?>"> </span></td>
                        <td>
                            <a href="<?php echo site_url('admin/branches/index/' . $item->company_id); ?>" class="btn btn-secondary btn-sm btn-icon icon-left">
                                Facilities
                            </a>

                            <a href="<?php echo site_url('admin/companies/manage/' . $item->company_id); ?>" class="btn btn-orange btn-sm btn-icon icon-left">
                                Edit
                            </a>
                            <a data-href="<?php echo site_url('admin/companies/delete/' . $item->company_id); ?>" class="btn btn-danger btn-sm btn-icon btn-delete"
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

<script>
    $('.btn-delete').click(function () {
        $('.modal_delete_btn').attr('href', $(this).data('href'));

//        return false;
    });
</script>

