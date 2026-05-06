<h1>Editar Membro</h1>

<form method="POST" action="{{ route('members.update', $member->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="firstname" placeholder="Primeiro Nome" value="{{ $member->firstname }}"><br />
    <input type="text" name="lastname" placeholder="Sobrenome" value="{{ $member->lastname }}"><br />
    <button type="submit">Atualizar</button>

</form>
