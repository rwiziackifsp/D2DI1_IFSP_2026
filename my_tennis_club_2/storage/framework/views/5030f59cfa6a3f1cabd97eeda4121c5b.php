<h1>Membros</h1>
<a href="<?php echo e(route('members.create')); ?>">Novo membro</a>

<ul>
    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e(route('members.edit', $member->id)); ?>"><?php echo e($member->firstname); ?> <?php echo e($member->lastname); ?></a>

            <form method="POST" action="<?php echo e(route('members.destroy', $member->id)); ?>" style="display: inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" onclick="return confirm('Confirma exclusão do membro?')">Excluir</button>

            </form>

        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH Y:\my_tennis_club\resources\views/members/index.blade.php ENDPATH**/ ?>