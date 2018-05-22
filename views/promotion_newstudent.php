<div class="center">
    <div class="panel">
        <div class="p-title">Enroll New Students</div>
        <div class="p-content">
            <form method="post">
            <table>
                <thead>
                <tr>
                    <td>No</td>
                    <td>Name</td>
                    <td>Course</td>
                    <td>Location</td>
                    <td>Session</td>
                    <td>Mobile</td>
                    <td>Email</td>
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
                                     <td>'.$value['session'].'</td>
                                     <td>'.$value['mobile'].'</td>
                                     <td>'.$value['email'].'</td>
                                     <td><input name="checkbox[]" type="checkbox" value="'. $value['studentit'].'"></td>
                                </tr>';
                    $count++;
                }
                ?>

                </tbody>
            </table>
            <div class="bottom-buttons">
                <div class="left-btn"><a onclick="checkAll();" href="#">Check All</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#">Uncheck All</a> </div>
                <div class="right-btn"><input type="submit" value="Enroll" name="btn-enroll"> </div>
            </div>
           </form>
        </div>
    </div>
 </div>

<script>
    function checkAll() {
        var checkboxes = document.getElementsByTagName('input');
        var val = null;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                if (val === null) val = checkboxes[i].checked;
                checkboxes[i].checked = val;
            }
        }
    }
</script>