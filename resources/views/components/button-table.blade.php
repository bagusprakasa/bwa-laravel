@if (Request::segment(1) != 'product-gallery')
    <button type="button" class="btn btn-icon btn-round btn-primary"
        onClick="editRow('{{ route(Request::segment(1) . '.edit', $item->id) }}')">
        <i class="fas fa-pencil-alt"></i>
    </button>
@endif
<button type="button" class="btn btn-icon btn-round btn-danger"
    onClick="deleteRow({{ $item->id }},'{{ $item->name }}')">
    <i class="fas fa-trash"></i>
</button>
<form action="{{ route(Request::segment(1) . '.destroy', $item->id) }}" id="deleteAction{{ $item->id }}"
    method="POST">
    @csrf
    @method('DELETE')
</form>
