<?php $__env->startSection('content'); ?>
        <div class="container-fluid">

        <?php if(Auth::guard('admin')->user()['is_super'] == 1): ?>

            <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo e(Config::get('config.nbclients')); ?> Clients</h2>
                                        
                                    </div>
                                    
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body" >
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                
                                <div>
                                <h2 style="text-align: center;  "  ><B>Recette d'aujourd'hui</B></h2>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup><?php echo e(Config::get('config.totaljournee')); ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total d'aujourd'hui
                                    </h6>
                                    
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup><?php echo e(Config::get('config.versementjournee')); ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Versement d'aujourd'hui
                                    </h6>

                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup><?php echo e(Config::get('config.restejournee')); ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Reste d'aujourd'hui
                                    </h6>
                                    
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                     <h2 style="text-align: center;"  ><B>Recette du Mois</B></h2>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 style="text-align: center;  " class="text-dark mb-1 font-weight-medium"><?php echo e(Config::get('config.recettemois')); ?> DA</h2>
                                    </div>
                                    <h6 style="text-align: center;  " class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total du mois</h6>

                                    <div class="d-inline-flex align-items-center">
                                        <h2 style="text-align: center;  " class="text-dark mb-1 font-weight-medium"><?php echo e(Config::get('config.versementmois')); ?> DA</h2>
                                    </div>
                                    <h6 style="text-align: center;  " class="text-muted font-weight-normal mb-0 w-100 text-truncate">Versement du mois</h6>
                                </div>

                                

                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 style="text-align: center;"  ><B>Recette de l'année</B></h2>
                                    <h2 class="text-dark mb-1 font-weight-medium"><?php echo e(Config::get('config.nbtraductions')); ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total des traductions</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>

                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium"><?php echo e(Config::get('config.totalcaisse')); ?> DA</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Caisse</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
<?php endif; ?>
                <div class="card mb-4">
                <br>
            <h1 style="text-align: center; color: black; " ><B>Traductions d'aujourd'hui</B></h1>
                <div class="card-body">
                    <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Date</th>

            <th>Client </th>

            <th>Total</th>

            <th>Versement</th>

            <th>Detail</th>

        </tr>

    </thead>

    <tbody>

                                         
    <?php $__currentLoopData = $tradtables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $traduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <tr>

            <td><?php echo e($traduction->date); ?></td>

            <td><?php echo e($traduction->name); ?>-<?php echo e($traduction->prenom); ?></td>

            <td><?php echo e($traduction->total); ?></td>

            <td><?php echo e($traduction->versement); ?></td>

            <td>

                        <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo e($traduction->idtraduction); ?>">
                    Detail
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo e($traduction->idtraduction); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo e($traduction->idtraduction); ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel<?php echo e($traduction->idtraduction); ?>">Detail sur la traduction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                            <?php if($document->traduction==$traduction->idtraduction): ?>

                            <ul>
                                <li><B>Document</B>: <?php echo e($document->nom); ?></li>
                                <li><B>Prix Unitaire</B>: <?php echo e($document->prix); ?></li>
                                <li><B>Langue </B>:<?php echo e($document->langue); ?></li>
                                <li><B>Nombre de Copie </B>:<?php echo e($document->nbcopie); ?></li>
                                <li><B>Nombre de copie Imprime </B>:<?php echo e($document->nbimprimer); ?></li>
                            </ul>

                            <hr>

                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            
                        </div>
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
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>