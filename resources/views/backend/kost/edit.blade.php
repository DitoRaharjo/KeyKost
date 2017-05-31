@extends('backend.template')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Edit Kost</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
      @if(count($errors)>0)
      <div class="x_panel">
        <h2><font size="5" color="red"><b>Maaf data gagal disimpan, berikut error yang terjadi : </b></font></h2>
        <ul>
          @foreach($errors->all() as $error)
            <li><font size="3">{{ $error }}</font></li>
          @endforeach
        </ul>
      </div>
      @endif

      <div class="x_panel">
        <!------------------------------------------FORM INPUT DATA-------------->
        <form name="formEditKost" action="{{ route('back.kost.update', $kost->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
          {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <div class="x_title"> <!-------------------------------------------------------FORM ARTIKEL---------------------------->
          <h2>Form Kost <small>Detail-detail kost</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kost</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="nama" class="form-control" placeholder="Nama Kost" required="" value="{{ $kost->nama }}">
              </div>
            </div>

            <!-- <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Pemilik</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_pemilik form-control" name="pemilik_id" required="">
                  @foreach($semuaPemilik as $pemilik)
                    @if($pemilik->id == $kost->pemilik_id)
                      @if($pemilik->deleted_at != NULL)
                        <option value="-1">Pemilik Sudah Dihapus</option>
                      @else
                        <option value="{{ $pemilik->id }}">{{ $pemilik->fullname }}</option>
                      @endif
                    @endif
                  @endforeach
                  @foreach($semuaPemilik as $pemilik)
                    @if($pemilik->id != $kost->pemilik_id)
                      @if($pemilik->deleted_at == NULL)
                        <option value="{{ $pemilik->id }}">{{ $pemilik->fullname }}</option>
                      @endif
                    @endif
                  @endforeach
                </select>
              </div>
            </div> -->

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Ruangan Kost</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea rows="6" class="form-control col-md-7 col-xs-12" id="alamat" type="text" name="alamat" placeholder="Alamat kost" required="">{!! $kost->alamat !!}</textarea>
              </div>
            </div>

          <div class="x_title">
            <div class="clearfix"></div>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">

          </div>
          <div class="col-md-2 col-sm-12 col-xs-12 form-group">

          </div>
          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <a class="btn btn-primary btn-lg" href="{{ Route('back.kost.index') }}">Batal</a>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <button type="submit" class="btn btn-success btn-lg">Simpan</button>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12 form-group">

          </div>
        </form> <!--------------------------------------------------------------------------------PENUTUP FORM------------------>
        </div>




      </div> <!---------------------------------------------DIV CONTENT---------------------------->
    </div>

  </div>
</div>
<!-- /page content -->
@endsection

@section('custom_script')
<!-- Select2 -->
<!-- <script>
  $(document).ready(function() {
    $(".select2_pemilik").select2({
      placeholder: "Pilih pemilik",
      allowClear: false
    });
  });
</script> -->
<!-- /Select2 -->
@endsection
