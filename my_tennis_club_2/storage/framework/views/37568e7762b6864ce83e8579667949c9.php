<h1>Editar Membro</h1>

<form method="POST" action="<?php echo e(route('members.update', $member->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <input type="text" name="firstname" placeholder="Primeiro Nome" value="<?php echo e($member->firstname); ?>"><br />
    <input type="text" name="lastname" placeholder="Sobrenome" value="<?php echo e($member->lastname); ?>"><br />
    <button type="submit">Atualizar</button>

</form>
<?php /**PATH Y:\my_tennis_club\resources\views/members/edit.blade.php ENDPATH**/ ?>