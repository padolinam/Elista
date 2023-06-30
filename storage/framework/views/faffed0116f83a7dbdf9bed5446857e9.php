<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('list_groups.update', $listGroup)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="card-header" style="background-color: #d3b6a0;"><?php echo e(__('Edit To Do List Group')); ?></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">TASKS</label>
                                <input value="<?php echo e($listGroup->name); ?>" type="text" class="form-control" name="name">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
                <div class="container mt-3">
                    <form action="<?php echo e(route('list_groups.destroy', $listGroup)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('You are deleting the entire list. Confirm?')">Delete This List Group</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sf-monica/elista/resources/views/list_groups/edit.blade.php ENDPATH**/ ?>