
<div class="content">
    <div class="left">
        <div class="panel">
            <div class="p-title">Courses</div>
            <div class="p-content">
                <table>
                    <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Fee/Cost</td>
                        <td>Location</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $count=1;
                    foreach ($sql_data as $value){
                        echo '<tr>
                                    <td>'.$count.'</td>
                                    <td>'.$value['name'].'</td>
                                     <td>'.$value['cost'].'</td>
                                     <td>'.$value['location'].'</td>
                                    <td><a href="index.php?load=courses&action=edit&id='.$value['cid'].'">Edit</a></td>
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
            <div class="f-title"><?php if (isset($form_data['cid'])){echo 'Update Course';}else {echo 'Add New Course';} ?> </div>
            <div class="form-content">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?load=courses'; ?>">
                    Name
                    <input type="hidden" name="txt-courseid" value="<?php if (isset($form_data['cid'])){echo $form_data['cid'];} ?>">
                    <input type="text" name="txt-course" value="<?php if (isset($form_data['cid'])){echo $form_data['name'];} ?>" placeholder="Course...">
                    Cost
                    <input type="text" name="txt-cost" value="<?php if (isset($form_data['cid'])){echo $form_data['cost'];} ?>" placeholder="Cost...">
                    Location
                    <select name="select-location">
                        <option value="select">Select</option>
                        <?php
                        $optionrow;
                        foreach ($sql_data_locations as $kye=>$value){
                            $optionrow='<option  value="'.$kye.'"';
                            if(isset($form_data['lid'])){
                                if ($form_data['lid']==$kye){
                                    $optionrow.=' selected ';
                                }
                            }
                            $optionrow.='">'.$value.'</option>';
                            echo $optionrow;
                        } ?>
                    </select>
                    <input type="submit" name="btn-course" value="<?php if (isset($form_data['cid'])){echo 'Update';}else {echo 'Save';} ?>">
                </form>
                <?php  if(isset($massage)){
                    echo $massage;
                } ?>
            </div>
        </div>

    </div>
</div>
