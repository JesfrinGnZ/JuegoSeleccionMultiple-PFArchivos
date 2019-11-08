<?php $__env->startSection('name'); ?>
administradores
<?php $__env->stopSection(); ?>

<?php $__env->startSection('seccion'); ?>
  <h2>Registro de Administradores</h2>
  <?php if(session('mensaje')): ?>
    <div class="alert alert-success">
      <?php echo e(session('mensaje')); ?>

    </div>

  <?php endif; ?>
  <form class="form-group" action="<?php echo e(route('admins.crear')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="">User:</label>
        <input type="text" name="user" class="form-control">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" class="form-control">
        <label for="">Password:</label>
        <input type="text" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bryan/Proyectos/JuegoSeleccionMultiple-PFArchivos/AppCuestionarios/resources/views/admins/admins.blade.php ENDPATH**/ ?>