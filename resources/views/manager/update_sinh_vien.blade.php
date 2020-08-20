<form action="/sinh_vien/{{ $student->id }}" method="POST" onsubmit="return confirm('Xác nhận chỉnh sửa sinh viên này?')">
    @csrf
    <input type="hidden" value="{{ $student->id }}" name="id">
    <div>
        Họ và tên:
    </div>
    <div>
        <input type="text" value="{{ $student->name }}" name="name">
    </div>
    <div>
        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>
    <div>
        Giới tính:
    </div>
    <div>
        <label for="male">Nam</label>
        <input type="radio" id="male" value="1" name="gender" {{ $student->gender == 'Nam' ? 'checked' : '' }}>
        <label for="female">Nữ</label>
        <input type="radio" value="0" name="gender" id="female"  {{ $student->gender == 'Nữ' ? 'checked' : '' }}>
    </div>
    <div>
        Ngày sinh:
    </div>
    <div>
        <input type="date" value="{{ $student->dob }}" name="dob">
    </div>
    <div>
        Số điện thoại:
    </div>
    <div>
        <input type="text" value="{{ $student->phone }}" name="phone">
    </div>
    <div>
        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>
    <div>
        Email:
    </div>
    <div>
        <input type="email" value="{{ $student->email }}" name="email">
    </div>
    <div>
        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>

    <div>
        Tình trạng đi học:
    </div>
    <div>
        <select name="status" id="">
            <option value="0" {{ $student->status == '0' ? 'selected' : '' }}>Vừa nhập học</option>
            <option value="1" {{ $student->status == '1' ? 'selected' : '' }}>Đang học</option>
            <option value="2" {{ $student->status == '2' ? 'selected' : '' }}>Đã tốt nghiệp</option>
            <option value="3" {{ $student->status == '3' ? 'selected' : '' }}>Đã bỏ học</option>
        </select>
    </div>

    <div>
        <button type="submit">Xác nhận chỉnh sửa</button>
    </div>
    <div>
        {{-- @if (has('success'))
            {{ $success }}
        @endif --}}
    </div>
</form>
