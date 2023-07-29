<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use Validator;
use Carbon\Carbon;

class QuestionnaireController extends Controller
{
    public function get_form(Request $request)
    {
        $view = view('Questionnaire.QuestionnaireEntryForm');
        $template = $view->render();
        if ($template) {
            return response()->json(['status' => 'success', 'title' => 'Questionnaire Entry Form', 'template' => $template], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error Fetching Form'], 500);
        }
    }

    public function store_question(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string',
            'expiry_date' => 'required',
            'title' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'right_option' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

        $input = $request->except('_token', 'id');
        $id = request('id');
        if ($id) {
            $data = Questionnaire::where('id', $id)->first();
            $update = $data->update($input);
            if ($update) {
                return response()->json(['status' => 'success', 'message' => 'Question Updated Successfully!!']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Operation Unsuccessful !!']);
            }
        } else {
            if (Questionnaire::create($input)) {
                return response()->json(['status' => 'success', 'message' => 'Question added sucessfully.']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Error while adding new question.']);
            }
        }
    }

    public function edit_question(Request $request)
    {
        $id = $request->id;

        $question = Questionnaire::find($id);

        $view = view('Questionnaire.QuestionnaireEntryForm', compact('question'));

        $template = $view->render();
        if ($template) {
            return response()->json(['status' => 'success', 'title' => 'Edit Question', 'template' => $template], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error Fetching Form'], 500);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $data = Questionnaire::find($id);
        if (!empty($data)) {
            if ($data->delete()) {
                return response()->json(['status' => 'success', 'message' => 'Question Deleted Successfully!!']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Operation Unsuccessful !!']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'ID does not match !!']);
        }
    }

    public function get_questionnaire()
    {
        $currentDateTime = Carbon::now();
        $currentDate = $currentDateTime->format('Y-m-d');
        $questions = Questionnaire::where('expiry_date', '>=', $currentDate)->get();

        if ($questions) {
            return response()->json(['status' => 'success', 'questions' => $questions], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error Fetching Form'], 500);
        }
    }

}