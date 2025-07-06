<?php $__env->startSection('content'); ?>

<div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Add Product</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="<?php echo e(route('admin.index')); ?>">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('admin.products')); ?>">
                                                <div class="text-tiny">Products</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Edit Product</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- form-add-product -->
                                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="<?php echo e(route('admin.product.update')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type = "hidden" name = "id" value = "<?php echo e($product->id); ?>" />
                                    <div class="wg-box">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0" value="<?php echo e($product->name); ?>" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter product slug"  name="slug" tabindex="0" value="<?php echo e($product->slug); ?>" aria-required="true" required="">
                                            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                                        </fieldset>
                                        <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <div class="gap22 cols">
                                            <fieldset class="category">
                                                <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                                                </div>
                                                <div class="select">
                                                    <select class="" name="category_id">
                                                        <option>Choose category</option>
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>" <?php echo e($product->category_id == $category->id ? "selected":""); ?>><?php echo e($category->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <fieldset class="brand">
                                                <div class="body-title mb-10">Brand <span class="tf-color-1">*</span>
                                                </div>
                                                <div class="select">
                                                    <select class="" name="brand_id">
                                                        <option>Choose Brand</option>
                                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($brand->id); ?>" <?php echo e($product->brand_id == $brand->id ? "selected":""); ?>><?php echo e($brand->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <fieldset class="skin-tone">
                                            <div class="body-title mb-10">Skin Tone <span class="tf-color-1">*</span></div>
                                            <div class="skin-tone-options">
                                                <?php
                                                    $selectedTones = $product->skin_tone ?? [];
                                                ?>
                                                <label><input type="checkbox" name="skin_tone[]" value="fair" <?php echo e(in_array('fair', $selectedTones) ? 'checked' : ''); ?>> Fair</label>&nbsp;&nbsp;
                                                <label><input type="checkbox" name="skin_tone[]" value="normal" <?php echo e(in_array('normal', $selectedTones) ? 'checked' : ''); ?>> Normal</label>&nbsp;&nbsp;
                                                <label><input type="checkbox" name="skin_tone[]" value="dark" <?php echo e(in_array('dark', $selectedTones) ? 'checked' : ''); ?>> Dark</label>
                                            </div>
                                        </fieldset>
                                        <?php $__errorArgs = ['skin_tone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                       <?php
    $selectedAges = is_array($product->age_range) ? $product->age_range : json_decode($product->age_range ?? '[]', true);
?>

<fieldset class="age-range">
    <div class="body-title mb-10">Age Range <span class="tf-color-1">*</span></div>
    <div class="age-range-options">
        <label><input type="checkbox" name="age_range[]" value="18-25" <?php echo e(in_array('18-25', $selectedAges) ? 'checked' : ''); ?>> 18–25</label>&nbsp;&nbsp;
        <label><input type="checkbox" name="age_range[]" value="26-35" <?php echo e(in_array('26-35', $selectedAges) ? 'checked' : ''); ?>> 26–35</label>&nbsp;&nbsp;
        <label><input type="checkbox" name="age_range[]" value="36-45" <?php echo e(in_array('36-45', $selectedAges) ? 'checked' : ''); ?>> 36–45</label>&nbsp;&nbsp;
        <label><input type="checkbox" name="age_range[]" value="46-60" <?php echo e(in_array('46-60', $selectedAges) ? 'checked' : ''); ?>> 46–60</label>
    </div>
</fieldset>



                                        <fieldset class="shortdescription">
                                            <div class="body-title mb-10">Short Description <span   class="tf-color-1">*</span></div>
                                            <textarea class="mb-10 ht-150" name="short_description" placeholder="Short Description" tabindex="0" aria-required="true" required=""><?php echo e($product->short_description); ?></textarea>
                                            <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                                        </fieldset>
                                        <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                                            </div>
                                            <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" aria-required="true" required=""><?php echo e($product->description); ?></textarea>
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>
                                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="wg-box">
                                        <fieldset>
                                            <div class="body-title">Upload images <span class="tf-color-1">*</span>
                                            </div>
                                            <div class="upload-image flex-grow">
                                                <div class="item" id="imgpreview">
                                                    <?php if($product->image): ?>
                                                    <img src="<?php echo e(asset('uploads/products')); ?>/<?php echo e($product->image); ?>" class="effect8" alt="<?php echo e($product->name); ?>">
                                                </div>
                                                <?php endif; ?>
                                                <div id="upload-file" class="item up-load">
                                                    <label class="uploadfile" for="myFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                                        <input type="file" id="myFile" name="image" accept="image/*">
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <fieldset>
                                            <div class="body-title mb-10">Upload Gallery Images</div>
                                            <div class="upload-image mb-16">
                                            <?php if($product->images): ?>
                                            <?php $__currentLoopData = explode(',',$product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="item gitems">
                                             <img src="<?php echo e(asset('uploads/products')); ?>/<?php echo e(trim($img)); ?>" alt="">
                                           </div>  
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                           <?php endif; ?>                                           
                                                <div id="galUpload" class="item up-load">
                                                    <label class="uploadfile" for="gFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="text-tiny">Drop your images here or select <span
                                                                class="tf-color">click to browse</span></span>
                                                        <input type="file" id="gFile" name="images[]" accept="image/*" multiple="">
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Regular Price <span class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter regular price" name="regular_price" tabindex="0" value="<?php echo e($product->regular_price); ?>" aria-required="true"  required="">
                                            </fieldset>
                                            <?php $__errorArgs = ['regular_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Sale Price <span  class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="text" placeholder="Enter sale price" name="sale_price" tabindex="0" value="<?php echo e($product->sale_price); ?>" aria-required="true" required="">
                                            </fieldset>
                                            <?php $__errorArgs = ['sale_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>


                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU" tabindex="0" value="<?php echo e($product->SKU); ?>" aria-required="true" required="">
                                            </fieldset>
                                            <?php $__errorArgs = ['SKU'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter quantity" name="quantity" tabindex="0" value="<?php echo e($product->quantity); ?>" aria-required="true"  required="">
                                            </fieldset>
                                            <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Stock</div>
                                                <div class="select mb-10">
                                                    <select class="" name="stock_status">
                                                        <option value="instock" <?php echo e($product->stock_status == "instock" ? "selected":""); ?>>InStock</option>
                                                        <option value="outofstock" <?php echo e($product->stock_status == "outofstock" ? "selected":""); ?>>Out of Stock</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <?php $__errorArgs = ['stock_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Featured</div>
                                                <div class="select mb-10">
                                                    <select class="" name="featured">
                                                        <option value="0" <?php echo e($product->featured == "0" ? "selected":""); ?>>No</option>
                                                        <option value="1" <?php echo e($product->featured == "1" ? "selected":""); ?>>Yes</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <?php $__errorArgs = ['featured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="alert alert-danger text-center"><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="cols gap10">
                                            <button class="tf-button w-full" type="submit">Update product</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- /form-add-product -->
                            </div>
                            <!-- /main-content-wrap -->
                        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(function(){
        $("#myFile").on("change",function(e){
            const photoInp = $("#myFile");
            const[file] = this.files;
            if(file)
           {

            $("#imgpreview img").attr('src',URL.createObjectURL(file));
            $("#imgpreview").show();

           }

        });

        $("#gFile").on("change",function(e){
            const photoInp = $("#gFile");
            const gphotos = this.files;
            $.each(gphotos,function(key,val){
                $("#galUpload").prepend(`<div class = "item gitems"><img src="${URL.createObjectURL(val)}" /></div>`);
            });

        });

        $("input[name='name']").on("change",function(){
            $("input[name='slug']").val(StringToSlug($(this).val()));

        });

    });

    function StringToSlug(Text)
    {
        return Text.toLowerCase()
        .replace(/[^\w ]+/g,"")
        .replace(/ +/g,"-");
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PMLS\Documents\Final-Year-Project\laravelfyp\resources\views/admin/product-edit.blade.php ENDPATH**/ ?>