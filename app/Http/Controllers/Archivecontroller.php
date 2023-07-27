<?php

namespace App\Http\Controllers;
use App\Models\Archive;

use Illuminate\Http\Request;

class Archivecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function index(Request $request)
    {
        $archives = Archive::all();

        if ($request->get('transTitle')) {
            $archives =  Archive::where('transTitle', 'like', '%' . $request->transTitle . '%');
        }
        if ($request->get('filename')) {
            $archives = $archives->where('filename', 'like', '%' . $request->filename . '%');
        }
        if ($request->get('transType')) {
            $archives = $archives->Where('transType', 'like', '%' . $request->transType . '%');
        }
        $archives = $archives;
       //$this->authorize('viewAny',Archive::class);
       // dd($archives);
        return response()->view('trans.index' , compact('archives'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  Response()->view('trans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = validator($request->all() , [
            'transTitle' => 'required',
        ] ,[
            'transTitle.required' => 'الحقل مطلوب'
        ]);

        if ( ! $validator->fails()) {
            $archives = new Archive();
            if (request()->hasFile('attached')) {

                $attached = $request->file('attached');

                $attachedName = time() . 'attached.' . $attached->getClientOriginalExtension();

                $attached->move('storage/attacheds/transactions', $attachedName);

                $archives->attached = $attachedName;
                }
            $archives->transTitle = $request->get('transTitle');
            $archives->transNo = $request->get('transNo');
            $archives->filename = $request->get('filename');
            $archives->transType = $request->get('transType');


            $isSaved = $archives->save();
            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => "Created is Successfully"] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "Created is Failed"] , 400);

            } }

        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $archives = Archive::FindOrFail($id);

         return response()->view('trans.edit',compact('archives'));
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
        $validator = validator($request->all() , [
            'transTitle' => 'required',
        ] ,[
            'transTitle.required' => 'الحقل مطلوب'
        ]);

        if ( ! $validator->fails()) {
            $archives =  Archive::FindOrFail($id);

            if (request()->hasFile('attached')) {

                $attached = $request->file('attached');

                $attachedName = time() . 'attached.' . $attached->getClientOriginalExtension();

                $attached->move('storage/attacheds/transactions', $attachedName);

                $archives->attached = $attachedName;
                }

            $archives->transTitle = $request->get('transTitle');
            $archives->transNo = $request->get('transNo');
            $archives->filename = $request->get('filename');
            $archives->transType = $request->get('transType');

            $isUpdate = $archives->save();
            return ['redirect' => route('archives.index')];
            if($isUpdate){
                return response()->json(['icon' => 'success' , 'title' => "تم  التعديل بنجاح"] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "فشلت عملية التعديل"] , 400);

            } }

        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archives = Archive::destroy($id);

       // return response()->json(['icon'=>'success', 'title'=>'Deleted successfully'] , 400);
    }
}
