@extends('iankun')
@section('title', 'tambahproject')
@section('content-title', 'Tambah Project')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shawod mb-4">            
            <div class="card-body">
                @if (count($errors) >0)
                <div class ="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method='POST' enctype='multipart/form-data' action="{{route('masterproject.store')}}">
                @csrf
                    <div class="form-group">
                        <label for="id_siswa">id_siswa</label>
                        <input type="text" class="form-control" id="id_siswa" name="id_siswa">  
                    </div>                    
                    <div class="form-group">
                        <label for="nama_projct">nama_project</label>
                        <input type="text" class="form-control" id="nama_project" name="nama_project">  
                    </div>
            
                    <div class="form-group">
                        <label for="deskripsi">deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">  
                    </div>

                    <div class="form-group">
                    <label for="tanggal">tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value ="{{old('tanggal')}}"requeride>
                    </div>  
                    
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">  
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                         <a href="{{route ('masterproject.index') }}" class = "btn btn-danger">Batal</a>                   
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection