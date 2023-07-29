<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Question: {{ $question->title }}
        </div>
        <form class="form-horizontal" id="AnswerSheetForm" action="/api/save_question_answer" method="POST">
            <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
            <input type="hidden" name="subject" id="subject" value="{{ $question->subject }}">
            <input type="hidden" name="question_id" id="question_id" value="{{ $question->id }}">
            <div class="card-body">
                <div class="col-md-6 mb-3">
                    <input type="checkbox" name="right_option" id="checkbox1" value="1" class="checkbox" />
                    <label htmlFor="option_1" class="form-label">&nbsp;1. {{ $question->option_1 }}</label>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="checkbox" name="right_option" id="checkbox2" value="2" class="checkbox" />
                    <label htmlFor="option_2" class="form-label">&nbsp;2. {{ $question->option_2 }}</label>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="checkbox" name="right_option" id="checkbox3" value="3" class="checkbox" />
                    <label htmlFor="option_3" class="form-label">&nbsp;3. {{ $question->option_3 }}</label>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="checkbox" name="right_option" id="checkbox4" value="4" class="checkbox" />
                    <label htmlFor="option_4" class="form-label">&nbsp;4. {{ $question->option_4 }}</label>
                </div>
                <div class="col-md-12 mb-4">
                    <button type="submit" class="btn btn-sm btn-success mb-4 float-end save">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
