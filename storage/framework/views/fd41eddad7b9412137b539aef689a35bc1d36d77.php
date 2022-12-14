

<?php $__env->startSection('title','Create DSM'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row h-100 justify-content-center ">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create DSM</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display:none;"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo e($urlSubmit); ?>" id="storeDSM" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="id_pemasok">ID Pemasok</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="id_pemasok" 
                                        class="form-control" 
                                        placeholder="Enter ID Pemasok..."
                                        id="id_pemasok"
                                    >
                                </div>
                                <?php if($errors->has('id_pemasok')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('id_pemasok')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="id_pemasok_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="supplier">Supplier</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="supplier" 
                                        class="form-control" 
                                        placeholder="Enter Supplier..."
                                        id="supplier"
                                    >
                                </div>
                                <?php if($errors->has('supplier')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('supplier')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="supplier_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nama_barang">Nama Barang</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="nama_barang" 
                                        class="form-control" 
                                        placeholder="Enter ID Nama Barang..."
                                        id="nama_barang"
                                        >
                                </div>
                                <?php if($errors->has('nama_barang')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('nama_barang')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="nama_barang_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="alamat">Alamat</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="textarea" 
                                        name="alamat" 
                                        class="form-control" 
                                        placeholder="Enter Alamat..."
                                        id="alamat"
                                    >
                                </div>
                                <?php if($errors->has('alamat')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('alamat')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="alamat_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="pic">PIC</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="pic" 
                                        class="form-control" 
                                        placeholder="Enter PIC..."
                                        id="pic"
                                    >
                                </div>
                                <?php if($errors->has('pic')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('pic')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="pic_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_telp">No. Telpon</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="no_telp" 
                                        class="form-control" 
                                        placeholder="Enter No. Telepon..."
                                        id="no_telp">
                                </div>
                                <?php if($errors->has('no_telp')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('no_telp')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="no_telp_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_kantor">No. Kantor</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="no_kantor" 
                                        class="form-control" 
                                        placeholder="Enter No. Kantor..."
                                        id="no_kantor">
                                </div>
                                <?php if($errors->has('no_kantor')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('no_kantor')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="no_kantor_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="email" 
                                        name="email" 
                                        class="form-control" 
                                        placeholder="Enter Email..."
                                        id="email">
                                </div>
                                <?php if($errors->has('email')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="email_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="file_prakualifikasi">File Prakualifikasi</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="custom-file" id="customFile">
                                        <input 
                                            type="file" 
                                            name="file_prakualifikasi"
                                            class="custom-file-input" 
                                            id="file_prakualifikasi"
                                            accept="application/pdf"
                                        >
                                        <label class="custom-file-label" for="file_prakualifikasi">
                                            Choose a file
                                         </label>
                                    </div>
                                    
                                </div>
                                <?php if($errors->has('file_prakualifikasi')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('file_prakualifikasi')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="file_prakualifikasi_err"></p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a class="btn btn-default mr-2" href="<?php echo e(route('dsm')); ?>">Cancel</a>
                                <button type="button" id="btnSumbit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('dsm.create-js-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webAdmin\resources\views\dsm\create-dsm.blade.php ENDPATH**/ ?>