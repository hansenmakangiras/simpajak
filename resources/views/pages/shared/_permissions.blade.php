<div class="row layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow inline">
            <div class="widget-header" id="{{ isset($title) ? Str::slug($title) :  'permissionHeading' }}">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4> {{ $title }} </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                @foreach($permissions as $perm)
                    @php
                        $per_found = null;
                        if (isset($role)) {
                            $per_found = $role->hasPermissionTo($perm->name);
                        }
                        if (isset($user)) {
                            $per_found = $user->hasDirectPermission($perm->name);
                        }
                    @endphp
                    <div class="form-check mb-2 mr-sm-2">
                        <div class="custom-control custom-checkbox checkbox-info">
                            <input name="permissions[]" value="{{ $perm->name }}" type="checkbox" class="custom-control-input"
                                   id="inlineFormCheck" {{ $per_found ? 'checked' : '' }}>
                            <label class="custom-control-label" for="inlineFormCheck">{{ $perm->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
