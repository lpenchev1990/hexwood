@include('admin.components.adminHeader')
@include('admin.components.adminMenu')

<h4 class="mb-4">Новини</h4>

    <table class="table">
        <thead>
        <tr>
            <th>Заглавие</th>
            <th>Дата</th>
            <th width="150">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->created_at->format('d.m.Y') }}</td>
                <td>
                    <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-primary">✏️</a>
                    <form method="POST" action="{{ route('admin.news.destroy', $item) }}" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">🗑️</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $news->links() }}
