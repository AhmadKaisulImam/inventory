@foreach ($ajax_barang as $b)

    <div class="form-group">
        <label>Harga</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp</span>
            </div>
            <input type="text" name="harga" class="form-control" id="harga" value="{{ $b->harga_beli }}" required readonly>
        </div>
    </div>
    
@endforeach