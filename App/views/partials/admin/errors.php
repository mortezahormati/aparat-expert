<?php if(!empty($errors)): ?>
    <div class="row fv-row">
        <?php foreach ($errors as $error): ?>
            <div class="col-md-12 alert alert-danger">
                <?= $error ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>