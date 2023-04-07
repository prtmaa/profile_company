    <!-- Modal -->
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog" role="document">
          
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('post')
    
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="judul" class="col-md-2 col-md-offset-1 control-label">Judul</label>
                            <div class="col-md 6">
                                <input type="text" name="judul" id="judul" class="form-control" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-2 col-md-offset-1 control-label">Deskripsi</label>
                            <div class="col-md 6">
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gambar" class="col-md-2 col-md-offset-1 control-label">Gambar</label>
                            <div class="col-md 6">
                                <input type="file" name="gambar" id="gambar" class="form-control"  onchange="preview('.show-img', this.files[0], 300)">
                                <span class="help-block with-errors"></span>
                            </div>
                           

                        </div>
                        <div class="show-img d-flex justify-content-end"></div>
                    </div>
                    <div class="modal-footer">
                      <button  type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-xmark"></i> Batal</button>
                      <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
            </form>
    
        </div>
      </div>
    
    
      