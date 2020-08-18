
<div>Danh sách khóa:</div>
@foreach ($khoa_hoc as $item)
    <div>
        <a href="khoa_hoc/{{ $item->id }}">{{ $item->name }}</a>
    </div>
@endforeach
<div>
    <a href="/khoa_hoc/create">Thêm khóa học</a>
</div>
