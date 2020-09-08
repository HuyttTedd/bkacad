<h1>Phân công cho khóa {{ $khoa_hoc->name }}, ngành {{ $nganh->name }}</h1>
<form action="/phan_cong" method="POST" onsubmit="return confirm('Xác nhận tạo khóa học này?')">
    @csrf
    <div>
        <div>Chọn môn:</div>
        <select name="subject_id" id="">
            @foreach ($nganh->subjects()->get() as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

    </div>

    <div>
        <div>Chọn giảng viên:</div>
        <select name="lecturer_id" id="">
            @foreach ($giang_vien as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

    </div>

        <div>Chọn lớp:</div>

            @foreach ($nganh->classes()->get() as $item)
                {{-- <option value="{{ $item->id }}">{{ $item->name }}</option> --}}
                <div>
                <input type="checkbox" value="{{ $item->id }}" name="class[]">
                <label for="">{{ $item->name }}</label>
                </div>

            @endforeach
            <input type="checkbox" onclick="toggle(this);" />Chọn tất cả<br />

    </div>
    <div>
        <input type="submit" value="Xác nhận">
    </div>
</form>

<script>
    function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>
