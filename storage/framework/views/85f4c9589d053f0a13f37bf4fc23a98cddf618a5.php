<?php $__env->startSection('cabecalho'); ?>
Adicionar series
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
    <form method="post">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
            
        </div>

        <div class="col col-2">
            <label for="qtd_temporadas">Nº de temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas" >
            
        </div>

        <div class="col col-2">
            <label for="Ep_por_temporada">Ep por temporada</label>
            <input type="number" class="form-control" name="Ep_por_temporada" id="Ep_por_temporada" >
            
        </div>
    </div>

        <button class="btn btn-primary bg-dark mt-3">Adicionar</button>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\daniel.sousa\laragon\www\controle-series\resources\views/series/Create.blade.php ENDPATH**/ ?>