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
                    <form action="<?php echo e(route('list_groups.todolists.update', [$listGroup, $todolist])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="card-header" style="background-color: #d3b6a0;"><?php echo e(__('Edit To Do List ')); ?></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">To Do List</label>
                                <input value="<?php echo e($todolist->name); ?>" type="text" class="form-control" name="name"
                                    placeholder="List Name">
                            </div>
                            <button type="submit" class="btn btn-primary">Save To Do List</button>
                        </div>
                    </form>
                </div>
                <div class="container mt-3">
                    <form action="<?php echo e(route('list_groups.todolists.destroy', [$listGroup, $todolist])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this item?')">Delete
                            This List</button>
                    </form>
                </div>
                
                <hr />
                <h2><?php echo e(__('Subtasks in ')); ?> <?php echo e($todolist->name); ?></h2>

                <div class="card mb-4 mt-4 p-4">
                    <table class="table">
                        <tbody>
                            <?php $__currentLoopData = $todolist->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <form id="task-form-<?php echo e($task->id); ?>" action="<?php echo e(route('todolists.tasks.update', [$todolist, $task])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <div class="form-check">
                                                <input type="hidden" name="completed" value="0">
                                                <input class="form-check-input" type="checkbox" value="1" id="completed-<?php echo e($task->id); ?>" name="completed" <?php echo e($task->completed ? 'checked' : ''); ?>

                                                onchange="document.getElementById('task-form-<?php echo e($task->id); ?>').submit();">
                                                <label class="form-check-label" for="completed-<?php echo e($task->id); ?>"><?php echo e($task->name); ?></label>
                                            </div>
                                        </form>                                                                               
                                        <p> Due Date: <?php echo e($task->due_date); ?> <br> Due Time: <?php echo e($task->due_time); ?></p>
                                    </td>

                                    
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="<?php echo e(route('todolists.tasks.edit', [$todolist, $task])); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                              </svg></a>

                                        <form style="display: inline-block"
                                            action="<?php echo e(route('todolists.tasks.destroy', [$todolist, $task])); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this item?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                  </svg></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <hr />

                
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
                    <form action="<?php echo e(route('todolists.tasks.store', [$todolist])); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">New Subtask</label>
                                <input value="<?php echo e(old('name')); ?>" type="text" class="form-control" name="name"
                                    placeholder="Task name">
                            </div>
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Due Date and Time</label>
                                <input id="due_date" type="date" class="form-control" name="due_date"
                                    value="<?php echo e(old('due_date')); ?>">
                                <input id="due_time" type="time" class="form-control mt-3" name="due_time"
                                    value="<?php echo e(old('due_time')); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea rows="5" class="form-control" name="description"><?php echo e(old('description')); ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Subtask</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sf-monica/elista/resources/views/todolists/edit.blade.php ENDPATH**/ ?>