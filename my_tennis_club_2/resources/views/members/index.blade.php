<h1>Membros</h1>
<a href="{{ route('members.create') }}">Novo membro</a>

<ul>
    @foreach ($members as $member)
        <li>
            <a href="{{ route('members.edit', $member->id) }}">{{ $member->firstname }} {{ $member->lastname }}</a>

            <form method="POST" action="{{ route('members.destroy', $member->id) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Confirma exclusão do membro?')">Excluir</button>

            </form>

        </li>
    @endforeach
</ul>
