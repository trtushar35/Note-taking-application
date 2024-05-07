<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function noteList(){
        $notes=Note::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->paginate(5);
        return view('pages.note.list', compact('notes'));
    }

    public function noteAdd(){
        return view('pages.note.create');
    }

    public function noteStore(Request $request){
        // dd($request->all());

        $validated = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validated->fails()) {
            notify()->error('Failed to store.');
            return redirect()->back();
        }

        Note::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        notify()->success('Created successfully.');
        return redirect()->route('note.list');
    }

    public function noteView($postId) {
        $note = Note::find($postId);
         return view('pages.note.view', compact('note'));   
    }

    public function noteEdit($postId) {
        $note = Note::find($postId);
         return view('pages.note.edit', compact('note'));   
    }

    public function noteUpdate(Request $request, $noteId) {
        
        $note = Note::find($noteId);
        // dd($request->all(), $noteId);
        $validated = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if($validated->fails()){
            return redirect()->back();
        }

        $note -> update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        notify()->success('Updated successfully.');
        return redirect()->route('note.list');
    }

    public function noteDelete($noteId) {
        Note::find($noteId)->delete();
        notify()->success('Deleted successfully.');
        return redirect()->route('note.list');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if ($request->search) {
            $notes = Note::where('title', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            return "Nothing found!";
        }

        return view('pages.search', compact('notes'));
    }
}
