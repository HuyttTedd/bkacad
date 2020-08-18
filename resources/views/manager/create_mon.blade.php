<h1>Thêm môn mới:</h1>
<form action="/mon" method="POST" onsubmit="return confirm('Xác nhận tạo môn học này?')">
    @csrf
    <div>
        <label for="mon" class="col-md-4 col-form-label">Tên môn học:</label>
        <input type="text" id="mon" name="name">
        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>

    <div>
        <label for="time_total" class="col-md-4 col-form-label">Tổng số giờ của môn học:</label>
        <input type="number" name="time_total" id="time_total">
        @error('time_total')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>

    <div>
        <label for="test_type" class="col-md-4 col-form-label">Loại bài thi:</label>
        <select name="test_type" id="test_type">
            <option value="0" selected>--Lý thuyết--</option>
            <option value="1">--Thực hành--</option>
            <option value="2">--Lý thuyết + Thực hành--</option>
        </select>

        @error('test_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>

    <div>
        <input type="submit" value="Xác nhận">
    </div>
</form>
