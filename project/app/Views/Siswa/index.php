<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            successful <strong><?= session()->getFlashData('message') ?></strong> data
        </div>

    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa fa-plus"> Add Data</i>
                    </button>
                </div>
                <div class="col-md">
                    <a href="siswa/excel" class="btn btn-outline-primary shadow float-right">Excel <i class="fa fa-file-excel"></i></a>
                </div>
            </div>
            <!-- Button trigger modal -->

        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>School</th>
                        <th>Grade</th>
                        <th>Departmen</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (4 * ($currentPage - 1)); ?>
                    <?php foreach ($siswa as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['school']; ?></td>
                            <td><?= $row['grade']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit" class="btn btn-sm btn-warning" data-id="<?= $row['id']; ?>" data-nama="<?= $row['name']; ?>" data-school="<?= $row['school']; ?>" data-grade="<?= $row['grade']; ?>" data-department="<?= $row['department']; ?>" data-phone="<?= $row['phone_number']; ?>" data-email="<?= $row['email']; ?>"><i class="fa fa-edit"></i></button>

                                <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail" data-id="<?= $row['id']; ?>" data-nama="<?= $row['name']; ?>" data-school="<?= $row['school']; ?>" data-grade="<?= $row['grade']; ?>" data-department="<?= $row['department']; ?>" data-phone="<?= $row['phone_number']; ?>" data-email="<?= $row['email']; ?>" id="btn-edit">Detail</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md">
                    <div class="d-flex justify-content-center">
                        <?= $pager->links('siswa', 'bootstrap_pagination'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Modal tambah-->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('siswa/tambah'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama1">Name</label>
                        <input id="nama1" class="form-control" type="text" name="nama" placeholder="insert name" required>
                    </div>
                    <div class="form-group">
                        <label for="school1">School</label>
                        <input id="school1" class="form-control" type="text" name="school" placeholder="insert school" required>
                    </div>
                    <div class="form-group">
                        <label for="grade1">select grade</label>
                        <select class="form-control" id="grade1" name="grade">
                            <option value="Kelas 1">Kelas 1</option>
                            <option value="Kelas 2">Kelas 2</option>
                            <option value="Kelas 3">Kelas 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="department1">select department</label>
                        <select class="form-control" id="department1" name="department">
                            <option value="TKJ">TKJ</option>
                            <option value="RPL">RPL</option>
                            <option value="Multimedia">Multimedia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone1">Phone number</label>
                        <label class="sr-only" for="phone">Phone Number</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+62</div>
                            </div>
                            <input type="text" class="form-control" id="phone1" placeholder="phone number" name="phone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email1">Email address</label>
                        <input type="email" class="form-control" id="email1" placeholder="name@example.com" name="email" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Data</button>
            </div>
        </div>
        </form>
    </div>
</div>



<!-- Modal hapus data siswa-->
<div class="modal fade" id="modalHapus">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                are you sure you want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <a href="/siswa/hapus/<?= $row['id']; ?>" class="btn btn-primary">Yes</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal ubah-->

<div class="modal fade" id="modalUbah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit student's data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('siswa/ubah'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id-siswa">
                        <label for="nama">Name</label>
                        <input id="nama" class="form-control" type="text" name="nama" placeholder="insert name" value="<?= $row['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="school">School</label>
                        <input id="school" class="form-control" type="text" name="school" placeholder="insert school" value="<?= $row['school']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">select grade</label>
                        <select class="form-control" id="grade" name="grade" value="<?= $row['grade']; ?>">
                            <option value="Kelas 1">Kelas 1</option>
                            <option value="Kelas 2">Kelas 2</option>
                            <option value="Kelas 3">Kelas 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="department">select department</label>
                        <select class="form-control" id="department" name="department" value="<?= $row['department']; ?>">
                            <option value="TKJ">TKJ</option>
                            <option value="RPL">RPL</option>
                            <option value="Multimedia">Multimedia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <label class="sr-only" for="phone">Phone Number</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+62</div>
                            </div>
                            <input type="text" class="form-control" id="phone" placeholder="phone number" name="phone" value="<?= $row['phone_number']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?= $row['email']; ?>" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="ubah" class="btn btn-primary">Edit Data</button>
            </div>
        </div>
        </form>
    </div>
</div>

<!-- Modal Detail-->

<div class="modal fade" id="modalDetail">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail student's data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id-siswa">
                        <label for="nama">Name</label>
                        <input id="nama" class="form-control" type="text" name="nama" placeholder="insert name" value="<?= $row['name']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="school">School</label>
                        <input id="school" class="form-control" type="text" name="school" placeholder="insert school" value="<?= $row['school']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="grade">select grade</label>
                        <select class="form-control" id="grade" name="grade" value="<?= $row['grade']; ?>" disabled>
                            <option value="Kelas 1">Kelas 1</option>
                            <option value="Kelas 2">Kelas 2</option>
                            <option value="Kelas 3">Kelas 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="department">select department</label>
                        <select class="form-control" id="department" name="department" value="<?= $row['department']; ?>" disabled>
                            <option value="TKJ">TKJ</option>
                            <option value="RPL">RPL</option>
                            <option value="Multimedia">Multimedia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <label class="sr-only" for="phone">Phone Number</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+62</div>
                            </div>
                            <input type="text" class="form-control" id="phone" placeholder="phone number" name="phone" value="<?= $row['phone_number']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?= $row['email']; ?>" disabled>
                    </div>
            </div>
        </div>
        </form>
    </div>
</div>