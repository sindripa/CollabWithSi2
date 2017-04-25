<div class="container">
    <h3><?php echo $user->nafn; ?></h3>
    <form action="<?php echo URL; ?>v7/updateName" method="POST">
    <input type="text" name="newName" placeholder="new name" value="" required />
    <input type="submit" name="update" value="<?php echo $user->id;?>" />
</form>
    <div class="box">
        <h3>Allir notendur</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>nafn</td>
                <td>email</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allirNotendur as $notandi) { ?>
                <tr>
                    <td><?php if (isset($notandi->nafn)) echo htmlspecialchars($notandi->nafn, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($notandi->netfang)) echo htmlspecialchars($notandi->netfang, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>all pictures</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($Myndir as $mynd) { ?>
                <tr>
                    <td>
                        <h4><?php if (isset($mynd->name)) echo htmlspecialchars($mynd->name, ENT_QUOTES, 'UTF-8'); ?></h4>
                        <img width="300px" src=<?php echo '"/img/'; if (isset($mynd->PicUrl)) echo htmlspecialchars($mynd->PicUrl, ENT_QUOTES, 'UTF-8'); echo '"'; ?>>
                        <a href="<?php echo URL . 'v7/deletePicture/' . htmlspecialchars($mynd->id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a>
                        <br>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>