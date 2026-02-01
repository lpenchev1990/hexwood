<form method="POST"
      action="{{ isset($product)
        ? route('admin.products.update', $product)
        : route('admin.products.store') }}">

    @csrf
    @isset($product) @method('PUT') @endisset

    <div class="row">
        {{-- Заглавие --}}
        <div class="col-md-8 mb-3">
            <label class="form-label">Заглавие</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ old('title', $product->title ?? '') }}"
                   required>
        </div>

        {{-- SKU --}}
        <div class="col-md-4 mb-3">
            <label class="form-label">SKU</label>
            <input type="text"
                   name="sku"
                   class="form-control"
                   value="{{ old('sku', $product->sku ?? '') }}"
                   readonly>
        </div>
    </div>


    <div class="row">
        {{-- Категория --}}
        <div class="col-md-6 mb-3">
            <label class="form-label">Категория</label>
            <select name="category_key" class="form-control" required>
                <option value="">-- избери --</option>
                @foreach($categories as $key => $category)
                    <option value="{{ $key }}"
                        {{ old('category_key', $product->category_key ?? '') == $key ? 'selected' : '' }}>
                        {{ is_array($category) ? $category['name'] : $category }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Цветова колекция --}}
        <div class="col-md-6 mb-3">
            <label class="form-label">Цветова колекция</label>
            <select name="color_variant_id" class="form-control">
                <option value="">-- без колекция --</option>
                @foreach($variants as $variant)
                    <option value="{{ $variant->id }}"
                        {{ old('color_variant_id', $product->color_variant_id ?? '') == $variant->id ? 'selected' : '' }}>
                        {{ $variant->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Описание --}}
    <div class="mb-3">
        <label class="form-label">Описание</label>
        <textarea name="description"
                  class="form-control wysiwyg"
                  rows="6">{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div class="row">
        {{-- Крайна цена --}}
        <div class="col-md-4 mb-3">
            <label class="form-label">Крайна цена</label>
            <input type="number"
                   step="0.01"
                   name="price"
                   class="form-control"
                   value="{{ old('price', $product->price ?? '') }}">
        </div>

        {{-- Активен --}}
        <div class="col-md-4 mb-3 d-flex align-items-end">
            <div class="form-check">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       class="form-check-input"
                       id="isActive"
                    {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="isActive">
                    Активен продукт
                </label>
            </div>
        </div>
    </div>

    <button class="btn btn-success">
        {{ isset($product) ? 'Запази промените' : 'Създай продукт' }}
    </button>
</form>
