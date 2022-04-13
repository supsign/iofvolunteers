<form action="{{ route('isActive', [$modelName, $model]) }}" method="POST">
    @method('POST')
    @csrf
    <input hidden value="{{$model->is_active}}" />
    @if($model->is_active)
        <input class="ml-auto float-md-right deactivate-btn" type="submit" value="Deactivate" />
    @else
        <input class="ml-auto float-md-right activate-btn" type="submit" value="Activate" />
    @endif
</form>
