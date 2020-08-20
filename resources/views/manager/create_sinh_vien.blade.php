<form action="/sinh_vien" method="POST" onsubmit="return confirm('Xác nhận tạo sinh viên này?')">
    @csrf

    <div>
        Họ và tên:
    </div>
    <div>
        <input type="text" name="name">
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
        <input type="radio" id="male" value="1" name="gender" checked>
        <label for="female">Nữ</label>
        <input type="radio" value="0" name="gender" id="female" >
    </div>
    <div>
        Ngày sinh:
    </div>
    <div>
        <input type="date" name="dob">
    </div>
    <div>
        Số điện thoại:
    </div>
    <div>
        <input type="text" name="phone">
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
        <input type="email" name="email">
    </div>
    <div>
        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        @enderror
    </div>

    <div>
        Ngành học:
    </div>
    <div>
        <select name="major" id="">
            <option value=""></option>
        </select>
    </div>

    <input type="hidden" name="status" value="0">

    <div>
        <button type="submit">Xác nhận thêm sinh viên</button>
    </div>
    <div>
        {{-- @if (has('success'))
            {{ $success }}
        @endif --}}
    </div>
</form>
