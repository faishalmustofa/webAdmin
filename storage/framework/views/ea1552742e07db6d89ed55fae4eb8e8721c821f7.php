

<?php $__env->startSection('title','Edit SPPM'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row h-100 justify-content-center ">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit SPPM</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display:none;"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="<?php echo e($urlSubmit); ?>" id="editSPPM" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nama_pembuat">Nama Pembuat</label>
                                </div>
                                <div class="col-md-10">
                                    <input name="id_pembuat" value="<?php echo e($admin->id); ?>" hidden>
                                    <input 
                                        type="text" 
                                        name="nama_pembuat" 
                                        class="form-control" 
                                        value="<?php echo e($admin->name); ?>"
                                        
                                        id="nama_pembuat"
                                        disabled
                                    >
                                </div>
                                <?php if($errors->has('nama_pembuat')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('nama_pembuat')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="nama_pembuat_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_project">No. Project</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="no_project" 
                                        class="form-control" 
                                        placeholder="Enter No. Projectt..."
                                        value="<?php echo e((old('no_project') ? old('no_project') : (($sppm->no_project === '') ? '' : $sppm->no_project))); ?>"
                                        id="no_project"
                                    >
                                </div>
                                <?php if($errors->has('no_project')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('no_project')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="no_project_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_sppm">No. SPPM</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="no_sppm" 
                                        class="form-control" 
                                        placeholder="Enter No. SPPM..."
                                        value="<?php echo e((old('no_sppm') ? old('no_sppm') : (($sppm->no_sppm === '') ? '' : $sppm->no_sppm))); ?>"
                                        id="no_sppm"
                                    >
                                </div>
                                <?php if($errors->has('no_sppm')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('no_sppm')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="no_sppm_err"></p>
                            </div>

                            
                            

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_spk">No. SPK</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="no_spk" 
                                        class="form-control" 
                                        placeholder="No. SPK..."
                                        value="<?php echo e((old('no_spk') ? old('no_spk') : (($sppm->no_spk === '') ? '' : $sppm->no_spk))); ?>"
                                        id="no_spk"
                                    >
                                </div>
                                <?php if($errors->has('no_spk')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('no_spk')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="no_spk_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="uraian">Uraian</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="uraian" 
                                        class="form-control" 
                                        placeholder="Enter Uraian..."
                                        value="<?php echo e((old('uraian') ? old('uraian') : (($sppm->uraian === '') ? '' : $sppm->uraian))); ?>"
                                        id="uraian"
                                    >
                                </div>
                                <?php if($errors->has('uraian')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('uraian')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="uraian_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="kode_material">Kode Material</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="kode_material" 
                                        class="form-control" 
                                        placeholder="Enter Kode Material..."
                                        value="<?php echo e((old('kode_material') ? old('kode_material') : (($sppm->kode_material === '') ? '' : $sppm->kode_material))); ?>"
                                        id="kode_material"
                                    >
                                </div>
                                <?php if($errors->has('kode_material')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('kode_material')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="kode_material_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="spesifikasi">Spesifikasi</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="spesifikasi" 
                                        class="form-control" 
                                        placeholder="Enter Spesifikasi..."
                                        value="<?php echo e((old('spesifikasi') ? old('spesifikasi') : (($sppm->spesifikasi === '') ? '' : $sppm->spesifikasi))); ?>"
                                        id="spesifikasi"
                                    >
                                </div>
                                <?php if($errors->has('spesifikasi')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('spesifikasi')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="spesifikasi_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="satuan">Satuan</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="satuan" 
                                        class="form-control" 
                                        placeholder="Enter Satuan..."
                                        value="<?php echo e((old('satuan') ? old('satuan') : (($sppm->satuan === '') ? '' : $sppm->satuan))); ?>"
                                        id="satuan"
                                    >
                                </div>
                                <?php if($errors->has('satuan')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('satuan')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="satuan_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="qty_sppm">Qty SPPM</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="qty_sppm" 
                                        class="form-control" 
                                        placeholder="Enter Qty SPPM..."
                                        value="<?php echo e((old('qty_sppm') ? old('qty_sppm') : (($sppm->qty_sppm === '') ? '' : $sppm->qty_sppm))); ?>"
                                        id="qty_sppm"
                                    >
                                </div>
                                <?php if($errors->has('qty_sppm')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('qty_sppm')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="qty_sppm_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="hpp">HPP</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="hpp" 
                                        class="form-control" 
                                        placeholder="Enter HPP..."
                                        value="<?php echo e((old('hpp') ? old('hpp') : (($sppm->hpp === '') ? '' : $sppm->hpp))); ?>"
                                        id="hpp"
                                    >
                                </div>
                                <?php if($errors->has('hpp')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('hpp')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="hpp_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="qty_hpp">Qty HPP</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="qty_hpp" 
                                        class="form-control" 
                                        placeholder="Enter Qty HPP..."
                                        value="<?php echo e((old('qty_hpp') ? old('qty_hpp') : (($sppm->qty_hpp === '') ? '' : $sppm->qty_hpp))); ?>"
                                        id="qty_hpp"
                                    >
                                </div>
                                <?php if($errors->has('qty_hpp')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('qty_hpp')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="qty_hpp_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="target_kedatangan">Target Kedatangan</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="target_kedatangan" 
                                        class="form-control" 
                                        placeholder="Enter Target Kedatangan..."
                                        value="<?php echo e((old('target_kedatangan') ? old('target_kedatangan') : (($sppm->target_kedatangan === '') ? '' : $sppm->target_kedatangan))); ?>"
                                        id="target_kedatangan"
                                    >
                                </div>
                                <?php if($errors->has('target_kedatangan')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('target_kedatangan')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="target_kedatangan_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="file_teknis">File Teknis</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="custom-file" id="customFile">
                                        <input 
                                            type="file"
                                            title="<?php echo e((old('file_teknis') ? old('file_teknis') : (($sppm->file_teknis === '') ? 'No File Chosen' : $sppm->file_teknis))); ?>"
                                            placeholder="<?php echo e((old('file_teknis') ? old('file_teknis') : (($sppm->file_teknis === '') ? '' : $sppm->file_teknis))); ?>"
                                            name="file_teknis"
                                            class="custom-file-input" 
                                            id="file_teknis"
                                            accept="application/pdf"
                                        >
                                        <label class="custom-file-label" for="file_teknis">
                                            <?php echo e((old('file_teknis') ? old('file_teknis') : (($sppm->file_teknis === '') ? '' : $sppm->file_teknis))); ?>

                                         </label>
                                    </div>
                                    
                                </div>
                                <?php if($errors->has('file_teknis')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('file_teknis')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="file_teknis_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="status">Status</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="custom-select" name="status" id="status" style="width:35%">
                                        <option class="text-center" value=""> -- Select Status -- </option>
                                        <option class="text-center" value="0" <?php echo e((old('status') ? old('status') : (($sppm->status === 0) ? 'selected' : ''))); ?>>Diproses</option>
                                        <option class="text-center" value="1" <?php echo e((old('status') ? old('status') : (($sppm->status === 1) ? 'selected' : ''))); ?>>DONE</option>
                                    </select>
                                </div>
                                <?php if($errors->has('status')): ?>
                                    <div class="invalid-feedback">
                                        <strong><?php echo e($errors->first('status')); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <p class="text-danger text_err" id="status_err"></p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a class="btn btn-default mr-2" href="<?php echo e(route('sppm')); ?>">Cancel</a>
                                <button type="button" class="btn btn-primary" id="btnSubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('sppm.edit-js-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webAdmin\resources\views/sppm/edit-sppm.blade.php ENDPATH**/ ?>