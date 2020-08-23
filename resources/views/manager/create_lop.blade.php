<h1>Tạo lớp học cho khóa học {{ $khoa_hoc->name }} - ngành {{ $nganh->name }}:</h1>
<form action="/import_sinh_vien/{{ $khoa_hoc->id }}/{{ $nganh->id }}"
    method="POST"
    onsubmit="return confirm('Xác nhận tạo lớp học?')"
    enctype="multipart/form-data">

    @csrf
    <input type="hidden" value="{{ $khoa_hoc->id }}" name="course_id">
    <input type="hidden" value="{{ $nganh->id }}" name="major_id">
    <div>
        <label for="total" class="col-md-4 col-form-label">Nhập tổng số lượng sinh viên:</label>
        <input type="text" id="total" name="total">
        @error('total')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>


    <div>
        <label for="each" class="col-md-4 col-form-label">Số sinh viên mỗi lớp:</label>
        <input type="number" name="each" id="each">
        @error('each')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>

    <div>
        <input type="file" name="file">
    </div>


    <div>
        <input type="submit" value="Xác nhận">
    </div>
</form>
