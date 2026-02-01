<form method="POST"
      action="{{ route('admin.products.admin.store', $product) }}">
    @csrf

    <div class="form-group">
        <label>Вътрешни бележки</label>
        <textarea name="internal_notes"
                  class="form-control"
                  rows="4">{{ old('internal_notes', $product->admin->internal_notes ?? '') }}</textarea>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox"
                   name="is_featured"
                   value="1"
                {{ ($product->admin->is_featured ?? false) ? 'checked' : '' }}>
            Препоръчан продукт
        </label>
    </div>

    <button type="submit" class="btn btn-success btn-sm">
        Запази административни
    </button>
</form>
