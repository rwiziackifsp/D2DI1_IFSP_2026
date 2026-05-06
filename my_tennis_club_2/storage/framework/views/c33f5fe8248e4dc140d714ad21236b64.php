<h1>Novo Membro</h1>

<form method="POST" action="<?php echo e(route('members.store')); ?>">
    <?php echo csrf_field(); ?>

    <input type="text" name="firstname" placeholder="Primeiro Nome"><br />
    <input type="text" name="lastname" placeholder="Sobrenome"><br />
    <button type="submit">Registrar</button>

</form>
<?php /**PATH Y:\my_tennis_club\resources\views/members/create.blade.php ENDPATH**/ ?>