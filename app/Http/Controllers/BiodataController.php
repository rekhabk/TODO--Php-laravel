<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Biodata;
class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  index()
    {
        $biodatas=Biodata::latest()->paginate(5);
        return view('biodata.index',compact('biodatas'))->with('i',(request()->input('page',1)-1)*5);
        // return view('index')
    }
    /**
     * Show the form for creating a new resource.
     *
    * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biodata.create');
    }
    /**
     * Store a newly created resource in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required',
        'content'=>'required'
            ]);
            Biodata::create($request->all());
            return redirect()->route('biodata.index')->with('success','new data has been added');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biodata=Biodata::find($id);
        return view('biodata.detail', compact('biodata'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $biodata = Biodata::find($id);
        return view('biodata.edit', compact('biodata'));
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
        $request->validate([
            'name'=>'required',
            'content'=>'required'
                ]);
    
                $biodata=Biodata::find($id);
                $biodata->name=$request->get('name');
                $biodata->content=$request->get('content');
                $biodata->save();
                return redirect()->route('biodata.index')->with('success', 'Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biodata=Biodata::find($id);
        $biodata->delete();
        return redirect()->route('biodata.index')->with('success','Biodata is deleted') ;
  }
}