<?
if(empty($_SESSION['username'])){
    header('Location: login.php');
    }
    ?>
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="info_shop.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
            <strong><a href="info_shop.php"><img src="img/logo/logosn.png" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">

                    <li>
                        <a title="Landing Page" href="./jongq_user.php" aria-expanded="false"><span
                                class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                            <span class="mini-click-non">การจอง</span></a>
                    </li>
                    <!-- <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false"><span
                                    class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                                <span class="mini-click-non">ข่าว</span></a>
                        </li> -->
                </ul>
            </nav>
        </div>
    </nav>
</div>