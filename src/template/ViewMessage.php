<?php ob_start(); ?>



<div class="container mt-4">
    <div class="card">
        <?php if(!empty($message)):?>
            <h5 class="card-title">Message</h5>
            <div class="card-body">
                <p><?= $message['messageFrom']?></p>
                <p><?= $message['messageSubject']?></p>
                <p><?= $message['messageText']?></p>
                <p><?= $message['createdAt']?></p>
            </div>
            <div class="card-footer">
                <a href="/message/reponse?id=<?= $message['messageId']?>" class="btn btn-info">Response</a>
                <a href="/message/delete?id=<?= $message['messageId']?>" class="btn btn-warning">Delete</a>
            </div>
        <?php else:?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif;?>
    </div>
</div>


<?php
$content = ob_get_clean();
require('src/template/Layout.php');
?>