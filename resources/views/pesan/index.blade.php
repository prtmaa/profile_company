@extends('layouts.master')

@section('tittle')
    Slider
@endsection

@section('badge')
    @parent
    <li class="breadcrumb-item active">Slider</li>
@endsection

@section('content')
<div class="container-fluid">
 
    <div class="row">
      
      <section class="col-lg-12 connectedSortable">
        
        <div class="row">
            <div class="col-md-12">
              <div class="card card-primary card-outline">
                 
                <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Pesan</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                
              </div>
        
            </div>

          </div>

      </section>
    </div>


@endsection

@push('js')
    <script>
        let table;

       $(function(){
           table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('pesan.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'nama'},
                {data: 'telepon'},
                {data: 'pesan'},
            ]
            });

       }); 


    </script>
@endpush