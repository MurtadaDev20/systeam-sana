<?php ?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Sana</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <!-- Admin -->

    <?php



    ?>
    <ul class="menu-inner py-1">


        <!-- Requests -->

        <!-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">الطلبات</span>
        </li> -->



        
        <li class="menu-item">
            <a href="request_accept.php" class="menu-link">
                <i class=" badge-right xs menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Notifications">كل الطلبات</div><span class="bx-burst mx-4  badge badge-right rounded-pill bg-danger xs">
                    <?php
                    $req = mysqli_query($con, "SELECT COUNT(id) as Responce_Count FROM `response` where driver_id = '$_SESSION[id_driver]'");
                    $row = mysqli_fetch_assoc($req);
                    if ($req) {
                        echo $row['Responce_Count'];
                    }
                    ?>
            </a>
        </li>

   

    






    </ul>










</aside>