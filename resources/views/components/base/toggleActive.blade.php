<form action="{{ route('isActive', [$modelName, $model]) }}" method="POST">
    @method('POST')
    @csrf
    <input hidden value="{{$model->is_active}}" />
    @if($model->is_active)
        <input class="deactivate-btn m-2 m-lg-0" type="submit" value="Deactivate" />
    @else
        <input class="activate-btn m-2 m-lg-0" type="submit" value="Activate" />
    @endif
</form>
