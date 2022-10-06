

<?php $__env->startSection('title','Create PO'); ?>

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
                    <form action="<?php echo e($urlSubmit); ?>" id="storePO" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                    <label for="id_supplier">ID Supplier</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="id_supplier" 
                                        class="form-control" 
                                        placeholder="Enter ID Supplier..."
                                        id="id_supplier"
                                        >
                                </div>
                                <?php if($errors->has('id_supplier')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('id_supplier')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="id_supplier_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="hri">H. Ri</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="hri" 
                                        class="form-control" 
                                        placeholder="Enter H. Ri..."
                                        id="hri"
                                    >
                                </div>
                                <?php if($errors->has('hri')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('hri')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="hri_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="qty_hri">Qty H. Ri</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="qty_hri" 
                                        class="form-control" 
                                        placeholder="Enter Qty H. Ri..."
                                        id="qty_hri"
                                    >
                                </div>
                                <?php if($errors->has('qty_hri')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('qty_hri')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="qty_hri_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="efisiensi">Efisiensi / Inefisiensi</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="custom-select" name="efisiensi" id="efisiensi" style="width:35%">
                                        <option class="text-center" value=""> -- Select Efisiensi / Inefisiensi -- </option>
                                        <option class="text-center" value="0" <?php echo e((old('status') ? 'selected' : '')); ?>>Efisiensi</option>
                                        <option class="text-center" value="1" <?php echo e((old('status') ? 'selected' : '')); ?>>Inefisiensi</option>
                                    </select>
                                </div>
                                <?php if($errors->has('efisiensi')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('efisiensi')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="efisiensi_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="ri_ked">Ri Ked</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="date" 
                                        name="ri_ked" 
                                        class="form-control" 
                                        placeholder="dd-mm-yyyy"
                                        id="ri_ked"
                                        style="width:35%">
                                </div>
                                <?php if($errors->has('ri_ked')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('ri_ked')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="ri_ked_err"></p>
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="cara_pembayaran">Cara Pembayaran :</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="metode_pembayaran" 
                                        class="form-control" 
                                        placeholder="Enter Metode Pembayaran..."
                                        id="metode_pembayaran">
                                </div>
                                <?php if($errors->has('metode_pembayaran')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('metode_pembayaran')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="metode_pembayaran_err"></p>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="tempo_pembayaran">Tempo Pembayaran</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="date" 
                                        name="tempo_pembayaran" 
                                        class="form-control" 
                                        placeholder="dd-mm-yyyy"
                                        id="tempo_pembayaran"
                                        style="width:35%">
                                </div>
                                <?php if($errors->has('tempo_pembayaran')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('tempo_pembayaran')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="tempo_pembayaran_err"></p>
                            </div>
                            

                            <hr>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="cara_pembayaran">Penyerahan Barang :</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="metode_penyerahan_barang">Metode Penyerahan Barang</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input 
                                            type="text" 
                                            name="metode_penyerahan_barang" 
                                            class="form-control" 
                                            placeholder="Enter Metode Penyerahan Barang..."
                                            id="metode_penyerahan_barang">
                                    </div>
                                    <?php if($errors->has('metode_penyerahan_barang')): ?>
                                        <div class="invalid-feedback">
                                            <strong><?php echo e($errors->first('metode_penyerahan_barang')); ?></strong>
                                        </div>
                                    <?php endif; ?>
                                    <p class="text-danger text_err" id="metode_penyerahan_barang_err"></p>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="lokasi_penyerahan_barang">Lokasi Penyerahan Barang</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input 
                                            type="text" 
                                            name="lokasi_penyerahan_barang" 
                                            class="form-control" 
                                            placeholder="Enter Lokasi Penyerahan Barang..."
                                            id="lokasi_penyerahan_barang">
                                    </div>
                                    <?php if($errors->has('lokasi_penyerahan_barang')): ?>
                                        <div class="invalid-feedback">
                                            <strong><?php echo e($errors->first('lokasi_penyerahan_barang')); ?></strong>
                                        </div>
                                    <?php endif; ?>
                                    <p class="text-danger text_err" id="lokasi_penyerahan_barang_err"></p>
                                </div>
                            <hr>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="dokumen_kontrak">Dokumen & Kontrak</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="custom-file" id="customFile">
                                        <input 
                                            type="file" 
                                            name="dokumen_kontrak"
                                            class="custom-file-input" 
                                            id="dokumen_kontrak"
                                            accept="application/pdf"
                                        >
                                        <label class="custom-file-label" for="dokumen_kontrak">
                                            Choose a file
                                         </label>
                                    </div>
                                    
                                </div>
                                <?php if($errors->has('dokumen_kontrak')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('dokumen_kontrak')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="dokumen_kontrak_err"></p>
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
<?php echo $__env->make('po.create-js-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webAdmin\resources\views/po/create-po.blade.php ENDPATH**/ ?>