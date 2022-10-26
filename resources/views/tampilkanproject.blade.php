@if ($data->isEmpty())
   <h6 class="text-center"> Siswa Belum Memiliki Project </h6>
@else
  
   @foreach ($data as $item)
       <div class="card">
           <div class="card-header">
            {{ $item->siswa_id }}
            <h6>Nama Project</h6>
            {{$item->nama_project}}
           </div>
           <div class="card-body">
            <img src="{{asset('/template/img/'.$item->foto) }}" width="200" class="img-thumbnail">
               <h5> Tanggal Project :</h5>
               {{ $item->tanggal }}
               <h5> Deskripsi Project :</h5>
               {{ $item->deskripsi }}
            </div>
            <div class="card-footer">
                <a href="{{ route('masterproject.edit' , $item['id']) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <a href="{{ route('masterproject.destroy' , $item->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </div>
        </div>
    @endforeach
@endif