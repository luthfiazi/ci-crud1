<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
    <h1>Membuat Crud Sederhana</h1>
    <?php echo anchor('crud/tambah', '<button>Tambah Data</button>'); ?>
    <a href="<?php echo base_url('login/logout'); ?>"><button class="btn btn-danger">Logout</button></a>
    <br>
    <br>
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Action</th>
        </tr>
        <?php
            $no = $this->uri->segment('3')+1;
            foreach($user as $u){
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $u->nama ?></td>
            <td><?php echo $u->alamat ?></td>
            <td><?php echo $u->pekerjaan ?></td>
            <td>
                <?php echo anchor('crud/edit/'.$u->id, 'Edit'); ?>
                <?php echo anchor('crud/hapus/'.$u->id, 'Hapus'); ?>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <?php
          echo $pagination;
      ?>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>