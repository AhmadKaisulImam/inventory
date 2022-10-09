@foreach ($ajax_barang as $b)

    <div class="form-group">
        <label>Harga</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp</span>
            </div>
            <input type="text" class="form-control" id="harga" value="{{ $b->harga }}" required readonly>
        </div>
    </div>
    
@endforeach