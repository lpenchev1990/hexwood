<form method="POST" enctype="multipart/form-data"
      action="{{ route('admin.products.media.store', $product) }}">
    @csrf
    <input type="hidden" name="type" value="image">

    <input type="file"
           name="files[]"
           class="form-control"
           multiple
           accept="image/*">

    <button class="btn btn-primary mt-2">
        Качи снимки
    </button>
</form>

<hr>

<div class="row">
    @foreach($product->media->where('type','image') as $img)
        <div class="col-sm-3 text-center">
            <img src="{{ asset('uploads/'.$img->file) }}"
                 class="img-responsive"
                 style="cursor:pointer"
                 onclick="openImage('{{ asset('uploads/'.$img->file) }}')">

            <div class="btn-group btn-group-xs mt-1">
                <a href="{{ route('admin.products.media.download', $img) }}"
                   class="btn btn-default">
                    ⬇
                </a>

                <form method="POST"
                      action="{{ route('admin.products.media.destroy', $img) }}"
                      style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">✕</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
