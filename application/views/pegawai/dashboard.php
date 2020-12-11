<link rel="stylesheet" href="<?php echo base_url('assets/css/canvas.min.css')?>"/>
<style>.canvas {background:url(<?php echo base_url('assets/img/id_card_blank.png')?>) no-repeat;background-size:cover;}</style>

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><?php echo $title ?></h1>
    </div>
    
    <?php foreach($pegawai as $p):?>
        <div class="row">
            <div class="col-md-8 mb-4">
                <!-- Content -->
                <div class="alert alert-success">
                    Selamat datang, Anda login sebagai <span class="font-weight-bold">pegawai.</span>
                </div>

                <div class="card mb-4">
                    <div class="card-header font-weight-bold">
                        Data Pegawai
                    </div>
                    <div class="row card-body">
                        <div class="col-md-4 text-center">
                            <img class="rounded img-thumbnail" style="width:100%" src="<?php echo base_url('assets/photo/'.$p->photo)?>"/>
                            <!-- Button Edit Foto - Dalam  Proses :)
                            <a class="btn btn-secondary btn-icon-split mt-3">
                                <span class="icon text-white"><i class="fas fa-edit"></i></span>
                                <span class="text">Edit Foto</span> 
                            </a>-->
                        </div>
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <tr>
                                    <td>Nama Pegawai</td>
                                    <td>:</td>
                                    <td>
                                        <input id="cardID" type="hidden" value="<?php echo $p->nik?>"/>
                                        <input id="cardName" type="hidden" value="<?php echo $p->nama_pegawai?>"/>
                                        <?php echo $p->nama_pegawai ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <input id="cardJob" type="hidden" value="<?php echo $p->jabatan?>"/>
                                    <td><?php echo $p->jabatan ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Masuk</td>
                                    <td>:</td>
                                    <td><?php echo $p->tanggal_masuk ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><?php echo $p->status ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        ID Card Pegawai
                    </div>
                    <div class="card-body text-center">
                        <!-- Mulai -->
                        <div class="canvas-wrapper mb-4 mx-auto img-thumbnail">
                            <div class="canvas " id="canvas">
                                <div class="canvas-image">
                                    <img src="<?php echo base_url('assets/photo/'.$p->photo)?>"/>
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
                            <span class="text">Cetak ID</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach;?>

    </div>
    <!-- /.container-fluid -->

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

    btnDownload.addEventListener("click", function (){
        html2canvas(document.querySelector("#canvas"), {
            logging: true,
            allowTaint: true,
            scrollY: -window.scrollY
        }).then(canvas => {
            let imgURL = canvas.toDataURL("image/png");
            //console.log(imgURL);
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

