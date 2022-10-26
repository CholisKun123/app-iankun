<?php


namespace App\Http\Controllers;

use App\models\SIswa;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view ('mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('tambahsiswa');
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
            'required' => ':attribute harus diisi dulu gaesss',
            'min' => ':attribute miinimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter ya gaess',
            'mimes' => 'file :attribute harus bertipe jpg,png jpeg',
            'size' => 'file yang diupload maksimal :size'
        ];
           $this->validate($request,[
            'nama' => 'required|min:5',
            'jk'  => 'required',
            'email'  => 'required',
            'alamat'  => 'required|min:5',
            'about'  => 'required',
            'foto'  => 'required|mimes:jpg,mp4,jpoeg,png,gif,svg'
    ], $messages);
    
    
    //ambil informasi file yang diupload
    $file = $request->file('foto');

    //rename + ambil nama file 
    $nama_file = time()."_".$file->getClientOriginalName();

    //proses upload
    $tujuan_upload = './template/img/';
    $file->move($tujuan_upload,$nama_file);

    //Peoses Insert Database
    Siswa::create([
        'nama' => $request->nama,
        'jk'  => $request->jk,
        'email'  => $request->email,
        'alamat'  => $request->alamat,
        'about'  => $request->about,
        'foto'  => $nama_file
    ]);
    
    return redirect('/mastersiswa');

}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        $data1 = Siswa::find($id)->project;
        $data2 = Siswa::find($id)->kontak;
        return view ('tampilkansiswa', compact('data', 'data1', 'data2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Siswa::find($id);
        return view ('ubahsiswa', compact('data'));
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
            'required' => ':attribute harus diisi dulu gaesss',
            'min' => ':attribute miinimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter ya gaess',
            'mimes' => 'file :attribute harus bertipe jpg,png jpeg',
            'size' => 'file yang diupload maksimal :size'
        ];
           $this->validate($request,[
            'nama' => 'required|min:5',
            'jk'  => 'required',
            'email'  => 'required',
            'alamat'  => 'required|min:5',
            'about'  => 'required',
            'foto'  => 'mimes:jpg,jpoeg,mp4,png,gif,svg'
    ], $messages);

    if($request->foto !=''){
        //Dengan Ganti Foto
        //menghapus! foto lama
        $old=Siswa::find($id);
        file::delete('./template/img/'.$old->foto);
        //ambil informasi file yang diupload
        $file = $request->file('foto');

        //rename + ambil nama file 
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img/';
        $file->move($tujuan_upload,$nama_file);

        //S. menyimpan ke database
        $siswa=Siswa::find($id);
        $siswa->nama= $request->nama;
        $siswa->jk= $request->jk;
        $siswa->email= $request->email;
        $siswa->alamat= $request->alamat;
        $siswa->about= $request->about;
        $siswa->foto= $nama_file;
        $siswa->save();
        return redirect ('mastersiswa');
    }
    else{
        // Tanpa Ganti Foto
        $siswa=Siswa::find($id);
        $siswa->nama= $request->nama;
        $siswa->jk= $request->jk;
        $siswa->email= $request->email;
        $siswa->alamat= $request->alamat;
        $siswa->about= $request->about;
        $siswa->save();
        return redirect ('mastersiswa');
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

    }

    public function hapus($id)
    {
        $data=Siswa::find($id)->delete();
        return redirect ('mastersiswa');
    }
}
