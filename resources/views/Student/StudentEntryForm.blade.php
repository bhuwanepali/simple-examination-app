<div class="card-body">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" id="StudentEntryForm" action="/api/store_student_info" method="POST">
                    @csrf
                    <!-- Add CSRF protection -->
                    <div class="row">
                        <input type="hidden" name="id" id="id" value="{{ $student->id ?? '' }}">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ $student->name ?? '' }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $student->email ?? '' }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="reset" class="btn btn-warning float-end ms-2">Reset</button>
                            @if (!empty($student))
                                <button type="button" class="btn btn-primary save float-end" data-isdismiss="Y"
                                    data-is_table_refresh="Y" data-target-btn="btnRefresh">Update</button>
                            @else
                                <button type="button" class="btn btn-primary save float-end" data-isdismiss="Y"
                                    data-is_table_refresh="Y" data-target-btn="btnRefresh">Save</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
