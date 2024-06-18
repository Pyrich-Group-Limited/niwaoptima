<div class="preview-block ml-4 mt-4">

    <div class="row gy-4">
        <div class="col-lg-4 col-10">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <label class="form-label-outlined" for="name">Name of Service</label>
                    <input type="text" class="form-control form-control-xl form-control-outlined" id="name"
                        name="name" value="{{ old('name', $service->name ?? '') }}">

                </div>
            </div>
        </div>
    </div>
    <div class="row gy-4">
        <div class="col-lg-4 col-sm-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-right">
                        <em class="icon ni ni-user"></em>
                    </div>
                    <label class="form-label-outlined" for="branch_id">Select Location</label>
                    {{-- <select class="form-control " name="branch_id">
                        <option value="">
                            Select Location
                        </option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}"
                                {{ old('branch_id', isset($service) && $service->branch_id == $branch->id ? 'selected' : '') }}>
                                {{ $branch->branch_name }}
                            </option>
                        @endforeach
                    </select> --}}
                    {{-- <select class="form-control form-control-solid border border-2 form-select multiple" name="branch_id[]" multiple>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}"
                                {{ in_array($branch->id, (array) old('branch_id', isset($service) ? $service->branch_id : [])) ? 'selected' : '' }}>
                                {{ $branch->branch_name }}
                            </option>
                        @endforeach
                    </select> --}}
                    

                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-3">
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary"><em class="icon ni ni-save me-2"></em>
                    SUBMIT</button>
            </div>
        </div>
    </div>
</div>
