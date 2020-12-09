<link rel="stylesheet" href="<?php echo base_url('assets/css/canvas.min.css')?>"/>
<style>.canvas {background:url(<?php echo base_url('assets/img/id_card_blank.png')?>) no-repeat;background-size:cover;}</style>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <div class="ml-auto p-2"></div>

    <div class="row">
        <!-- Left Row -->
        <div class="col-xl-8 mb-4">
            <div class="card">
                <form id="form-data-pegawai" method="POST" enctype="multipart/form-data" action="<?php echo base_url('admin/dataPegawai/updateDataAksi')?>">
                <div class="card-body">
                    <?php foreach ($pegawai as $p): ?>
                        
                        <!-- // Data User // -->
                        <h6 class="font-weight-bold"><i class="fas fa-user mr-3"></i>Data Pribadi</h6>
                        <hr>

                        <!-- NIK -->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input id="id_pegawai" type="hidden" name="id_pegawai" class="form-control" value="<?php echo $p->id_pegawai ?>"/>
                                <input id="cardID" type="text" name="nik" class="form-control" value="<?php echo $p->nik ?>"/>
                                <?php echo form_error('nik', '<div class="text-small text-danger"></div>') ?>
                            </div>
                        </div>

                        <!-- Nama Pegawai -->
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Nama Pegawai</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="cardName" name="nama_pegawai" class="form-control"  value="<?php echo $p->nama_pegawai ?>"/>
                                <?php echo form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
                            </div>
                        </div>

                        <!-- Upload Foto -->
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Upload Foto</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="file" name="photo" class="form-control" />
                            </div>
                        </div>

                        <!-- // Pekerjaan // -->
                        <!-- NIK -->
                        <h6 class="font-weight-bold mt-5"><i class="fas fa-briefcase mr-3"></i>Pekerjaan</h6>
                        <hr>

                        <!-- Nama Pegawai -->
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="Laki-laki" <?php if ($p->jenis_kelamin == 'Laki-laki') echo'selected'; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if ($p->jenis_kelamin == 'Perempuan') echo'selected'; ?>>Perempuan</option>
                                </select>
                                <?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
                            </div>
                        </div>

                        <!-- Jabatan -->
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Jabatan</label>
                            </div>
                            <div class="col-sm-8">
                                <select id="cardJob" name="jabatan" class="form-control">
                                    <?php foreach($array_jabatan as $j) : ?>
                                        <option value="<?php echo $j->nama_jabatan ?>" 
                                        <?php if($j->nama_jabatan == $p->jabatan) echo 'selected'?>>
                                        <?php echo $j->nama_jabatan ?>
                                        </option>
                                    <?php endforeach; ?>
                                    <?php echo form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
                                </select>
                            </div>
                        </div>

                        <!-- Status Pegawai -->
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Status Pegawai</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="status" class="form-control">
                                    <option value="Karyawan Tetap" <?php if ($p->status == 'Karyawan Tetap') echo'selected'; ?>>Karyawan Tetap</option></option>
                                    <option value="Karyawan Tidak Tetap" <?php if ($p->status == 'Karyawan Tidak Tetap') echo'selected'; ?>>Karyawan Tidak Tetap</option>
                                </select>
                                <?php echo form_error('status', '<div class="text-small text-danger"></div>') ?>
                            </div>
                        </div>

                        <!-- Tanggal Masuk -->
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Tanggal Masuk</label>
                            </div>
                            <div class="col-sm-8">
                                <input value="<?php echo $p->tanggal_masuk ?>" type="date" name="tanggal_masuk" class="form-control" />
                                <?php echo form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>
                            </div>
                        </div>

                        <!-- // Pengaturan Akun // -->
                        <div class="d-flex justify-content-between align-items-bottom mt-5">
                            <div class="align-self-center">
                                <h6 class="font-weight-bold m-0"><i class="fas fa-key mr-3"></i>Pengaturan Akun</h6>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#account" aria-expanded="false" aria-controls="account">
                                <i class="fas fa-eye mr-2"></i>Tampilkan 
                                </button>
                            </div>
                        </div>

                        <div class="collapse" id="account">
                        <hr>
                            <!-- Username -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label>Username</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="username" class="form-control"  value="<?php echo $p->username ?>"/>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                <label>Password</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group" id="password">
                                        <input type="password" name="password" class="form-control"  value=""/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hak Akses -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label>Hak Akses</label>
                                </div>
                                <div class="col-sm-8">
                                    <select name="hak_akses" class="form-control">
                                        <option value="">--Pilih Hak Akses--</option>
                                        <option value="1" <?php if($p->hak_akses == '1') echo 'selected'?>>Admin</option>
                                        <option value="2" <?php if($p->hak_akses == '2') echo 'selected'?>>Pegawai</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                    <?php endforeach;?>
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>

        <!-- Right Row -->
        <div class="col-xl-4 mb-4">
            <div class="card" id="preview-card">
                <div class="card-body">
                   <!-- // Data User // -->
                    <h6 class="font-weight-bold"><i class="fas fa-eye mr-3"></i>Preview ID Card</h6>
                    <hr>
                    <div class="text-center">
                        <!-- Mulai -->
                        <div class="canvas-wrapper mb-4 mx-auto img-thumbnail">
                            <div class="canvas " id="canvas">
                                <div class="canvas-image">
                                    <?php foreach($pegawai as $p):?>
                                    <img src="<?php echo base_url('assets/photo/'.$p->photo)?>"/>
                                    <?php endforeach;?>
                                </div>
                                <div class="canvas-identity">
                                    <span class="canvas-identity-name">Hanifa Putri</span>
                                    <span class="canvas-identity-position">Staff Marketing</span>
                                </div>
                                <div class="canvas-barcode">
                                    <svg id="barcode" jsbarcode-value="123456789012"></svg>
                                    </div>
                            </div>
                        </div>

                        <a id="card-download" class="btn btn-primary btn-icon-split mb-2 ml-2">
                            <span class="icon text-white"><i class="fas fa-download"></i></span>
                            <span class="text">Download</span>
                        </a>
                    </div>
                </div> 
            </div>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->
