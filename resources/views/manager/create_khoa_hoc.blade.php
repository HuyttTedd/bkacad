<h1>Nhập tên khóa học mới: </h1>

<form action="/khoa_hoc" method="POST" onsubmit="return confirm('Xác nhận tạo khóa học này?')">
    @csrf
    <div>
        <input type="text" name="new_khoa_hoc" style="text-transform: uppercase">
        @error('new_khoa_hoc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>
    <div>
        <input type="submit" value="Xác nhận">
    </div>
</form>
