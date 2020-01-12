<div class="left-sidebar">
  <h5>Menu</h5>
  <ul class="sidebar-custom">
    <li class="sidebar-item <?php if ($title == 'Profil') {
                              echo 'active';
                            } ?>">
      <a href="<?= base_url('Profil'); ?>" class="sidebar-link">Profil</a>
    </li>
    <li class="sidebar-item <?php if ($title == 'Ulasan') {
                              echo 'active';
                            } ?>">
      <a href="#" class="sidebar-link">Ulasan</a>
    </li>
    <li class="sidebar-item <?php if ($title == 'Riwayat Transaksi') {
                              echo 'active';
                            } ?>">
      <a href="<?= base_url('Profil/riwayattransaksi'); ?>" class="sidebar-link">Riwayat Transaksi</a>
    </li>
    <li class="sidebar-item <?php if ($title == 'Komplain') {
                              echo 'active';
                            } ?>">
      <a href="#" class="sidebar-link">Komplain</a>
    </li>
    <li class="sidebar-item <?php if ($title == 'Ganti Password') {
                              echo 'active';
                            } ?>">
      <a href="<?= base_url('Profil/gantipassword'); ?>" class="sidebar-link">Ganti Password</a>
    </li>
    <li class="sidebar-item <?php if ($title == 'Pengaturan') {
                              echo 'active';
                            } ?>">
      <a href="#" class="sidebar-link">Pengaturan</a>
    </li>
  </ul>
</div>