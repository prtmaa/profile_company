@extends('layouts.master')

@section('tittle')
    Pengaturan
@endsection

@section('badge')
    @parent
    <li class="breadcrumb-item active">Pengaturan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 align-items-center">
        <div class="card card-primary card-outline col-lg-12 ">
            <form action="{{ route('about.update') }}" method="post" class="form-about" data-toggle="validator" enctype="multipart/form-data">
                @csrf
                <div class="card-body" >
                    <div class="alert alert-info alert-dismissible" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                    </div>
                    <div class="form-group row ">
                        <label for="nama" class="col-lg-3 control-label">Nama Perusahaan</label>
                        <div class="col-lg-8">
                            <input type="text" name="nama" class="form-control" id="nama" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-lg-3 control-label">Deskripsi Perusahaan</label>
                        <div class="col-lg-8">
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" required >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tentang" class="col-lg-3 control-label">Tentang Perusahaan</label>
                        <div class="col-lg-8">
                            <textarea rows="3" type="text" name="tentang" class="form-control" id="tentang" required ></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-lg-3 control-label">Alamat</label>
                        <div class="col-lg-8">
                            <input type="text" name="alamat" class="form-control" id="alamat" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telepon" class="col-lg-3 control-label">Telepon</label>
                        <div class="col-lg-8">
                            <input type="number" name="telepon" class="form-control" id="telepon" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fb" class="col-lg-3 control-label">Facebook</label>
                        <div class="col-lg-8">
                            <input type="text" name="fb" class="form-control" id="fb" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ig" class="col-lg-3 control-label">Instagram</label>
                        <div class="col-lg-8">
                            <input type="text" name="ig" class="form-control" id="ig" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="yt" class="col-lg-3 control-label">Youtube</label>
                        <div class="col-lg-8">
                            <input type="text" name="yt" class="form-control" id="yt" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="map" class="col-lg-3 control-label">Link Map</label>
                        <div class="col-lg-8">
                            <textarea rows="3" name="map" class="form-control" id="map" required></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="logo" class="col-lg-3 control-label">Logo Perusahaan</label>
                        <div class="col-lg-6">
                            <input type="file" name="logo" class="form-control" id="logo"
                                onchange="preview('.tampil-logo', this.files[0])">
                            <span class="help-block with-errors"></span>
                            <br>
                            <div class="tampil-logo"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="background" class="col-lg-3 control-label">Background Header</label>
                        <div class="col-lg-6">
                            <input type="file" name="background" class="form-control" id="background"
                                onchange="preview('.tampil-background', this.files[0])">
                            <span class="help-block with-errors"></span>
                            <br>
                            <div class="tampil-background"></div>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(function () {
        showData();

        $('.form-about').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.ajax({
                    url: $('.form-about').attr('action'),
                    type: $('.form-about').attr('method'),
                    data: new FormData($('.form-about')[0]),
                    async: false,
                    processData: false,
                    contentType: false
                })
                .done(response => {
                    showData();
                    window.scrollTo(0,0);
                    $('.alert').fadeIn();

                    setTimeout(() => {
                        $('.alert').fadeOut();
                    }, 3000);
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
            }
        });
    });

    function showData() {
        $.get('{{ route('about.show') }}')
            .done(response => {
                $('[name=nama]').val(response.nama);
                $('[name=deskripsi]').val(response.deskripsi);
                $('[name=tentang]').val(response.tentang);
                $('[name=alamat]').val(response.alamat);
                $('[name=telepon]').val(response.telepon);
                $('[name=map]').val(response.map);
                $('[name=fb]').val(response.fb);
                $('[name=ig]').val(response.ig);
                $('[name=yt]').val(response.yt);


                $('.tampil-logo').html(`<img src="${response.logo}" width="200">`);
                $('.tampil-background').html(`<img src="${response.background}" width="200">`);

                $('[rel=icon]').attr('href', `${response.logo}`);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }
</script>
@endpush