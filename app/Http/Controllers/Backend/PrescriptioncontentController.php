<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use App\Models\PrescriptionContent;
use Illuminate\Http\Request;

class PrescriptioncontentController extends Controller
{
    public function validatecontent(Request $request)
    {
        $this->validate($request,['prescription_id'=>'required|numeric','name'=>'required|min:2|max:50','quantity'=>'required|numeric','message'=>'nullable|min:2|max:100']);
        PrescriptionContent::create($request->all());
        $contents=Prescription::findorfail($request->prescription_id)->contents;
        return response()->json($contents);
    }
    public function deleteitem($id)
    {
        $content=PrescriptionContent::findorfail($id);
        $contents=Prescription::findorfail($content->prescription_id)->contents;
        $content->delete();
        return response()->json($contents);
    }
}
