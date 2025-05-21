<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button id="toggle-btn" type="button">
                <i class="bi bi-grid-fill"></i>
            </button>
            <div class="sidebar-logo">
                <a href="/buku">Perpustakaan</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="/user" class="sidebar-link">
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/buku" class="sidebar-link">
                    <i class="bi bi-book-fill"></i>
                    <span>Daftar Buku</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/logout" class="sidebar-link">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
    <?= $this->renderSection('content'); ?>
</div>