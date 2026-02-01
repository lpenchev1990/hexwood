@include('admin.components.adminHeader')
@include('admin.components.adminMenu')
 <h4 class="mb-4">{{ isset($news) ? 'Редакция' : 'Нова новина' }}</h4>

    <form method="POST" enctype="multipart/form-data"
          action="{{ isset($news) ? route('admin.news.update',$news) : route('admin.news.store') }}">
        @csrf
        @isset($news) @method('PUT') @endisset

        <div class="mb-3">
            <label>Заглавие</label>
            <input type="text" name="title" class="form-control"
                   value="{{ $news->title ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Снимка</label>
            <input type="file" name="image" class="form-control">
            @isset($news->image)
                <img src="{{ $news->image_url }}" height="80">
            @endisset
        </div>
        <br>
        <br>
        <br>
        <div class="mb-3">
            <label>Текст</label>
            <textarea name="content" class="form-control wysiwyg">
            {{ $news->content ?? '' }}
        </textarea>
        </div>

        <div class="mb-3">
            <label>Тагове</label>
            <input type="text" name="tags" class="form-control"
                   placeholder="laravel, php, новини"
                   value="{{ $news->tags ?? '' }}">
        </div>

        <button class="btn btn-success">Запази</button>
    </form>
<script>
    initEditor('.wysiwyg');
</script>
