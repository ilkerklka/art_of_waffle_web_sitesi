<div class="layout has-sidebar fixed-sidebar fixed-header">
    <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
        <a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
        <div class="image-wrapper">
            <img src="assets/images/sidebar-bg.jpg" alt="sidebar background" />
        </div>
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <div class="pro-sidebar-logo">
                    <div><img src="../navbarr.png" alt="" height="50"></div>
                    <h5 style="margin-left: 16px;">Yönetim Paneli</h5>
                </div>
            </div>
            <div class="sidebar-content">
                <nav class="menu open-current-submenu">
                    <ul>
                        <li class="menu-header"><span> GENEL </span></li>
                        <li class="menu-item sub-menu">




                            <?php

                            $kullanicininbilgiler = $baglan->prepare("SELECT * FROM restoranaktiflik ");
                            $kullanicininbilgiler->execute();

                            $kullanici = $kullanicininbilgiler->fetch(PDO::FETCH_ASSOC);
                            $magza = $kullanici['aktiflik'];
                            if ($magza  == 1) {


                            ?>
                                <a href="aktifsipar.php">
                                    <span class="menu-icon">
                                        S
                                    </span>
                                    <span class="menu-title">Siparişler</span>
                                    <span class="menu-suffix">
                                        <span class="badge secondary">Aktif</span>
                                    </span>
                                </a>
                            <?php } else {
                            ?>
                                <a href="#">
                                    <span class="menu-icon">
                                        S
                                    </span>
                                    <span class="menu-title">Siparişler</span>
                                    <span class="menu-suffix">
                                        <span class="badge danger">Kapalı</span>
                                    </span>
                                </a>
                            <?php
                            } ?>


                            <div class="sub-menu-list">

                            </div>
                        </li>
                        <?php
                        if ($adminlevel == 1) {
                            # code...

                        ?>
                            <li class="menu-item sub-menu">
                                <a href="urunler.php">
                                    <span class="menu-icon">
                                        U
                                    </span>
                                    <span class="menu-title">Ürünler</span>
                                </a>
                                <div class="sub-menu-list">

                                </div>
                            </li>
                            <li class="menu-item sub-menu">
                                <a href="kategoriler.php">
                                    <span class="menu-icon">
                                        K
                                    </span>
                                    <span class="menu-title">Kategoriler</span>
                                </a>
                                <div class="sub-menu-list">

                                </div>
                            </li>
                            <li class="menu-item sub-menu">
                                <a href="adminler.php">
                                    <span class="menu-icon">
                                        A
                                    </span>
                                    <span class="menu-title">Adminler</span>
                                </a>
                                <div class="sub-menu-list">

                                </div>
                            </li>
                            <li class="menu-item sub-menu">
                                <a href="sayfametin.php">
                                    <span class="menu-icon">
                                        SM
                                    </span>
                                    <span class="menu-title">Sayfa Metinleri</span>
                                </a>
                                <div class="sub-menu-list">

                                </div>
                            </li>
                            <li class="menu-item sub-menu">
                                <a href="popup.php">
                                    <span class="menu-icon">
                                        AP
                                    </span>
                                    <span class="menu-title">Açılış Pop-up'ı</span>
                                </a>
                                <div class="sub-menu-list">

                                </div>
                            </li>
                            <li class="menu-item sub-menu">
                                <a href="sosyalmedya.php">
                                    <span class="menu-icon">
                                        S
                                    </span>
                                    <span class="menu-title">Sosyal Medya</span>
                                </a>
                                <div class="sub-menu-list">

                                </div>
                            </li>
                            <li class="menu-item sub-menu">
                                <a href="adresler.php">
                                    <span class="menu-icon">
                                        AA
                                    </span>
                                    <span class="menu-title">Adres Ayarları</span>
                                </a>
                                <div class="sub-menu-list">

                                </div>
                            </li>
                            <li class="menu-item sub-menu">
                                <a href="iptal.php">
                                    <span class="menu-icon">
                                        İP
                                    </span>
                                    <span class="menu-title">İptal Sebepleri</span>
                                </a>
                                <div class="sub-menu-list">

                                </div>
                            </li>
                        <?php } ?>
                        <li class="menu-header" style="padding-top: 20px"><span> EKSTRA </span></li>
                        <li class="menu-item">
                            <a href="../logout.php">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </span>
                                <span class="menu-title">Çıkış</span>
                                <!-- <span class="menu-suffix">
                  <span class="badge secondary">Beta</span>
                </span> -->
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#">
                                <span class="menu-icon">
                                <i class="fa-solid fa-user"></i>
                                </span>
                                <span class="menu-title">Hoşgeldin : <?php echo $adminisim?></span>
                                
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
    </aside>
    <div id="overlay" class="overlay"></div>
    <div class="layout">
        <main class="content">