<!-- Dynamic ID Card Script Start -->
<script src="<?php echo base_url('assets/js/html2canvas.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/JsBarcode.code128.min.js')?>"></script>
    <script>
    const btnDownload = document.querySelector("#card-download");
    const fileName = 'ID_Card_' + document.getElementById('cardID').value + '.png';
    const form = document.querySelector("#form-data-pegawai");

    let cardName = document.querySelector(".canvas-identity-name");
    let cardJob = document.querySelector(".canvas-identity-position");
    let cardID = document.querySelector(".canvas-identity-id");

    let cardNameField = document.getElementById("cardName");
    let cardJobField = document.getElementById("cardJob");
    let cardIDField = document.getElementById("cardID");

    function initBarcode(value){
        JsBarcode("#barcode", value, {
            width: 1.5,
            height: '30px',
            fontSize: '12px',
            displayValue: true
        });
    }
    function updateCard(){
        cardName.innerHTML = cardNameField.value;
        cardJob.innerHTML = cardJobField.options[cardJobField.selectedIndex].value;
        initBarcode(cardIDField.value);
    }
    
    window.onload = function() {
        initBarcode(cardIDField.value);
        updateCard();
    };

    form.addEventListener("keyup", function(){updateCard();});
    form.addEventListener("change", function(){updateCard();});

    btnDownload.addEventListener("click", function (){
        html2canvas(document.querySelector("#canvas"), {
            logging: true,
            allowTaint: true
        }).then(canvas => {
            let imgURL = canvas.toDataURL("image/png");
            console.log(imgURL);

            if (window.navigator.msSaveBlob) {
                window.navigator.msSaveBlob(canvas,msToBlob(),"id-card.png");
            } else {
                const a = document.createElement("a");
                document.body.appendChild(a);
                a.href = imgURL;
                a.download = fileName;
                a.click();
                document.body.removeChild(a);
            }
        });
     });
    </script>