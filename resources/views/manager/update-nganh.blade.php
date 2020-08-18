<h1>Chỉnh sửa ngành --{{ $nganh->name }}--</h1>
<form action="/nganh/update" method="POST" onsubmit="return confirm('Xác nhận chỉnh sửa?')">
    @csrf
    <input type="hidden" name="id" value="{{ $nganh->id }}">
    <div>
        <label for="name" class="col-md-4 col-form-label">Tên ngành mới:</label>
        <input type="text" id="name" name="name" value="{{ old('name') ?? $nganh->name }}">
        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>
    <div>
        <input type="submit" value="Xác nhận">
    </div>
</form>
