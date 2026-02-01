<form method="POST">
    <label>Работни часове</label>
    <input type="number" class="form-control" name="work_hours"
           value="{{ $product->pricing->work_hours ?? '' }}">

    <label class="mt-2">Цена на час</label>
    <input type="number" class="form-control" name="hour_price"
           value="{{ $product->pricing->hour_price ?? config('pricing.hour_price') }}">
</form>
