<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <!-- Card  -->
                <div class="card mb-3">
                    <div class="card-header">

                        <a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php base_url(" admin/product/edit") ?>" method="post"
                            enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?php echo $product->id?>" />

                            <input type="hidden" name="old_foto" value="<?php echo $product->foto; ?>">

                            <div class="form-group">
                                <label for="kode_barang">Kode_barang*</label>
                                <input class="form-control <?php echo form_error('kode_barang') ? 'is-invalid':'' ?>"
                                    type="text" name="kode_barang" min="0" placeholder="Kode barang"
                                    value="<?= $product->kode_barang ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('kode_barang') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_barang">Nama_barang*</label>
                                <input class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>"
                                    type="text" name="nama_barang" placeholder="Nama barang"
                                    value="<?php echo $product->nama_barang ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama_barang') ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <select class="form-control <?php echo form_error('ukuran') ? 'is-invalid' : '' ?>"
                                    name="ukuran">
                                    <option>Ukuran*</option>
                                    <option <?php echo $product->ukuran == "S" ? "selected" : "" ?> value="S">S</option>
                                    <option <?php echo $product->ukuran == "M" ? "selected" : "" ?> value="M">M</option>
                                    <option <?php echo $product->ukuran == "L" ? "selected" : "" ?> value="L">L</option>
                                    <option <?php echo $product->ukuran == "XL" ? "selected" : "" ?> value="XL">XL
                                    </option>
                                    <option <?php echo $product->ukuran == "XXL" ? "selected" : "" ?> value="XXL">XXL
                                    </option>
                                    <option <?php echo $product->ukuran == "XXXL" ? "selected" : "" ?> value="XXXL">XXXL
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('ukuran') ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="deskrispi">Deskripsi</label>
                                <input class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
                                    type="text" name="deskripsi" placeholder="deskripsi"
                                    value="<?php echo $product->deskripsi ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('deskripsi') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga*</label>
                                <input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
                                    type="number" name="harga" placeholder="harga"
                                    value="<?php echo $product->harga ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('harga') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <input class="form-control <?php echo form_error('supplier') ? 'is-invalid':'' ?>"
                                    type="text" name="supplier" value="<?php echo $product->supplier ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('supplier') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>"
                                    type="number" name="stok" value="<?php echo $product->stok ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('stok') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>"
                                    type="file" name="foto" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('foto') ?>
                                </div>
                            </div>

                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                        </form>

                    </div>

                    <div class="card-footer small text-muted">
                        * required fields
                    </div>


                </div>
                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <?php $this->load->view("admin/_partials/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php $this->load->view("admin/_partials/scrolltop.php") ?>

        <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>