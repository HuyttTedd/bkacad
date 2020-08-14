
<div>Danh sách khóa:</div>
@foreach ($khoa_hoc as $item)
    <div>
        <a href="#">{{ $item->name }}</a>
    </div>
@endforeach
