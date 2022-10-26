<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Siswa;
use File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::all();
        $data1 = Siswa::all();
        return view('masterproject', compact('data', 'data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahproject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong'
        ];

        $this->validate($request,[
            'siswa_id'=>'required',
            'nama_projek'=>'required|min:5|max:20',
            'tanggal'=>'required',
            'deskripsi'=>'required',
            'foto'=>'required'
        ], $messages);

        // ambil informasi yang diiupload
        $file = $request->file('foto');

        // rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //_CholisKun.jpg

        // proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        // proses insert Database
        Projek::create([
            'siswa_id'=> $request->siswa_id,
            'nama_project'=> $request->nama_project,
            'tanggal'=>$request->tanggal,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$nama_file
        ]);

        return redirect('/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Siswa::find($id)->project()->get();
        return view('tampilkanproject', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Project::find($id);
        return view('ubahproject');
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
        $messages = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong'
        ];

        $this->validate($request,[
            'nama_projek'=>'required|min:5|max:20',
            // 'tanggal'=>'required',
            'deskripsi'=>'required',
            'foto'=>'mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        if($request->foto != ''){
            // ganti foto

            // 1. hapus foto lama
            $projek=Projek::find($id);
            file::delete('./template/img'.$projek->foto);
            // 2. ambil informasi yang diiupload
        $file = $request->file('foto');

        // 3. rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //_aghna.jpg

        // 4. proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        // 5. menyimpan ke database
        $project->nama_projek=$request->nama_project;
        // $project->tanggal=$request->tanggal;
        $project->deskripsi=$request->deskripsi;
        $project->foto=$nama_file;
        $project->save();
        return redirect ('masterproject');

        }else{
            // tanpa ganti foto
            $project=Project::find($id);
            $project->nama_project=$request->nama_project;
            // $project->tanggal=$request->tanggal;
            $project->deskripsi=$request->deskripsi;
            $project->update();
            return redirect ('masterproject');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $data = Project::destroy($id);
        return redirect ('masterproject');
    }
}