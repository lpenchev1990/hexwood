{{-- ADD MATERIALS --}}
<form method="POST" action="{{ route('admin.products.materials.store', $product) }}">
    @csrf

    <table class="table" id="materialsTable">
        <thead>
        <tr>
            <th>Материал</th>
            <th>Ед. цена</th>
            <th>Кол.</th>
            <th>Сума</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><textarea name="materials[0][name]" class="form-control"></textarea></td>
            <td><input name="materials[0][unit_price]" class="form-control price"></td>
            <td><input name="materials[0][quantity]" class="form-control qty"></td>
            <td class="total">0.00</td>
        </tr>
        </tbody>
    </table>

    <button type="button" onclick="addRow()" class="btn btn-default btn-sm">
        + ред
    </button>
    <button class="btn btn-success btn-sm">
        Запази материали
    </button>
</form>

<hr>

{{-- EXISTING MATERIALS --}}
@if($product->materials->count())
    <table class="table table-bordered">
        <tr>
            <th>Материал</th>
            <th>Ед. цена</th>
            <th>Кол.</th>
            <th>Крайна цена</th>
        </tr>
        @foreach($product->materials as $m)
            <tr>
                <td>{{ $m->name }}</td>
                <td>{{ number_format($m->unit_price,2) }}</td>
                <td>{{ $m->quantity }}</td>
                <td><strong>{{ number_format($m->total_price,2) }}</strong></td>
            </tr>
        @endforeach
        <tr><div class="text-right mt-2">
                <strong>Общо материали: </strong>
                <span id="materialsGrandTotal">            {{ number_format($product->materials->sum('total_price'), 2) }}
</span>
            </div></tr>
    </table>
@endif

<script>
    function calc(){
        let sum = 0;

        document.querySelectorAll('#materialsTable tbody tr').forEach(tr => {
            let p = tr.querySelector('.price');
            let q = tr.querySelector('.qty');
            let t = tr.querySelector('.total');

            if (p && q && t) {
                let price = parseFloat(p.value) || 0;
                let qty   = parseFloat(q.value) || 0;

                let val = price * qty;
                t.innerText = val.toFixed(2);
                sum += val;
            }
        });

        document.getElementById('materialsGrandTotal').innerText = sum.toFixed(2);
    }

    document.addEventListener('input', calc);

    function addRow(){
        let i = document.querySelectorAll('#materialsTable tbody tr').length;

        document.querySelector('#materialsTable tbody')
            .insertAdjacentHTML('beforeend', `
                <tr>
                    <td><textarea name="materials[${i}][name]" class="form-control"></textarea></td>
                    <td><input name="materials[${i}][unit_price]" class="form-control price"></td>
                    <td><input name="materials[${i}][quantity]" class="form-control qty"></td>
                    <td class="total">0.00</td>
                </tr>
            `);
    }
</script>
