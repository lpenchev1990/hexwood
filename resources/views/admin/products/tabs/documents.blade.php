<form method="POST" enctype="multipart/form-data"
      action="{{ route('admin.products.media.store', $product) }}">
    @csrf
    <input type="hidden" name="type" value="document">

    <input type="file"
           name="files[]"
           class="form-control"
           multiple
           accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.skp,.dwg">

    <button class="btn btn-secondary mt-2">
        Качи документи
    </button>
</form>

<hr>

<table class="table table-striped">
    <tr>
        <th>Файл</th>
        <th width="400">Действия</th>
    </tr>

    @foreach($product->media->where('type','document') as $doc)
        @php
            $ext = strtolower(pathinfo($doc->file, PATHINFO_EXTENSION));
            $isImage = in_array($ext, ['jpg','jpeg','png','webp','gif']);
            $url = asset('uploads/'.$doc->file);
        @endphp

        <tr>
            <td>{{ $doc->title }}</td>

            <td class="media-actions">
                @if($isImage)
                    <button
                        type="button"
                        class="btn media-btn btn-preview"
                        onclick="openImage('{{ $url }}')">
                        👁 Преглед
                    </button>
                @endif

                <a href="{{ route('admin.products.media.download', $doc) }}"
                   class="btn media-btn btn-download">
                    ⬇ Download
                </a>

                <form method="POST"
                      action="{{ route('admin.products.media.destroy', $doc) }}"
                      style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn media-btn btn-delete">✕</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
