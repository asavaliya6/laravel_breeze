<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create()
    {
        $note = Note::create([
            'title' => 'Laravel 11 Model Events',
            'body' => 'Testing model events in Laravel 11.'
        ]);

        return response()->json($note);
    }

    public function update($id)
    {
        $note = Note::find($id);
        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $note->update([
            'title' => 'Updated Laravel 11 Title',
            'body' => 'Updated body content'
        ]);

        return response()->json($note);
    }

    public function delete($id)
    {
        $note = Note::find($id);
        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $note->delete();

        return response()->json(['message' => 'Note deleted successfully']);
    }
}
