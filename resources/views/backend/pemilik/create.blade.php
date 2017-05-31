@extends('backend.template')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Tambah Pemilik Baru</h3>
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
        <form name="formCreatePemilik" action="{{ route('back.pemilik.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
          {{ csrf_field() }}
        <div class="x_title"> <!-------------------------------------------------------FORM ARTIKEL---------------------------->
          <h2>Form Pemilik <small>Detail-detail pemilik</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="fullname" class="form-control" placeholder="Nama Pemilik" required="">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Kost yang dimiliki</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_kost form-control" name="kost_id" required="">
                  <option></option>
                  @foreach($semuaKost as $kost)
                    @if($kost->deleted_at == NULL)
                      <option value="{{ $kost->id }}">{{ $kost->nama }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="email" name="email" class="form-control" placeholder="Email Pemilik" required="">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="password" id="password" type="password" class="form-control" placeholder="Password" required="" />
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Konfirmasi Password</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Password Confirmation" required="" />
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
            <a class="btn btn-primary btn-lg" href="{{ Route('back.pemilik.index') }}">Batal</a>
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
<!-- Untuk Pencocokan Konfirmasi Password -->
<script>
  var password = document.getElementById("password")
  , confirm_password = document.getElementById("password_confirmation");

  function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>
<!-- Untuk Pencocokan Konfirmasi Password -->

<!-- Select2 -->
<script>
  $(document).ready(function() {
    $(".select2_kost").select2({
      placeholder: "Pilih kost yang dimiliki",
      allowClear: false
    });
  });
</script>
<!-- /Select2 -->
@endsection
