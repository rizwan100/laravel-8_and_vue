<!-- <?php $__env->startPush('style'); ?>
<style>
    .hideMyid{
display:none;
}

</style>
<?php $__env->stopPush(); ?> -->

<?php $__env->startSection('body'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Brand Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Brand</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            <?php if(session('message')): ?>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            <?php endif; ?>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <span class="h4">Brand List</span>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addBrandModal">
                                <i class="fa fa-plus"><b> Add New</b></i>
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="brandDatatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sl No.</th>
                                    <th>Brand Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php ($sl = 1); ?>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class=""><?php echo e($brand->id); ?></td>
                                        <td><?php echo e($sl++); ?></td>
                                        <td><?php echo e($brand->brand_name); ?></td>
                                        <td><?php echo e($brand->brand_desc); ?></td>
                                        <td>
                                            <?php if($brand->brand_image == ''): ?>
                                                No Image
                                            <?php else: ?>
                                                <img src="<?php echo e(asset($brand->brand_image)); ?>" height="50px" alt="brand image">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($brand->brand_status == 1): ?>
                                                <a href="<?php echo e(route('brand.unpublish',$brand->id)); ?>" class="btn btn-primary" data-toggle="tooltip" title="Published">
                                                    <i class="fa fa-arrow-up"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('brand.publish',$brand->id)); ?>" class="btn btn-warning" data-toggle="tooltip" title="Unpublished">
                                                    <i class="fa fa-arrow-down"></i>
                                                </a>
                                            <?php endif; ?>
                                            
                                        </td>
                                        <td>
                                            <a href="#editBrandModal" class="edit btn btn-success" data-toggle="modal" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <a href="<?php echo e(route('admin.brand.delete', $brand->id)); ?>" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Sl No.</th>
                                    <th>Brand Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php $__env->startPush('script'); ?>
        <script>
            //for datatable
            $(document).ready( function () {
                var table = $('#brandDatatable').DataTable();
                table.column(0).visible(false);

                //start edit record
                table.on('click', '.edit', function(){
                    $tr = $(this).closest('tr');
                    if ($($tr).hasClass('child')) {
                        $tr = $tr.prev('.parent');
                    }
                    var data = table.row($tr).data();
                    console.log(data);
                    $('#brand_name2').val(data[2]);
                    $('#brand_desc2').val(data[3]);
                    $('#photo2').append(data[4]);

                    $('#editform').attr('action', 'brand/update/'+data[0])
                });
                
            } );
            //show modal after error occured
            <?php if(count($errors) > 0): ?>
            $('#addBrandModal').modal('show');
            <?php endif; ?>
            //uploaded image preview
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewHolder').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#filePhoto").change(function() {
                readURL(this);
            });
            //popover
            $(function () {
                $('[data-toggle="popover"]').popover()
            })
            //tooltip
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    <?php $__env->stopPush(); ?>
    
    <?php echo $__env->make('admin.brand.add-brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('admin.brand.edit-brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\lara3-master\resources\views/admin/brand/brand.blade.php ENDPATH**/ ?>