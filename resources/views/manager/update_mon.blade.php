<h1>Chỉnh sửa môn "{{ $mon->name }}"</h1>
<form action="/mon/update" method="POST" onsubmit="return confirm('Xác nhận chỉnh sửa môn học này?')">
    @csrf
<input type="hidden" value="{{ $mon->id }}" name="id">
    <div>
        <label for="mon" class="col-md-4 col-form-label">Tên môn học:</label>
        <input type="text" id="mon" name="name" value="{{ old('name') ?? $mon->name }}">
        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>

    <div>
        <label for="time_total" class="col-md-4 col-form-label">Tổng số giờ của môn học:</label>
        <input type="number" name="time_total" id="time_total" value="{{ old('time_total') ?? $mon->time_total }}">
        @error('time_total')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>

    <div>
        <label for="test_type" class="col-md-4 col-form-label">Loại bài thi:</label>
        <select name="test_type" id="test_type">
            <option value="0" {{ $mon->test_type == '0' ? 'selected' : '' }}>--Lý thuyết--</option>
            <option value="1" {{ $mon->test_type == '1' ? 'selected' : '' }}>--Thực hành--</option>
            <option value="2" {{ $mon->test_type == '2' ? 'selected' : '' }}>--Lý thuyết + Thực hành--</option>
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
