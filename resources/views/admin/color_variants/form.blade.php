@include('admin.components.adminHeader')
@include('admin.components.adminMenu')

<h4>{{ isset($variant) ? 'Редакция' : 'Нова' }} колекция</h4>

    <form method="POST"
          action="{{ isset($variant)
        ? route('admin.color-variants.update', $variant)
        : route('admin.color-variants.store') }}">
        @csrf
        @isset($variant) @method('PUT') @endisset

        <div class="mb-3">
            <label>Име</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $variant->name ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Описание</label>
            <textarea name="description" class="form-control">{{ $variant->description ?? '' }}</textarea>
        </div>

        <button class="btn btn-success">Запази</button>
    </form>

    @if(isset($variant))
        <hr>

        <h5>Вариации</h5>

        <form method="POST" enctype="multipart/form-data"
              action="{{ route('admin.color-variants.items.store', $variant) }}">
            @csrf
            <div class="row">
                <div class="col">
                    <input name="name" class="form-control" placeholder="Име">
                </div>
                <div class="col">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col">
                    <button class="btn btn-primary">Добави</button>
                </div>
            </div>
        </form>

        <table class="table mt-3">
            @foreach($variant->items as $item)
                <tr>
                    <td>
                        @if($item->image)
                            <img src="{{asset('uploads/'.$item->image)}}" height="40">
                        @endif
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <form method="POST"
                              action="{{ route('admin.color-variants.items.destroy', $item) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">✕</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
