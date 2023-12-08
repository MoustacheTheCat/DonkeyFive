<?php ob_start(); ?>



<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Message List</h5>
            <?php if(!empty($messages)):?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>From</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Response</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($messages as $message):?>
                                <tr>
                                    <td>
                                        <?php if($message['messageStatus'] == 1):?>
                                            <span class="badge bg-danger text-white rounded-pill cart-items"><a href="/message?id=<?=$message['messageId']?>" class="btn">Not Open</a></span>
                                        <?php else:?>
                                            <span class="badge bg-success text-white rounded-pill cart-items"><a href="/message?id=<?=$message['messageId']?>" class="btn">Open</a></span>
                                        <?php endif;?>
                                    </td>
                                    <td><?= $message['messageFrom']?></td>
                                    <td><?= $message['messageSubject']?></td>
                                    <td><?= $message['messageText']?></td>
                                    <td><?= $message['createdAt']?></td>
                                    <td><a href="/message?id=<?= $message['messageId']?>" class="btn btn-primary">Response</a></td>
                                    <td><a href="/message/delete?id=<?= $message['messageId']?>" class="btn btn-warning">Delete</a></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            <?php else:?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require('src/template/Layout.php');
?>