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
                <div class="card-header">
                  <button onclick="addForm('{{ route('slider.store') }}')" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data</button>
                </div>

                <div class="alert alert-info alert-dismissible" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                </div>
                 
                <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th width="5%">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
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

@include('slider.form')
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
                url: '{{ route('slider.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'judul'},
                {data: 'deskripsi'},
                {data: 'gambar'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
            });

            $('#modal-form').validator().on('submit', function (e) {
                if (! e.preventDefault()){
                    $.ajax({
                        url: $('#modal-form form').attr('action'),
                        type: $('#modal-form form').attr('method'),
                        data: new FormData($('#modal-form form')[0]),
                        async: false,
                        processData: false,
                        contentType: false
                    })
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        $('.alert').fadeIn();

                        setTimeout(() => {
                         $('.alert').fadeOut();
                        }, 3000);
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Gagal menyimpan data');
                        return;
                    });
                }
            })
       }); 


       function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Slider');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=judul]').focus();
       }

       function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Slider');
            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [name=judul]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=judul]').val(response.judul);
                $('#modal-form [name=deskripsi]').val(response.deskripsi);

                $('#modal-form .show-img').html(`<img src="{{ url('/') }}${response.gambar}" width="100px">`);
                $('[rel=icon]').attr('href', `{{ url('/') }}/${response.gambar}`);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
         }

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
            }
        }

    </script>
@endpush