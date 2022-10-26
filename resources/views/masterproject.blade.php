@extends('iankun')
@section('title','masterproject')
@section('content')
<a class="btn btn-success" href="{{ route('masterproject.create') }}">Tambah data</a>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
        <h6 class="m-0 font-weigt-bold text-primary">Tabel Siswa</h6>                   
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nisn</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Action</th>
                        </tr>
                            </thead>
                            <tbody>
                                @foreach($data1 as $i=> $item)
                                <tr>
                                <td scope="row">{{++$i}}</th>
                                <td>{{$item ->nisn}}</th>
                                <td>{{$item ->nama}}</th>
                                <!-- <td>{{$loop ->iteration}}</td> -->
                                <td>
                                    <a onclick ="show({{$item->id}},event)" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                    <a href="{{ route('masterproject.create' , $item ->id) }}"class="btn btn-warning btn-circle btn-sm"><i class="fas fa-plus"></i></a>
                                    <!-- <a href=""></a> -->
                                    <!-- <form action="{{ route('mastersiswa.destroy' , $item ->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>    </button>
                                    </form> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weigt-bold text-primary">Tabel Siswa</h6>                   
            </div>
            <div id='project'class="card-body">
                silahkan tambah siswa
            </div>
        </div>
    </div>
    </div>
</div>

<script>
    function show(id){
        $.get('/project/'+id, function(data){
            $('#project').html(data);
        })
    }
</script>

@endsection