<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">DATA GAJI</h3>
                    </div>

                    <div class="box-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>No. Slip Gaji</th>
                    <th>ID Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Tgl. Penggajian</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
	    
        </table>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $(' #mytable_filter input') .off('.DT') .on('keyup.DT', function(e) { 
                            if (e.keyCode==13) { api.search(this.value).draw(); } }); }, 
                            oLanguage: { sProcessing: "loading..." }, 
                            processing: true, 
                            serverSide: true, 
                            ajax: {"url": "gaji_hrd/json" , "type" : "POST" }, 
                            columns: [ 
                            { "data" : null},
                            { "data" : "no_slip"},
                            {"data": "id_karyawan" },
                            {"data": "nama" },
                            {"data": "jabatan" },
                            {"data": "tgl_penggajian" },
                            {"data": "salary" },
                            {"data": "tunjangan"},
                            {"data": "potongan"},
                            {"data": "total_gaji"},
                            {
                            "data": "action",
                            "orderable": false,
                            "className": "text-center"
                            }],
                            order: [[0, 'desc' ]], 
                            rowCallback: function(row, data, iDisplayIndex) 
                            { 
                                var info=this.fnPagingInfo(); var page=info.iPage; var length=info.iLength; var index=page * length + (iDisplayIndex + 1); $('td:eq(0)', row).html(index); 
                                } }); }); 
        </script>
                        



        </script>