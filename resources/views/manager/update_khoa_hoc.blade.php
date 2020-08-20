<h1>Chỉnh sửa khóa học --{{ $khoa_hoc->name }}--</h1>
<form action="/khoa_hoc/{{ $khoa_hoc->id }}" method="POST" onsubmit="return confirm('Xác nhận chỉnh sửa?')">
    @csrf
    <input type="hidden" name="id" value="{{ $khoa_hoc->id }}">
    <div>
        <label for="name" class="col-md-4 col-form-label">Sửa tên ngành:</label>
        <input type="text" id="name" name="name" value="{{ old('name') ?? $khoa_hoc->name }}">
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
