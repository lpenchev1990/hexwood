@include('admin.components.adminHeader')
@include('admin.components.adminMenu')

<h4>Колекции</h4>

    <a href="{{ route('admin.color-variants.create') }}" class="btn btn-primary mb-3">
        + Нова колекция
    </a>

    <table class="table">
        <tr>
            <th>Име</th>
            <th>Вариации</th>
            <th></th>
        </tr>
        @foreach($variants as $variant)
            <tr>
                <td>{{ $variant->name }}</td>
                <td>{{ $variant->items_count }}</td>
                <td>
                    <a href="{{ route('admin.color-variants.edit', $variant) }}">✏️</a>
                </td>
            </tr>
        @endforeach
    </table>
