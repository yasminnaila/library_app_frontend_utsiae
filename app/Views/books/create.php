<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col">
        <h2><i class="bi bi-plus-circle"></i> <?= esc($title) ?></h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="post" action="<?= base_url('books') ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" required value="<?= old('title') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="author" class="form-label">Pengarang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="author" name="author" required value="<?= old('author') ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="publisher" class="form-label">Penerbit <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="publisher" name="publisher" required value="<?= old('publisher') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="isbn" name="isbn" required value="<?= old('isbn') ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="publication_year" class="form-label">Tahun Terbit <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="publication_year" name="publication_year" required min="1000" max="<?= date('Y') + 1 ?>" value="<?= old('publication_year') ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="pages" class="form-label">Jumlah Halaman <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="pages" name="pages" required min="1" value="<?= old('pages') ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Fiksi" <?= old('category') == 'Fiksi' ? 'selected' : '' ?>>Fiksi</option>
                            <option value="Non-Fiksi" <?= old('category') == 'Non-Fiksi' ? 'selected' : '' ?>>Non-Fiksi</option>
                            <option value="Komik" <?= old('category') == 'Komik' ? 'selected' : '' ?>>Komik</option>
                            <option value="Biografi" <?= old('category') == 'Biografi' ? 'selected' : '' ?>>Biografi</option>
                            <option value="Teknologi" <?= old('category') == 'Teknologi' ? 'selected' : '' ?>>Teknologi</option>
                            <option value="Sejarah" <?= old('category') == 'Sejarah' ? 'selected' : '' ?>>Sejarah</option>
                            <option value="Sains" <?= old('category') == 'Sains' ? 'selected' : '' ?>>Sains</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Tersedia" <?= old('status') == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                    <option value="Dipinjam" <?= old('status') == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="<?= base_url('books') ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
