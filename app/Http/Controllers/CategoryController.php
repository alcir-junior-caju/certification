<?php

namespace Certification\Http\Controllers;

use Certification\Http\Requests;
use Certification\Http\Requests\CategoryRequest;
use Certification\Models\Category;
use Certification\Models\Certification;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CategoryController extends Controller
{
    private $category;
    private $certification;

    public function __construct(Category $category, Certification $certification)
    {
        $this->category = $category;
        $this->certification = $certification;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = $this->category->orderBy('id', 'asc')->paginate(15);
        return view('certification.category.index')
            ->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $certification = $this->certification->all();
        return view('certification.category.create')
            ->with(['certification' => $certification, 'id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        return $this->create($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->category->create($request->all());
        Flash::success('A Categoria <strong><i>' . $category->category_name_en . '</strong></i> foi cadastrada corretamente!');
        return redirect()
            ->route('certification.certifications.show', $category->certification_id)
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->category->find($id);
        $question = $category->question;
        foreach ($question as $q) {
            $a[] = $category->question->find($q->id)->answer;
        }
        return  view('certification.category.show')
            ->with(['category' => $category, 'question' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certification = $this->certification->all();
        $category = $this->category->find($id);
        return view('certification.category.edit')
            ->with(['category' => $category, 'certification' => $certification]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->category->find($id);
        $category->update($request->all());
        Flash::success('A Categoria <strong><i>' . $category->category_name_en . '</strong></i> foi alterada corretamente!');
        return redirect()->route('certification.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);
        Flash::message('A Categoria ' . $category->category_name_en . ' foi excluída!');
        $category->delete();
        return redirect()->route('certification.certifications.show', $category->certification_id);
    }
}
