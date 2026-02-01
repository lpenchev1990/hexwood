@include('admin.components.adminHeader')
@include('admin.components.adminMenu')
    <h4>Продукти</h4>

    <a href="{{ route('admin.products.create') }}"
       class="btn btn-primary mb-3">
        + Нов продукт
    </a>

    <table class="table">
        <thead>
        <tr>
            <th>Заглавие</th>
            <th>SKU</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Активен</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ config('categories')[$product->category_key]['name'] ?? '-' }}</td>
                <td>{{ $product->price ?? '—' }}</td>
                <td>{!! $product->is_active ? '✔️' : '❌' !!}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}">
                        ✏️
                    </a>
                </td>
                <td><form method="POST"
                          action="{{ route('admin.products.destroy', $product) }}"
                          style="display:inline"
                          onsubmit="return confirm('Сигурен ли си, че искаш да изтриеш продукта?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-xs btn-danger">
                            🗑️
                        </button>
                    </form></td>
            </tr>
        @endforeach
        </tbody>
    </table>

