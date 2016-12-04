<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Data User</h3>
        <a href="#" class="btn btn-success pull-right" onclick="loadContent(base_url + 'view/_form_user')">Add User</a>
    </div>
    <div id="loading"></div>
    <table id="table-user" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        //
        getData();
    });

    function getData() {
        if ($.fn.dataTable.isDataTable('#table-user')) {
            table = $('#table-user').DataTable();
        } else {
            table = $('#table-user').DataTable({
                "ajax": base_url + 'objects/user',
                "columns": [
                    {"data": "username"},
                    {"data": "name"},
                    {"data": "email"},
                    {"data": "level"},
                    {"data": "status"},
                    {"data": "aksi"}
                ],
                "ordering": true,
                "deferRender": true,
                "order": [[0, "asc"]],
                "fnDrawCallback": function (oSettings) {
                    utils();
                }
            });
        }
    }

    function utils() {
        $("#table-user .editBtn").on("click",function(){
            loadContent(base_url + 'view/_form_user/' + $(this).attr('href').substring(1));
        });

        $("#table-user .removeBtn").on("click",function(){
            confirmDelete($(this).attr('href').substring(1));
        });
    }

    function confirmDelete(x){
        if(confirm("Yakin hapus Data???")){
            loading('loading', true);
            setTimeout(function() {
                $.ajax({
                    url: base_url + 'manage',
                    data: 'model-input=user&key-input=user_id&action-input=3&value-input=' + x,
                    dataType: 'json',
                    type: 'POST',
                    cache: false,
                    success: function(json) {
                        loading('loading',false);
                        if (json['data'].code === 1) {
                            alert('Hapus data berhasil');
                            loadContent(base_url + "view/_table_user");
                        } else if(json['data'].code === 2){
                            alert('Hapus data tidak berhasil!');
                        } else{
                            alert(json['data'].message);
                        }
                    },
                    error: function () {
                        loading('loading',false);
                        alert('Hapus data tidak berhasil, terjadi kesalahan!');
                    }
                });
            }, 100);
        }
    }
</script>