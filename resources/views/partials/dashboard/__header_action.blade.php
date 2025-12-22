<ul class="nk-block-tools g-3">
    @if(\Illuminate\Support\Facades\Route::currentRouteName() == ($data . '.index'))
        <li class="nk-block-tools-opt">
            <a href="{{ route($data . '.create') }}" class="btn btn-primary">
                <em class="icon ni ni-plus-fill-c"></em>
                <span>Add</span>
            </a>
        </li>
    @else
        <li class="nk-block-tools-opt">
            <a href="{{ route($data . '.index') }}" class="btn btn-secondary">
                <em class="icon ni ni-arrow-left-circle-fill"></em>
                <span>Back</span>
            </a>
        </li>
        <li class="nk-block-tools-opt">
            <a href="{{ route($data . '.create') }}" class="btn btn-info">
                <em class="icon ni ni-plus-fill-c"></em>
                <span>Add</span>
            </a>
        </li>
        @if(\Illuminate\Support\Facades\Route::currentRouteName() == ($data . '.show'))
            <li class="nk-block-tools-opt">
                <a href="{{ route($data . '.edit', $id) }}" class="btn btn-primary">
                    <em class="icon ni ni-pen-fill"></em>
                    <span>Edit</span>
                </a>
            </li>
        @elseif((\Illuminate\Support\Facades\Route::currentRouteName() != ('department_data.edit')) && (\Illuminate\Support\Facades\Route::currentRouteName() != ('partnership_image.edit')))
            <li class="nk-block-tools-opt">
                <a href="{{ route($data . '.show', $id) }}" class="btn btn-primary">
                    <em class="icon ni ni-eye-fill"></em>
                    <span>View</span>
                </a>
            </li>
        @endif
        <li class="nk-block-tools-opt">
            <form class="btn btn-danger" onclick="this.submit()" action="{{ route($data . '.destroy', $id) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <em class="icon ni ni-trash-fill"></em>
                <span>Delete</span>
            </form>
        </li>
    @endif
</ul>
