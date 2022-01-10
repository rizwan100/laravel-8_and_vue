<?php $__env->startSection('body'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                            <span class="h4">User List</span>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addUserModal">
                                <i class="fa fa-plus"><b> Add New</b></i>
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="brandDatatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>User Role</th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php ($sl = 1); ?>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($sl++); ?></td>
                                    <td><?php echo e($users->role == 1?'Admin':'Vendor'); ?></td>
                                    <td><?php echo e($users->name); ?></td>
                                    <td><?php echo e($users->phone); ?></td>
                                    <td><?php echo e($users->email); ?></td>
                                    <td><?php echo e($users->address); ?></td>
                                    <td><?php echo e($users->status == 1?'Active':'Inactive'); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>User Role</th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Status</th>
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
    <?php echo $__env->make('admin.users.addUser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\lara3-master\resources\views/admin/users/user.blade.php ENDPATH**/ ?>