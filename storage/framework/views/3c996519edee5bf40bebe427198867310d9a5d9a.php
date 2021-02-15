        <div class="modal fade" id="exampleModal<?php echo e($traduction->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Liste des Documents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $__currentLoopData = $traduction->getDocs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul>
                            <li><B>Document</B>: <?php echo e($document->getProduitName()['nom']); ?></li>
                            <li><B>Prix Unitaire</B>: <?php echo e($document->prix); ?></li>
                            <li><B>Langue </B>:<?php echo e($document->langue); ?></li>
                            <li><B>Nombre de Copie </B>:<?php echo e($document->nbcopie); ?></li>
                            <li><B>Nombre de copie Imprime </B>:<?php echo e($document->nbimprimer); ?></li>

                        </ul>
                        <hr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
                </div>
            </div>
        </div>
