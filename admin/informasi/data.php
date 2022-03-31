<?php
$page = "PKBM Sanggar Puri | Informasi";
include "../header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Informasi</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="../dashboard/index.php">Home</a></li>
                      <li class="breadcrumb-item active">Informasi</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?php
          include "../../alert/alert.php";
      ?>
      <div class="row">
        <div class="col-12">
          <div class="card">
          <!-- /.card-header -->
            <div class="card-header">
              <h3 class="card-title">Data Informasi</h3>
              <div class="card-tools">
                  <a href="tambah.php" class="btn btn-success btn-xs"><i class="fas fa-plus"> DATA</i></a>
              </div>
            </div>
            <div class="card-body">
              <table id="admin" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><i class="fas fa-cog"></i></th>
                    <th>No</th>
                    <th>ID Info</th>
                    <th>Judul</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      $query="SELECT * FROM informasi";
                      $sql_admin = mysqli_query($conn, $query) or die (mysqli_error($conn));
                      while($data = mysqli_fetch_array($sql_admin)) { 
                    ?>
                    <tr>
                      <td>
                        <a href ="edit.php?id=<?=$data['id_info']?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                        <a href="javascript:;" data-id="<?=$data['id_info']?>" data-toggle="modal" data-target="#modalDelete" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                      </td>
                      <td><?=$no++?></td>
                      <td><?=$data['id_info']?></td>
                      <td><?=$data['judul']?></td>
                      <td><?=$data['date']?></td>          
                    </tr>
                    <div class="modal fade" id="modalDelete">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Apakah anda yakin ingin menghapus data ini?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href ="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <?php
                    }
                    ?>
                  </tbody>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
     </div>
  </section>
</div>

<?php
include "../footer.php";
?>
<script>
<?php 
$tgl = date('d-m-Y H:i:s');
?>
$(function () {
      $("#admin").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "columnDefs" : [
                        {width: 130, targets: 5},
                        {width: 50, targets: 6}],
        "buttons": ["copy", "csv", 
                    {extend :'excel', 
                     title : 'Data Informasi <?php echo "(".$tgl.")"?>'
                    }, 
                    {extend :'pdf',
                      orientation : 'landscape',
                      pageSize : 'Legal',
                      title : 'Data Informasi',
                      messageTop: '<?php echo "(".$tgl.")"?>'
                    }, 
                    {
                      extend: "print",
                      customize: function(win)
                      {
                        var last = null;
                        var current = null;
                        var bod = [];
        
                        var css = '@page { size: landscape; }',
                        head = win.document.head || win.document.getElementsByTagName('head')[0],
                        style = win.document.createElement('style');
      
                        style.type = 'text/css';
                        style.media = 'print';
        
                        if (style.styleSheet){
                          style.styleSheet.cssText = css;
                        }else{
                          style.appendChild(win.document.createTextNode(css));
                        }
                        head.appendChild(style);
                      }
                    },"colvis"]
        }).buttons().container().appendTo('#admin_wrapper .col-md-6:eq(0)');
    });
</script>


                      