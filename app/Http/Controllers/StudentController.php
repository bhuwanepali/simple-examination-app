<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use App\Models\Questionnaire;
use App\Models\QuestionAnswer;
use App\Mail\SendEmail;
use Validator;

class StudentController extends Controller
{
    public function home()
    {
        return view('Welcome')->render();

    }
    public function get_student_form(Request $request)
    {
        $view = view('Student.StudentEntryForm');
        $template = $view->render();
        if ($template) {
            return response()->json(['status' => 'success', 'title' => 'Student Entry Form', 'template' => $template], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error Fetching Form'], 500);
        }
    }

    public function store_student_info(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

        $input = $request->except('_token', 'id');
        $id = request('id');
        if ($id) {
            $data = Student::where('id', $id)->first();
            $update = $data->update($input);
            if ($update) {
                return response()->json(['status' => 'success', 'message' => 'Student Updated Successfully.']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Operation Unsuccessful !!!']);
            }
        } else {
            if (Student::create($input)) {
                return response()->json(['status' => 'success', 'message' => 'Student added sucessfully.']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Error while adding new student!!!']);
            }
        }
    }

    public function edit_student_info(Request $request)
    {
        $id = $request->id;

        $student = Student::find($id);

        $view = view('Student.StudentEntryForm', compact('student'));

        $template = $view->render();
        if ($template) {
            return response()->json(['status' => 'success', 'title' => 'Edit Student Info', 'template' => $template], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error Fetching Form'], 500);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $data = Student::find($id);
        if (!empty($data)) {
            if ($data->delete()) {
                return response()->json(['status' => 'success', 'message' => 'Student Info Deleted Successfully!!']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Operation Unsuccessful !!']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'ID does not match !!']);
        }
    }

    public function get_student()
    {
        $student = Student::get();
        if ($student) {
            return response()->json(['status' => 'success', 'student' => $student], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error Fetching Form'], 500);
        }
    }

    public function objective_question(Request $request)
    {
        $token = decrypt($request->token);
        if (!$token) {
            return response()->json(['status' => 'error', 'message' => 'Operation Unsuccessful !!']);
        }
        $email = $id = '';
        list($email, $id) = explode('=>', $token);
        $student = Student::where('email', $email)->first();
        $question = Questionnaire::find($id);
        if ($student === null || $question === null) {
            return response()->json(['status' => 'error', 'message' => 'Operation Unsuccessful !!']);
        }
        $view = view("Student.Question", compact('question', 'student'));

        $template = $view->render();
        if ($template) {
            return response()->json(['status' => 'success', 'message' => 'Data Available', 'template' => $template]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Operation Unsuccessful !!']);
        }
    }

    public function send_mail(Request $request)
    {
        $id = $request->id;
        $question = Questionnaire::find($id);

        if ($question) {
            $students = Student::get();
            foreach ($students as $key => $student) {
                $mail = new SendEmail($id, $student->email);
                Mail::to($student->email)->send($mail);
            }

            return response()->json(['status' => 'success', 'message' => 'Email Send Successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Operation Unsuccessful !!']);
        }
    }

    public function save_question_answer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'question_id' => 'required',
            'right_option' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

        $input = $request->all();
        if (QuestionAnswer::create($input)) {
            return response()->json(['status' => 'success', 'message' => 'Answer Submitted Sucessfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error while submitting.']);
        }
    }
}