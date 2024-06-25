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

                <!-- DataTables -->
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/products/add') ?>"><i class="fas fa-plus"></i> Add New</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Kode barang</th>
                                        <th>Nama barang</th>
                                        <th>Ukuran</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Supplier</th>
                                        <th>Stok</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td width="150">
                                            <?php echo $product->kode_barang ?>
                                        </td>
                                        <td>
                                            <?php echo $product->nama_barang ?>
                                        </td>
                                        <td>
                                            <?php echo $product->ukuran ?>
                                        </td>
                                        <td>
                                            <?php echo $product->deskripsi ?>
                                        </td>
                                        <td>
                                            <?php echo $product->harga ?>
                                        </td>
                                        <td>
                                            <?php echo $product->supplier ?>
                                        </td>
                                        <td>
                                            <?php echo $product->stok ?>
                                        </td>
                                        <td>
                                            <img src="<?= base_url("upload/".$product->foto) ?>" width="60" height="60"
                                                alt="" style="object-fit: cover;">
                                        </td>
                                        <td width="250">
                                            <a href="<?php echo site_url('admin/products/edit/'.$product->id) ?>"
                                                class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                            <a onclick="deleteConfirm('<?php echo site_url('admin/products/delete/'.$product->id) ?>')"
                                                href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>
                                                Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <?php $this->load->view("admin/_partials/modal.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>

    <script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
    </script>
</body>

</html>