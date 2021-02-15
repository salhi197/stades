<?php $__env->startSection('content'); ?>
<div class="container-fluid">

<div class="card-group">
                </div>
</div>


                       <div class="card mb-4">
                            <div class="card-header">
                            </div>
                            <div class="card-header">
                                            <form method="post" action="">                                                    
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-md-2" >
                                                        <label class="control-label"><?php echo e(__('Début')); ?>: </label>
                                                        <input class="form-control" value="<?php echo e($date_debut ?? ''); ?>" name="date_debut" type="date" />
                                                    </div>

                                                    <div class="col-md-2" >
                                                        <label class="control-label"><?php echo e(__('Fin')); ?>: </label>
                                                        <input class="form-control" value="<?php echo e($date_fin ?? ''); ?>" name="date_fin" type="date" />
                                                    </div>


                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="control-label"><?php echo e(__('Etat')); ?>: </label>
                                                            <select class=" form-control" name="state">
                                                                <option value=""><?php echo e(__('Please choose...')); ?></option>
                                                                <option value="1"
                                                                    <?php if($state == 1) echo "selected"; ?>
                                                                >Réglé</option>
                                                                <option value="2"

                                                                    <?php if($state == 0) echo "selected"; ?>

                                                                >non Réglé</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-2" style="padding:35px;">
                                                        <button type="submit" class="row btn btn-primary" >
                                                            Filtrer
                                                        </button>                                                                                                        
                                                    </div>


                                        </form>

                                                </div>
                            </div>

 

                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>fullname</th>
                                                <th>phone</th>
                                                <th>stade</th>
                                                <th>prix</th>
                                                <th>crenau</th>
                                                <th>date</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            
                                            <tr>
                                                <td>
                                                    <?php echo e($reservation->created_at ?? ''); ?>

                                                </td>
                                                <td width="20%">                                                                                                 

                                                 </td>

                                                <td>              
                                                    <?php echo e($reservation->total ?? '0'); ?> DA
                                                </td>
                                                <td>              
                                                    <?php echo e($reservation->versement ?? '0'); ?> DA
                                                </td>

                                                <td  class="text-warning">              
                                                    <?php echo e($reservation->total - $reservation->versement ?? '0'); ?> DA
                                                </td>

                                                <td>
                                                    <?php if($reservation->total == $reservation->versement): ?>
                                                        <span class="badge badge-success">Argent Réglée</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Argent Non Réglée</span>
                                                    <?php endif; ?>
                                                    <br>
                                                    <?php if($reservation->regle == 1): ?>
                                                        <span class="badge badge-success">Travail Réglée</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Travail Non Réglée</span>
                                                    <?php endif; ?>




                                                </td>

                                                 
                                                <td >
                                                    <div class="table-action">  

                                                        <div class="dropdown">
                                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo e($reservation->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                          </button>
                                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo e($reservation->id); ?>">
                                                        
                                                        
                                                                <button type="button" class="dropdown-item regler" data-toggle="modal" data-target="#regler" id="<?php echo e($reservation->id); ?>">
                                                                    Régler
                                                                </button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal<?php echo e($reservation->id); ?>">
                                                            Docs
                                                            </button>
                                                        
                                                            <a href=""
                                                                class="dropdown-item">
                                                                télécharger BC
                                                            </a>
                                                          </div>
                                                        </div>
                                                    </div>


                                                </td>
                                            </tr>

                                            
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>




                                </div>
                            </div>
                        </div>
                    </div>

                                            


<?php $__env->stopSection(); ?>






<?php $__env->startSection('scripts'); ?>
<script>
function watchWilayaChanges() {
            $('#wilaya_select').on('change', function (e) {
                e.preventDefault();
                var $communes = $('#commune_select');
                var $communesLoader = $('#commune_select_loading');
                var $iconLoader = $communes.parents('.input-group').find('.loader-spinner');
                var $iconDefault = $communes.parents('.input-group').find('.material-icons');
                $communes.hide().prop('disabled', 'disabled').find('option').not(':first').remove();
                $communesLoader.show();
                $iconDefault.hide();
                $iconLoader.show();
                $.ajax({
                    dataType: "json",
                    method: "GET",
                    url: "/api/static/communes/ " + $(this).val()
                })
                    .done(function (response) {
                        $.each(response, function (key, commune) {
                            $communes.append($('<option>', {value: commune.id}).text(commune.name));
                        });
                        $communes.prop('disabled', '').show();
                        $communesLoader.hide();
                        $iconLoader.hide();
                        $iconDefault.show();
                    });
            });
        }

        $(document).ready(function () {
            watchWilayaChanges();
            $('.regler').on('click', function(event){
                var id = this.id;
                $('#formregler').attr('action','/traduction/regler/'+id)
            })


        });
        
        /**
         * 
         */
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>