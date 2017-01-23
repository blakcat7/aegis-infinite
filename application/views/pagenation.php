<?php if (is_array($result) && sizeof($result) > 0) { ?>
    <div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
    <div class="pagination" style="float:left;"> <?php echo (!empty($pagermessage) ? $pagermessage : ''); ?></div>
    <table width="100%" cellspacing="0" cellpadding="4" border="0" class="data">
        <tbody>
            <tr>
                <th width="10%">Firstname</th>
                <th width="10%">Surname</th>
            </tr>
            <?php foreach ($result as $key => $v) { ?>
                <tr class="">
                    <td><?php echo $v['fname'] ?></td>
                    <td><?php echo $v['lname'] ?></td>
                <tr>
                <?php } ?>
        </tbody>
    </table>
    <div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
    <div class="pagination" style="float:left;"> <?php echo (!empty($pagermessage) ? $pagermessage : ''); ?></div>
<?php } else { ?>
    <p align="center" style="padding-top:20px;">
        <?php echo 'No Record Found!'; ?>
    </p>
<?php
}?>