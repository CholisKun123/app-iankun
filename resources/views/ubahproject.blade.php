@extends('iankun')
@section('title', 'editkproject')
@section('content-title', 'Edit Project')
@section('content')
<div class ="row">
    <div class ="col-lg-12">
         <div class="card shadow ab-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-wight-b$data text-primary">Data Siswa</h6>
             <div class="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                 <ul>
                     @foreach($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
             @endif
            <form action="{{ route('masterproject.update', ['masterproject' => $data->id)}}" method="POST" enctype="m
                    @csrf
                    {{ method_field('PUT')}}
                    <div class ="form-group"> 
                        <label for="Nama">Nama Project</label>
                        <input type="text" class="form-control" id="nama" name='nama' value="{{ $data->nama }}">
                    </div>
                    <div class ="form-group">
                        <label for="Deskripsi">Deskripsi</label>
                        <textarea type="text" class="form-control" id="Deskripsi" name='Deskripsi' required>{{ $data->Deskripsi}}
                    </div>
                    <div class ="form-group">
                        <label for="tgl">Tanggal Project</label>
                        <input type="date" class="form-control" id="tgl" name='tgl' value="{{ $data->tgl }}"required>
                    </div>
                    <div class ="form-group">
                        <label for="Foto">Foto</label>
                        <input type="file" class="form-control-file" id='foto' name='foto'value="{{ $data->foto }}">
                        <img src="{{ asset ('template/img/'.$data->foto) }}" width="300" class="img-thumbnail">
                    </div>
                    <div class ="form-group">
                        <input type="submit" class="btn btn-success" value='Add'>
                        <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
