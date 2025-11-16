<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col">
        <h2><i class="bi bi-eye"></i> <?= esc($title) ?></h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">ID</div>
            <div class="col-md-9"><?= esc($book['id']) ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Judul</div>
            <div class="col-md-9"><?= esc($book['title']) ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Pengarang</div>
            <div class="col-md-9"><?= esc($book['author']) ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Penerbit</div>
            <div class="col-md-9"><?= esc($book['publisher']) ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">ISBN</div>
            <div class="col-md-9"><?= esc($book['isbn']) ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Tahun Terbit</div>
            <div class="col-md-9"><?= esc($book['publication_year']) ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Jumlah Halaman</div>
            <div class="col-md-9"><?= esc($book['pages']) ?> halaman</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Kategori</div>
            <div class="col-md-9">
                <span class="badge bg-info"><?= esc($book['category']) ?></span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Status</div>
            <div class="col-md-9">
                <?php if ($book['status'] == 'Tersedia'): ?>
                    <span class="badge bg-success">Tersedia</span>
                <?php else: ?>
                    <span class="badge bg-warning">Dipinjam</span>
                <?php endif; ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Dibuat</div>
            <div class="col-md-9"><?= esc($book['created_at']) ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Diupdate</div>
            <div class="col-md-9"><?= esc($book['updated_at']) ?></div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <a href="<?= base_url('books/' . $book['id'] . '/edit') ?>" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="<?= base_url('books') ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="button" class="btn btn-danger" onclick="confirmDelete(<?= $book['id'] ?>)">
                <i class="bi bi-trash"></i> Hapus
            </button>
        </div>
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
