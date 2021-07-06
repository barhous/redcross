<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phonenumber</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($uh_kit as $uh_kit)
            <tr>
                <td>
                    <a href="{{ route('uh_kit-edit', ['id' => $uh_kit->id]) }}" title="Edit customer details">
                        {{ $uh_kit->id }}
                    </a>
                </td>
                <td>
                    {{ $uh_kit->descr }}
                </td>
                <td>
                    {{ $uh_kit->creator_id }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">There are no customers yet.</td>
            </tr>
        @endforelse
    </tbody>
</table>