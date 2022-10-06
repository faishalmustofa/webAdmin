

<?php $__env->startSection('title','Create DSM'); ?>

<?php $__env->startSection('css'); ?>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row h-100 justify-content-center ">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create PO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display:none;"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo e(route('store.dsm')); ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="id_pemasok">ID Pemasok</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Enter ID Pemasok..." id="id_pemasok">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="supplier">Supplier</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Enter Supplier..." id="supplier">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nama_barang">Nama Barang</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Enter ID Nama Barang..." id="nama_barang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="alamat">Alamat</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="textarea" class="form-control" placeholder="Enter Alamat..." id="alamat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="pic">PIC</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Enter PIC..." id="pic">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_telp">No. Telpon</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" placeholder="Enter No. Telepon..." id="no_telp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_kantor">No. Kantor</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" placeholder="Enter No. Kantor..." id="no_kantor">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" placeholder="Enter Email..." id="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="file_prakualifikasi">File Prakualifikasi</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" placeholder="No File Chosen..." id="file_prakualifikasi">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-default mr-2" href="<?php echo e(route('dsm')); ?>">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webAdmin\resources\views\po\create-po.blade.php ENDPATH**/ ?>