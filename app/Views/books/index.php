<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col">
        <h2><i class="bi bi-list-ul"></i> <?= esc($title) ?></h2>
    </div>
    <div class="col text-end">
        <a href="<?= base_url('books/create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Buku
        </a>
    </div>
</div>

<!-- Filter & Search -->
<div class="card mb-4">
    <div class="card-body">
        <form method="get" action="<?= base_url('books') ?>">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari judul, pengarang, penerbit..." value="<?= esc($search ?? '') ?>">
                </div>
                <div class="col-md-3">
                    <select name="category" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="Fiksi" <?= ($category ?? '') == 'Fiksi' ? 'selected' : '' ?>>Fiksi</option>
                        <option value="Non-Fiksi" <?= ($category ?? '') == 'Non-Fiksi' ? 'selected' : '' ?>>Non-Fiksi</option>
                        <option value="Komik" <?= ($category ?? '') == 'Komik' ? 'selected' : '' ?>>Komik</option>
                        <option value="Biografi" <?= ($category ?? '') == 'Biografi' ? 'selected' : '' ?>>Biografi</option>
                        <option value="Teknologi" <?= ($category ?? '') == 'Teknologi' ? 'selected' : '' ?>>Teknologi</option>
                        <option value="Sejarah" <?= ($category ?? '') == 'Sejarah' ? 'selected' : '' ?>>Sejarah</option>
                        <option value="Sains" <?= ($category ?? '') == 'Sains' ? 'selected' : '' ?>>Sains</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="Tersedia" <?= ($status ?? '') == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                        <option value="Dipinjam" <?= ($status ?? '') == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Books Table -->
<div class="card">
    <div class="card-body">
        <?php if (empty($books)): ?>
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Tidak ada buku yang ditemukan.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                            <tr>
                                <td><?= esc($book['id']) ?></td>
                                <td><?= esc($book['title']) ?></td>
                                <td><?= esc($book['author']) ?></td>
                                <td><?= esc($book['publisher']) ?></td>
                                <td><?= esc($book['publication_year']) ?></td>
                                <td>
                                    <span class="badge bg-info"><?= esc($book['category']) ?></span>
                                </td>
                                <td>
                                    <?php if ($book['status'] == 'Tersedia'): ?>
                                        <span class="badge bg-success">Tersedia</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning">Dipinjam</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= base_url('books/' . $book['id']) ?>" class="btn btn-info" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="<?= base_url('books/' . $book['id'] . '/edit') ?>" class="btn btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" title="Hapus" onclick="confirmDelete(<?= $book['id'] ?>)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus buku ini?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?= base_url('books/') ?>' + id + '/delete';
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

<?= $this->endSection() ?>
