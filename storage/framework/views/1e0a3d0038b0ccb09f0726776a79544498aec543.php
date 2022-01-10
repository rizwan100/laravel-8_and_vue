<?php ($sl = 1); ?>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($sl++); ?></td>
                                            <td id="t_cat_name" data-id1="<?php echo e($category->id); ?>" ondblclick="this.contentEditable=true" onblur="this.contentEditable=false"><?php echo e($category->cat_name); ?></td>
                                            <td id="t_cat_desc" data-id2="<?php echo e($category->id); ?>" contenteditable><?php echo e($category->cat_desc); ?></td>
                                            <td>
                                                <?php if($category->cat_image == ''): ?>
                                                No Image
                                                <?php else: ?>
                                                <img src="<?php echo e(asset($category->cat_image)); ?>" height="50px" alt="category image">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($category->cat_status == 1): ?>
                                                <a id="<?php echo e($category->id); ?>" href="" class="btn btn-primary unpublish" data-toggle="tooltip" title="Published">
                                                    <i class="fa fa-arrow-up"></i>
                                                </a>
                                                <?php else: ?>
                                                <a id="<?php echo e($category->id); ?>" href="" class="btn btn-warning publish" data-toggle="tooltip" title="Unpublished">
                                                    <i class="fa fa-arrow-down"></i>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a id="<?php echo e($category->id); ?>" href="#editCatModal" class="btn btn-success edit" data-toggle="modal">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a id="<?php echo e($category->id); ?>" href="" class="btn btn-danger delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        
        <?php echo $__env->make('admin.category.edit-category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\laragon\www\lara3-master\resources\views/admin/category/getTableData.blade.php ENDPATH**/ ?>