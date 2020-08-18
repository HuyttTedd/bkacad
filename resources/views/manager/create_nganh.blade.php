<h1>Thêm ngành mới:</h1>
<form action="/nganh" method="POST" onsubmit="return confirm('Xác nhận tạo khóa học này?')">
    @csrf
    <div>
        <input type="text" name="new_nganh">
        @error('new_nganh')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>
    <div>
        <input type="submit" value="Xác nhận">
    </div>
</form>
