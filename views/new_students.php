
<div class="content">
    <div class="left">
        <div class="panel">
            <div class="p-title">Students</div>
            <div class="p-content">
                <table>
                    <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Course</td>
                        <td>Location</td>
                        <td>Mobile</td>
                        <td>Email</td>
                        <td>Follow History</td>
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
                                     <td>'.$value['course'].'</td>
                                     <td>'.$value['locaion'].'</td>
                                     <td>'.$value['mobile'].'</td>
                                     <td>'.$value['email'].'</td>
                                     <td><a href="index.php?load=folloup-newstudents&studentid='.$value['studentit'].'">View History</a></td>
                                    <td><a href="index.php?load=new-students&action=edit&id='.$value['studentit'].'">Edit</a>&nbsp;&nbsp;&nbsp;
                                    <a href="index.php?load=new-students&action=delete&id='.$value['studentit'].'">Delete</a></td>
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
            <div class="f-title"><?php if (isset($form_data['studentit'])){echo 'Update Student';}else {echo 'Add New Student';} ?> </div>
            <div class="form-content">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?load=new-students'; ?>">
                    Name
                    <input type="hidden" name="txt-studentid" value="<?php if (isset($form_data['studentit'])){echo $form_data['studentit'];} ?>">
                    <input type="text" name="txt-name" value="<?php if (isset($form_data['studentit'])){echo $form_data['name'];} ?>" placeholder="Name . . .">
                   Location
                    <select name="select-location" id="select-location" onchange="fetch_select(this.value);" >
                        <option value="select">Select</option>
                        <?php
                        $optionrow;
                        foreach ($sql_data_locations as $kye=>$value){
                            $optionrow='<option  value="'.$kye.'"';
                            if(isset($form_data['studentit'])){
                                if ($form_data['locaion']==$value){
                                    $optionrow.=' selected ';
                                }
                            }
                            $optionrow.='">'.$value.'</option>';
                            echo $optionrow;
                        } ?>
                    </select>
                    Course
                    <select name="select-course" id="select-course">
                        <option value="select">Select Location First</option>
                        <?php if (isset($form_data['studentit'])){echo $sql_data_course;} ?>
                    </select>
                    Session
                    <select name="select-session">
                        <option value="select">Select</option>
                        <?php
                        $optionrow;
                        foreach ($sql_data_session as $kye=>$value){
                            $optionrow='<option  value="'.$kye.'"';
                            if(isset($form_data['studentit'])){
                                if ($form_data['sid']==$kye){
                                    $optionrow.=' selected ';
                                }
                            }
                            $optionrow.='">'.$value.'</option>';
                            echo $optionrow;
                        } ?>
                    </select>
                    Email
                    <input type="text" name="txt-email" value="<?php if (isset($form_data['studentit'])){echo $form_data['email'];} ?>" placeholder="Email . . .">
                    Mobile
                    <input type="text"  name="txt-mobbile" id="phone" class="phone_us" value="<?php if (isset($form_data['mobile'])){echo $form_data['mobile'];} ?>" placeholder="Mobile . . . " >
                    Source
                    <input type="text" name="txt-source" value="<?php if (isset($form_data['studentit'])){echo $form_data['source'];} ?>" placeholder="How student heard about us . . .">

                    <input type="submit" name="btn-newstudent" value="<?php if (isset($form_data['studentit'])){echo 'Update';}else {echo 'Save';} ?>">
                </form>
                <?php  if(isset($massage)){
                    echo $massage;
                } ?>
            </div>
        </div>

    </div>
</div>


<script >
    function fetch_select(val)
    {
        $.ajax({
            type: 'post',
            url: 'module/getCources.php',
            data: {
                get_option:val
            },
            success: function (response) {
                document.getElementById("select-course").innerHTML=response;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("select-course").innerHTML='<option>No option found</option>';
            }
        });
    }

    $(function(){
        $("#phone").mask("(999) 999-9999");
        $("#phone").on("blur", function() {
            var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
            if( last.length == 5 ) {
                var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );
                var lastfour = last.substr(1,4);
                var first = $(this).val().substr( 0, 9 );
                $(this).val( first + move + '-' + lastfour );
            }
        });
     });
</script>