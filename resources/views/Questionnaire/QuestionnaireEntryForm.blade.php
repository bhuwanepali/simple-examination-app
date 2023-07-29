<div class="card-body">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" id="QuestionnaireEntryForm" action="/api/store_question" method="POST">
                    @csrf
                    <!-- Add CSRF protection -->
                    <div class="row">
                        <input type="hidden" name="id" id="id" value="{{ $question->id ?? '' }}">
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Subject</label>
                            <select name="subject" id="subject" class="form-control" required>
                                <option value="">Choose</option>
                                <option value="physics"
                                    @if (!empty($question)) {{ $question->subject == 'physics' ? 'selected' : '' }} @endif>
                                    Physics
                                </option>
                                <option value="chemistry"
                                    @if (!empty($question)) {{ $question->subject == 'chemistry' ? 'selected' : '' }} @endif>
                                    Chemistry</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="expiry_date" class="form-label">Expiry Date</label>
                            <input type="date" class="form-control" name="expiry_date" id="expiry_date"
                                value="{{ $question->expiry_date ?? '' }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <textarea name="title" id="title" rows="2" class="form-control required">{{ $question->title ?? '' }}</textarea>
                        </div>
                        <h5>Choices</h5>
                        <div class="col-md-6 mb-3">
                            <input type="checkbox" name="right_option" id="checkbox1" value="1" class="checkbox"
                                @if (!empty($question)) {{ $question->right_option == '1' ? 'checked' : '' }} @endif>
                            <label for="option_1" class="form-label">Option 1</label>
                            <input type="text" name="option_1" id="option_1" class="form-control"
                                value="{{ $question->option_1 ?? '' }}" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="checkbox" name="right_option" id="checkbox2" value="2" class="checkbox"
                                @if (!empty($question)) {{ $question->right_option == '2' ? 'checked' : '' }} @endif>
                            <label for="option_2" class="form-label">Option 2</label>
                            <input type="text" name="option_2" id="option_2" class="form-control"
                                value="{{ $question->option_2 ?? '' }}" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="checkbox" name="right_option" id="checkbox3" value="3" class="checkbox"
                                @if (!empty($question)) {{ $question->right_option == '3' ? 'checked' : '' }} @endif>
                            <label for="option_3" class="form-label">Option 3</label>
                            <input type="text" name="option_3" id="option_3" class="form-control"
                                value="{{ $question->option_3 ?? '' }}" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="checkbox" name="right_option" id="checkbox4" value="4" class="checkbox"
                                @if (!empty($question)) {{ $question->right_option == '4' ? 'checked' : '' }} @endif>
                            <label for="option_4" class="form-label">Option 4</label>
                            <input type="text" name="option_4" id="option_4" class="form-control"
                                value="{{ $question->option_4 ?? '' }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="reset" class="btn btn-warning float-end ms-2">Reset</button>
                            @if (!empty($question))
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
