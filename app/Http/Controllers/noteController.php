<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class noteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note = new Note();
        return $note->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $note = new Note();
        return $note->create(['noteName' => $request->input('noteName')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = new Note();
        $noteName = $note
            ->where('document.did',$id)
            ->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editNoteName = $request->input('editNoteName');
        $note = new Note();
        $note->where('id',$id)
            ->update(['noteName' => $editNoteName]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = new Note();
        $note->where('id',$id)
            ->delete();
    }

    public function search(Request $request)
    {
        $keyWord = $request->query("keyWord");
        $note = new Note();
        return $note->where('noteName','like', '%' .$keyWord. '%')
            ->get();
    }
}
