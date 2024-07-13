<?php

namespace App\Http\Controllers;
use App\Models\studenttable;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;


class addstudentcontroller extends Controller
{
   
    public function addstudent(Request $req)
    {
    $studenttable= new studenttable ;
        $studenttable->student_name = $req->student_name;
       $studenttable->student_standard = $req->student_standard;
       $studenttable->student_seatnumber = $req->student_seatnumber;
       $studenttable->student_courses = $req->student_courses;
       $studenttable->student_phonenumber = $req->student_phonenumber;

       $studenttable->save();
       return redirect('/addstudent');
    }
    public function studenttable()
    {
        $studenttable = studenttable::all()->toArray();
        
       return view('/index',compact('studenttable'));

    }
    
    public function show(studenttable $studenttable)
    {
        return view('/editstudent')->with('studenttable',studenttable::All());
    }
    public function delete($id)
    {
        studenttable::destroy(Array('id',$id));

       return redirect('/index')->with('success', ' deleted successfully');
    }
    public function edit(studenttable $studenttable,$id)
    {
        return view('editstudent')->with('studenttable',studenttable::find($id));
    }
    public function update(Request $request,$id)
    {
        $studenttable = studenttable::find($id);
        $studenttable->student_name = $request->get('student_name');
        $studenttable->student_standard = $request->get('student_standard');
        $studenttable->student_seatnumber = $request->get('student_seatnumber');
        $studenttable->student_courses = $request->get('student_courses');
        $studenttable->student_phonenumber = $request->get('student_phonenumber');
        $studenttable->update();

        

        return redirect('/index')->with('success', 'Student updated successfully');
    }
    // pdf generate 
    public function generatePDF($id)
    {
        $studenttable = studenttable::findOrFail($id);
        $pdf = Pdf::loadView('studentpdf', compact('studenttable'));
        return $pdf->download('student_' . $id . '.pdf');
    }
    public function allgeneratePDF()
{
    $studenttable = studenttable::all();
    $pdf = Pdf::loadView('alldatapdf', compact('studenttable'));
    return $pdf->download('alldatapdf.pdf');
}

}
