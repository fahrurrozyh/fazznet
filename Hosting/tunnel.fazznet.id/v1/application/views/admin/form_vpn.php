<?php
if(!empty($this->p3)){
    $data = $this->model->gd("vpn_master","*","id = '".$this->p3."'","row");
    if(!empty($data->id)){
        $id_server = $data->id_server;
        $nama = $data->nama;
        $harga = number_format($data->harga,0,"",".");
        $lokasi = $data->lokasi;
        if($data->status == "Aktif"){
            $status = "checked";
        }else{
            $status = "";
        }
    }else{
		$this->session->set_flashdata("swal", '
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.5/sweetalert2.min.js"></script>
		<script>
			var text = "ID Tidak Ditemukan";
			swal.fire({title:"Error",html:text,icon:"error"});
		</script>');
        redirect("list_vpn");
    }
}else{
    $id_server = "";
    $nama = "";
    $harga = "";
    $lokasi = "";
    $status = "checked";
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $nzm; ?></h1>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <form action="<?=base_url("save_vpn_master/".$this->p3)?>" method="post">
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <p class="mb-1">ID Server</p>
                                <input type="text" name="id_server" id="id_server" class="form-control" placeholder="Masukkan ID Server, Contoh : id-27" value="<?=$id_server?>" required>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <p class="mb-1">Nama Server</p>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Contoh : VPN Remote ID27" value="<?=$nama?>" required>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <p class="mb-1">Harga</p>
                                <input type="text" inputmode="numeric" name="harga" id="harga" class="form-control harga" placeholder="Masukkan Harga disini" value="<?=$harga?>" required>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <p class="mb-1">Lokasi</p>
                                <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Contoh : Indonesia" value="<?=$lokasi?>" required>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <p class="mb-1">Status</p>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status" value="Aktif" onchange="change_status()" <?=$status?>>
                                    <label class="custom-control-label" for="status">Aktif</label>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2" align="right">
                                <a href="<?=base_url("list_vpn")?>" class="btn btn-sm btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->