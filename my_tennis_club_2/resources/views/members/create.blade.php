<h1>Novo Membro</h1>

<form method="POST" action="{{ route('members.store') }}">
    @csrf

    <input type="text" name="firstname" placeholder="Primeiro Nome"><br />
    <input type="text" name="lastname" placeholder="Sobrenome"><br />
    <button type="submit">Registrar</button>

</form>
