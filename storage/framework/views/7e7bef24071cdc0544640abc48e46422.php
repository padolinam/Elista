<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <?php if($errors->storetask->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->storetask->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('todolists.tasks.update', [$todolist, $task])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="card-header" style="background-color: #d3b6a0;"><?php echo e(__('Edit Task')); ?></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Task Name</label>
                                <input value="<?php echo e($task->name); ?>" type="text" class="form-control" name="name">
                            </div>

                            <div class="mb-3">
                                <label for="due_date" class="form-label">Due Date and Time</label>
                                <input type="date" class="form-control" name="due_date" value="<?php echo e($task->due_date); ?>">
                                <input type="time" class="form-control mt-3" name="due_time" value="<?php echo e($task->due_time); ?>" >
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea rows="5" class="form-control" name="description"><?php echo e($task->description); ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Task</button>
                        </div>
                    </form>
                </div>

         
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sf-monica/elista/resources/views/tasks/edit.blade.php ENDPATH**/ ?>