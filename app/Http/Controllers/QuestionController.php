<?php

namespace Certification\Http\Controllers;

use Certification\Http\Requests;
use Certification\Http\Requests\QuestionRequest;
use Certification\Models\Category;
use Certification\Models\Question;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class QuestionController extends Controller
{
    private $question;
    private $category;

    public function __construct(Question $question, Category $category)
    {
        $this->question = $question;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = $this->question->orderBy('id', 'asc')->paginate(15);
        return view('certification.question.index')
            ->with('question', $question);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $category = $this->category->all();
        return view('certification.question.create')
            ->with(['category' => $category, 'id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function question($id)
    {
        return $this->create($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $question = $this->question->create($request->only(['question_name_en', 'question_name_pt', 'question_type']));
        $question->category()->attach($request->only('category_id'));
        $c = count($request->input('answer.*.answer'));
        for ($i = 0; $i < $c; $i++) {
            $a = $request->only(
                'answer.*.answer_name_en',
                'answer.*.answer_name_pt',
                'answer.*.answer'
            );
            $question->answer()->create([
                'question_id'       => $question->id,
                'answer_name_en'    => $a['answer']['*']['answer_name_en'][$i],
                'answer_name_pt'    => $a['answer']['*']['answer_name_pt'][$i],
                'answer'            => $a['answer']['*']['answer'][$i]
            ]);
        }
        return redirect()->route('certification.category.show', $request->only('category_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $question = $this->question->find($id);
        // $answer = $question->answer;
        // return view('certification.question.show')
        //     ->with(['question' => $question, 'answer' => $answer]);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->all();
        $question = $this->question->find($id);
        $question->category;
        $answer = $question->answer;
        return view('certification.question.edit')
            ->with([
                'question'  => $question,
                'category'  => $category,
                'answer'    => $answer
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $question = $this->question->find($id);
        $question->update($request->only(['question_name_en', 'question_name_pt', 'question_type']));
        $question->category()->sync($request->only('category_id'));

        $c = count($request->input('answer.*.answer'));
        for ($i = 0; $i < $c; $i++) {
            $a = $request->only(
                'answer.*.answer_name_en',
                'answer.*.answer_name_pt',
                'answer.*.answer'
            );

            $question->answer()->where('id', $question->answer[$i]->id)->update([
                'question_id'       => $question->id,
                'answer_name_en'    => $a['answer']['*']['answer_name_en'][$i],
                'answer_name_pt'    => $a['answer']['*']['answer_name_pt'][$i],
                'answer'            => $a['answer']['*']['answer'][$i]
            ]);
        }

        Flash::success('A Questão <strong><i>' . $question->question_name_en . '</strong></i> foi alterada corretamente!');
        return redirect()->route('certification.category.show', $request->only('category_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = $this->question->find($id);
        Flash::message('A Questão <strong><i>' . $question->question_name_en . '</strong></i> foi excluída!');
        $q = $question->category[0]->pivot->category_id;
        $question->delete();
        return redirect()->route('certification.category.show', $q);
    }
}
