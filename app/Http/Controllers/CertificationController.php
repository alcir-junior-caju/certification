<?php

namespace Certification\Http\Controllers;

use Certification\Http\Requests;
use Certification\Http\Requests\CertificationRequest;
use Certification\Models\Category;
use Certification\Models\Certification;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CertificationController extends Controller
{
    private $certification;
    private $category;

    public function __construct(Certification $certification, Category $category)
    {
        $this->certification = $certification;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certification = $this->certification->orderBy('id', 'asc')->paginate(6);
        return view('certification.certification.index')
            ->with('certification', $certification);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certification.certification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificationRequest $request)
    {
        $certification = $this->certification->create($request->all());
        Flash::success('A Certificação <strong><i>' . $certification->certification_name_en . '</strong></i> foi cadastrada corretamente!');
        return redirect()
            ->route('certification.certifications.index')
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
        $certification = $this->certification->find($id);
        $category = $this->category->where('certification_id',  $certification->id)
            ->orderBy('id', 'asc')->paginate(6);
        return view('certification.certification.show')
            ->with(['category' => $category, 'certification' => $certification]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certification = $this->certification->find($id);
        return view('certification.certification.edit')
            ->with('certification', $certification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CertificationRequest $request, $id)
    {
        $certification = $this->certification->find($id);
        $certification->update($request->all());
        Flash::success('A Certificação <strong><i>' . $certification->certification_name_en . '</i></strong> foi alterada corretamente!');
        return redirect()->route('certification.certifications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certification = $this->certification->find($id);
        Flash::message('A Certificação <strong><i>' . $certification->certification_name_en . '</strong></i> foi excluída!');
        $certification->delete();
        return redirect()->route('certification.certifications.index');
    }
}
