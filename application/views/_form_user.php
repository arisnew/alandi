<?php
$uac = $this->model->getUAC(basename(__FILE__));
if ($uac == 0) {
    exit();
}
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Form User</h3>
    </div>
    <form class="form-horizontal" id="form-user">
        <div class="box-body">
            <div class="form-group">
                <div id="loading"></div>
                <label for="username-input" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                    <input class="form-control" id="username-input" name="username-input" placeholder="Username" type="text" required="" autofocus="">
                </div>
            </div>
            <div class="form-group">
                <label for="name-input" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input class="form-control" id="name-input" name="name-input" placeholder="Name" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="email-input" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" id="email-input" name="email-input" placeholder="Email" type="email">
                </div>
            </div>
            <div class="form-group">
                <label for="level-input" class="col-sm-2 control-label">Level</label>
                <div class="col-sm-10">
                    <select class="form-control" id="level-input" name="level-input">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="description-input" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description-input" name="description-input"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="status-input" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" id="status-input" name="status-input">
                        <option value="1">Active</option>
                        <option value="0">Nonactive</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="password-input" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input class="form-control" id="password-input" name="password-input" type="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2"></div>
                <div id="div-img" class="col-sm-10"></div>
            </div>
            <div id="div-upload" style="display: none">
                <div class="form-group">
                    <label for="password-input" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                        <input id="file_upload" name="file_upload" type="file" class="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <input type="hidden" name="model-input" id="model-input" value="user">
            <input type="hidden" name="key-input" id="key-input" value="user_id">
            <input type="hidden" name="action-input" id="action-input" value="1">
            <input type="hidden" name="value-input" id="value-input" value="0">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right" onclick="saving(); return false;">Save</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        //
        <?php

        if ($param != null) {
            echo 'getData("'.$param.'");';
        }
        ?>




        // file upload
        $("#file_upload").fileinput({
            maxFileCount: 1,
            browseClass: "btn btn-default",
            browseLabel: "Pilih file",
            browseIcon: '<i class="fa fa-file"></i> ',
            removeClass: "btn btn-warning",
            removeLabel: "Hapus",
            removeIcon: '<i class="glyphicon glyphicon-trash"></i> ',
            uploadClass: "btn btn-info",
            uploadLabel: "Unggah",
            uploadIcon: '<i class="fa fa-cloud-upload"></i> ',
            previewFileType: "image",
            uploadUrl: "<?php echo base_url('doupload'); ?>", // your upload server url
            msgFilesTooMany: 'Jumlah berkas yang akan diunggah ({n}) melebihi batas jumlah yang sudah ditentukan ({m}). Coba ulangi proses unggah berkas!',
            msgLoading: 'Memproses berkas {index} dari {files} …',
            msgProgress: 'Memproses berkas {index} dari {files} - {name} - {percent}% selesai.',
            uploadExtraData: function() {
                return {
                    nama_field:'file_upload',
                    model:'user',
                    key: 'user_id',
                    value:$("#form-user #value-input").val()
                };
            }
        });

        //refresh if succes upload...
        $('#file_upload').on('filebatchuploadcomplete', function(event, files, extra) {
            loadContent(base_url + "view/_form_user/" + $("#value-input").val());
        });
    });

    function saving() {
        loading("loading", true);
        setTimeout(function () {
            //ajax jalan
            $.ajax({
                url: base_url + 'manage',
                type: 'POST',
                dataType: "json",
                data: $("#form-user").serialize(),
                cache: false,
                success: function (json) {
                    loading("loading", false);
                    if (json.data.code == 1) {
                        alert("Simpan data berhasil");
                        loadContent(base_url + 'view/_table_user');
                    } else if(json.data.code == 2) {
                        alert("Simpan data gagal!");
                    } else{
                        alert(json.data.message);
                    }
                },
                error: function () {
                    loading("loading", false);
                    alert("Respon server gagal!");
                }
            });
        }, 100);
    }

    function getData(n) {
        $.ajax({
            url: base_url + 'object',
            data: 'model-input=user&key-input=user_id&value-input=' + n,
            dataType: 'json',
            type: 'POST',
            cache: false,
            success: function(json) {
                if (json['data'].code === 1) {
                    $("#username-input").val(json.data.object.username).attr('readonly','');
                    $("#name-input").val(json.data.object.name);
                    $("#email-input").val(json.data.object.email);
                    $("#level-input").val(json.data.object.level);
                    $("#description-input").val(json.data.object.description);
                    $("#status-input").val(json.data.object.is_active);
                    $("#action-input").val("2");    //update
                    $("#value-input").val(n);
                    //show upload foto
                    $("#div-upload").show();
                    //show current img
                    $("#div-img").html("<img src='"+base_url+"asset/img/"+json.data.object.img+"' class='img img-thumbnail' style='height:180px; text-align:center'>");
                }
            }
        });
    }
</script>