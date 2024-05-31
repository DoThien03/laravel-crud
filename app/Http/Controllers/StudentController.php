<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    const PATH_VIEW = 'students.';
    const PATH_UPLOAD = 'students';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::query()->latest()->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'code' => 'required|max:10|unique:students',
            'date_of-birth' => 'nullable|date|date_format:Y-m-d',
            'img' => 'nullable|image|max:255',
            'is_active' => [
                Rule::in([1, 0])
            ],
        ]);


        $data = $request->except('img');

        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }

        Student::query()->create($data);

        return back()->with('msg', 'Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|max:100',
            'code' => 'required|max:100|unique:students',
            'date_of-birth' => 'required|date|date_format:Y-m-d',
            'img' => 'nullable|image|max:255',
            'is_active' => [
                Rule::in([1, 0])
            ],
        ]);


        $data = $request->except('img');

        $oldImg = $student->img;

        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }

        $student->update($data);

        if ($request->hasFile('img') && Storage::exists($oldImg)) {
            Storage::delete($oldImg);
        }

        return back()->with('msg', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        if (Storage::exists($student->img)) {
            Storage::delete($student->img);
        }

        return back()->with('msg', 'Success');
    }
}
