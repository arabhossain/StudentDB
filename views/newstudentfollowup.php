<div class="container clearfix">
    <div class="panel">
        <div class="p-title"><?php if (isset($sql_data['name'])){echo $sql_data['name'];}?></div>
        <div class="p-content">
            <table>
                <tbody>
                <tr>
                    <td>Course: </td><td><?php if (isset($sql_data['name'])){echo $sql_data['course'];}?></td>
                    <td>Locaion :</td><td><?php if (isset($sql_data['name'])){echo $sql_data['locaion'];}?></td>
                  </tr>
                <tr>
                    <td>Email: </td><td><?php if (isset($sql_data['name'])){echo $sql_data['email'];}?></td>
                    <td>mobile :</td><td><?php if (isset($sql_data['name'])){echo $sql_data['mobile'];}?></td>
                 </tr>
                <tr><td>Date: </td><td><?php if (isset($sql_data['name'])){echo $sql_data['admission'];}?></td>
                    <td>User Name: </td><td><?php if (isset($sql_data['name'])){echo $sql_data['username'];}?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



    <div class="chat" style="width: 70%;">
        <div class="chat-history">
            <ul class="chat-ul" id="chat-ul">

            </ul>

        </div> <!-- end chat-history -->
        <div class="chat-box">
            <form id="chatform"  method="post" action="<?php echo '?load=folloup-newstudents&studentid='.$_GET['studentid'].'"';?>>
                <div class="username"><?php echo $_SESSION['name']  ?></div>
                <div class="msgtype"><span class="text-type">Message Type: Public </span> <label class="switch"> <input name="check-msgtype" id="check-msgtype" type="checkbox"><div class="slider round"></div></label><span class="text-type"> Private</span></div>

                <textarea name="txt-msg" id="txt-msg" style="height: 101px;     margin-top: 19px;"></textarea>
                <input type="submit" id="btn-sendmsg" name="btn-sendmsg" value="Send">
            </form>
        </div>

    </div> <!-- end chat -->


   </div>

<script>
    $(function () {
        $('#chatform').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: $('#chatform').attr('action'),
                data: $('#chatform').serialize(),
                success: function () {
                    $('#txt-msg').val('');
                }
            });
        });
    });
    $(document).ready(function() {
        startChat();
    });

    function startChat(){
        setInterval( function() { getChatText(); }, 2000);
    }
    function getChatText() {
        var studentid='<?php echo 'studentid='.$_GET['studentid'];?>';
        $.ajax({
            type: 'post',
            url: 'module/chatbody.php',
            data:studentid,
            success: function(data) {
                document.getElementById("chat-ul").innerHTML=data;

            }
        });
    }
</script>
