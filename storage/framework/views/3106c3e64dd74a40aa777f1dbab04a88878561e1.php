<?php $__env->startSection('body'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                            <span class="h4">Product List</span>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addProductModal">
                                <i class="fa fa-plus"><b> Add New</b></i>
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="productDatatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Uploaded_by</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php ($sl = 1); ?>
                                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(Auth::user()->id == 1): ?>
                                    <tr>
                                        <td><?php echo e($sl++); ?></td>
                                        <td><?php echo e($products->cat_name); ?></td>
                                        <td><?php echo e($products->brand_name); ?></td>
                                        <td><?php echo e($products->product_name); ?></td>
                                        <td>৳ <?php echo e($products->product_price); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset($products->image)); ?>" height="100px" alt="image">
                                        </td>
                                        <td><?php echo e($products->status=='1'?'Active':'Inactive'); ?></td>
                                        <td><?php echo e($products->name); ?></td>
                                        <td>
                                            <a href="#viewProductModal" class="btn btn-info" data-toggle="modal">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#editProductModal" id="<?php echo e($products->id); ?>" class="edit btn btn-success" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <form action="<?php echo e(route('product.destroy',$products->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php elseif($products->uploaded_by == Auth::user()->id): ?>
                                    <tr>
                                        <td><?php echo e($sl++); ?></td>
                                        <td><?php echo e($products->cat_name); ?></td>
                                        <td><?php echo e($products->brand_name); ?></td>
                                        <td><?php echo e($products->product_name); ?></td>
                                        <td>৳ <?php echo e($products->product_price); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset($products->image)); ?>" height="100px" alt="image">
                                        </td>
                                        <td><?php echo e($products->status=='1'?'Active':'Inactive'); ?></td>
                                        <td><?php echo e($products->name); ?></td>
                                        <td>
                                            <a href="#viewProductModal" class="btn btn-info" data-toggle="modal">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#editProductModal" id="<?php echo e($products->id); ?>" class="edit btn btn-success" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <form action="<?php echo e(route('product.destroy',$products->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Uploaded_by</th>
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
    
    
    <?php echo $__env->make('admin.product.add-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('admin.product.edit-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    
    <?php echo $__env->make('admin.product.view-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>

    <script>
        $(document).ready( function () {
            //for datatable
            $('#productDatatable').DataTable();

            //show data for edit modal
            $(document).on('click', '.edit', function(e){
                $('#editProductModal').modal('show');
                e.preventDefault();
                var id = $(this).attr('id');
                $.ajax({
                    url: "<?php echo e(url('admin/product')); ?>/"+id,
                    method: "GET",
                    success: function(data){
                        console.log(data);
                            
                            $('#e_product_cat').val(data.cat_id);
                            $('#e_product_brand').val(data.brand_id);
                            $('#e_product_name').val(data.product_name);
                            $('#e_short_desc').val(data.short_desc);
                            $('#e_long_desc').val(data.long_desc);
                            $('#e_discount_price').val(data.discount_price);
                            $('#e_product_price').val(data.product_price);
                            $('#e_quantity').val(data.quantity);
                            $('#e_product_size').val(data.size);
                            $('#e_product_status').val(data.status);

                            $('#updateProductForm').attr('action', 'product/'+id);
                    }
                })
            });
        });
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\lara3-master\resources\views/admin/product/product.blade.php ENDPATH**/ ?>