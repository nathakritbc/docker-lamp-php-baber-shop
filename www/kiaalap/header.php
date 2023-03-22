   <div class="header-advance-area">
       <div class="header-top-area">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="header-top-wraper">
                           <div class="row">
                               <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                   <div class="menu-switcher-pro">
                                       <button type="button" id="sidebarCollapse"
                                           class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                           <i class="educate-icon educate-nav"></i>
                                       </button>
                                   </div>
                               </div>
                               <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                   <div class="header-top-menu tabl-d-n">
                                       <ul class="nav navbar-nav mai-top-nav">
                                           <li class="nav-item"><a href="./info_shop.php" class="nav-link">หน้าหลัก</a>
                                           </li>
                                           <?php 
                            if($_SESSION["user_role"] ==="USER"){?>
                                           <li class="nav-item"><a href="./jongq_list_user.php"
                                                   class="nav-link">รายการจอง</a>
                                           </li>
                                           <li class="nav-item"><a href="./update_user_profile.php"
                                                   class="nav-link">เเก้ไขข้อมูลผู้ใช้งาน</a>
                                           </li>
                                           <li class="nav-item"><a href="./update_user_password.php"
                                                   class="nav-link">เเก้ไขรหัสผ่าน</a>
                                           </li>
                                           <?php }elseif($_SESSION["user_role"] ==="ADMIN"){?>
                                           <!-- <li class="nav-item"><a href="./jongq_list_admin.php"
                                                   class="nav-link">รายการจอง</a>
                                           </li> -->
                                           <li class="nav-item"><a href="./admin_time_slot.php"
                                                   class="nav-link">ช่วงเวลาการจอง</a>
                                           </li>
                                           <li class="nav-item"><a href="./update_shop_information.php"
                                                   class="nav-link">ข้อมูลร้านตัดผม</a>
                                           </li>
                                           <li class="nav-item"><a href="./admin_bank_account.php"
                                                   class="nav-link">จัดการบัญชีธนาคาร</a>
                                           </li>
                                           <?php   } ?>

                                           <li class="nav-item"><a href="./logout.php" class="nav-link">ออกจากระบบ</a>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                               <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                   <div class="header-right-info">
                                       <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                           <li class="nav-item">
                                               <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                   class="nav-link dropdown-toggle">

                                                   <?php 
                                                        if($_SESSION['profile'] == NULL || $_SESSION['profile'] == "" ){
                                                                echo "<img src='img/user/profile.png' alt='' />";
                                                        }else{?>
                                                   <img src='img/user/<?=$_SESSION['profile']?>' alt='' />
                                                   <?php }
                                                        ?>
                                                   <span class="admin-name"><?=$_SESSION['full_name'];?></span>
                                                   <!-- <i class="fa fa-angle-down edu-icon edu-down-arrow"></i> -->
                                               </a>

                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- Mobile Menu start -->
       <div class="mobile-menu-area">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="mobile-menu">
                           <nav id="dropdown">
                               <ul class="mobile-menu-nav">

                                   <?php if($_SESSION["user_role"] ==="USER"){?>
                                   <li><a href="info_shop.php">หน้าหลัก</a></li>
                                   <li><a href="jongq_user.php">จองคิวตัดผม</a></li>
                                   <li><a href="jongq_list_user.php">รายการจองคิวตัดผม</a></li>
                                   <li><a href="update_user_profile.php">เเก้ไขข้อมูลผู้ใช้งาน</a></li>
                                   <li><a href="update_user_password.php">เเก้ไขข้อมูลรหัสผ่าน</a></li>
                                   <li><a href="logout.php">ออกจากระบบ</a></li>

                                   <?php }elseif($_SESSION["user_role"] ==="ADMIN"){?>

                                   <li><a href="info_shop.php">หน้าหลัก</a></li>
                                   <li><a href="jongq_list_admin.php">รายการจองคิวตัดผม</a></li>
                                   <li><a href="admin_time_slot.php">ช่วงเวลาการจอง</a></li>
                                   <li><a href="update_shop_information.php">ข้อมูลร้านตัดผม</a></li>
                                   <li><a href="admin_bank_account.php">จัดการบัญชีธนาคาร</a></li>
                                   <li><a href="logout.php">ออกจากระบบ</a></li>


                                   <?php
                                }
                                ?>



                                   <!-- <li><a data-toggle="collapse" data-target="#demoevent" href="#">Professors <span
                                               class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                       <ul id="demoevent" class="collapse dropdown-header-top">
                                           <li><a href="all-professors.html">All Professors</a>
                                           </li>
                                           <li><a href="add-professor.html">Add Professor</a>
                                           </li>
                                           <li><a href="edit-professor.html">Edit Professor</a>
                                           </li>
                                           <li><a href="professor-profile.html">Professor Profile</a>
                                           </li>
                                       </ul>
                                   </li> -->

                               </ul>
                           </nav>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- Mobile Menu end -->
       <div class="breadcome-area">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="breadcome-list single-page-breadcome">
                           <!-- <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..."
                                                    class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Data Table</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>