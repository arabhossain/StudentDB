
<?php

?>
<div class="content">
    <div class="left">
        <div class="panel">
            <div class="p-title">Sessions</div>
            <div class="p-content">
                <table>
                    <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($sql_data as $key=>$value){
                        echo '<tr>
                                    <td>'.$count.'</td>
                                    <td>'.$value.'</td>
                                    <td><a href="index.php?load=session&action=edit&id='.$key.'">Edit</a></td>
                                </tr>';
                        $count++;
                    }
                    ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="right">
        <div class="form">
            <div class="f-title"><?php if (isset($form_data['sid'])){echo 'Update Session';}else {echo 'Add New Session';} ?> </div>
            <div class="form-content">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?load=session'; ?>">
                    Name
                    <input type="hidden" name="txt-sessionid" value="<?php if (isset($form_data['sid'])){echo $form_data['sid'];} ?>">
                    <input type="text" name="txt-session" value="<?php if (isset($form_data['sid'])){echo $form_data['name'];} ?>" placeholder="Locations...">
                    <input type="submit" name="btn-session" value="<?php if (isset($form_data['sid'])){echo 'Update';}else {echo 'Save';} ?>">
                </form>
                <?php  if(isset($massage)){
                    echo $massage;
                } ?>
            </div>
        </div>

    </div>
</div>
