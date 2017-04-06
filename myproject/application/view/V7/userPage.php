<div class="container">
    <h3><?php echo $user->nafn; ?></h3>
    <div class="box">
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>all of your pictures</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($Myndir as $mynd) { ?>
                <tr>
                    <td>
                        <h4><?php if (isset($mynd->name)) echo htmlspecialchars($mynd->name, ENT_QUOTES, 'UTF-8'); ?></h4>
                        <img width="300px" src=<?php echo '"/img/'; if (isset($mynd->PicUrl)) echo htmlspecialchars($mynd->PicUrl, ENT_QUOTES, 'UTF-8'); echo '"'; ?>>
                        <br>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>