<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form id="addProductForm" method="post" action="<?php echo e(route('product.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product_status">Category</label>
                        <select class="form-control" name="cat_id" id="product_cat">
                            <option value="">Select Category</option>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categories->id); ?>"><?php echo e($categories->cat_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_status">Brand</label>
                        <select class="form-control" name="brand_id" id="product_brand">
                            <option value="">Select Brand</option>
                            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brands): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($brands->id); ?>"><?php echo e($brands->brand_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="short_desc">Short Description</label>
                        <textarea class="form-control" name="short_desc" id="short_desc" placeholder="Enter Product Short Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="long_desc">Long Description</label>
                        <textarea class="form-control" name="long_desc" id="long_desc" placeholder="Enter Product Long Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="discount_price">Discount Price</label>
                        
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">???</div>
                            </div>
                            <input type="text" class="form-control" name="discount_price" id="discount_price" placeholder="Discount price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">???</div>
                            </div>
                            <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Product price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Total quantity">
                    </div>
                    <div class="form-group">
                        <label for="product_size">Size</label>
                        <select class="form-control" name="size" id="product_size">
                            <option value="">Select size</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">XL</option>
                            <option value="xxl">XXL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filePhoto">Product Image</label>
                        <input type="file" name="product_image" class="form-control-file" id="filePhoto4" onchange="preview_image(event)">
                        <img src="" id="previewHolder" width="150px">
                    </div>
                    <div class="form-group">
                        <label for="filePhoto">Gallery Image</label>
                        <input type="file" name="gallery_image[]" class="form-control-file" id="filePhoto3" multiple>
                    </div>
                    <div class="form-group">
                        <label for="product_status">Publication Status</label>
                        <select class="form-control" name="status" id="product_status">
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\lara3-master\resources\views/admin/product/add-product.blade.php ENDPATH**/ ?>