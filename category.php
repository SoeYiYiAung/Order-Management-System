<?php
include_once "layouts/header.php";
include_once "controller/category_controller.php";

$categoryController=new CategoryController();
$categories=$categoryController->getCategories();

//Use pagination
if(isset($_GET['page']) && !empty($_GET['page']))
{
    $page=$_GET['page'];
}
else{
    $page=1;
}
$result_page=$categoryController->getCategoriesPage($page);
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- End of Topbar -->

                <a href="create_category.php">
                    <button type="submit" name="add" class="btn btn-primary mb-3"> Create New Category</button>
                </a>
                <div class="row">
                    <table class="table table-striped" >
                    <thead>
                        <tr>
                        <td>No</td>
                        <td>id</td>
                        <td>Name</td>
                        <td>Parent</td>
                        <td>Button</td>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                
                        /* for($row=0;$row<count($categories);$row++)
                        {
                            echo "<tr>";
                            echo "<td>".$categories[$row]["id"]."</td>";
                            echo "<td>".$categories[$row]["name"]."</td>";
                            if($categories[$row]['parent']==0)
                            {
                                echo "<td>-</td>";
                            }
                            else{
                                for($i=0;$i<count($categories);$i++)
                                {
                                    if($categories[$row]['parent']==$categories[$i]['id'])
                                    {
                                        echo "<td>".$categories[$i]["name"]."</td>"; 
                                    }
                                }
                                
                            }
                            
                            echo "<td id='".$categories[$row]['id']."'>
                                    <a class='btn btn-warning mr-5' href='edit_category.php?id=".$categories[$row]["id"]."'>Edit</a>
                                    <a class='btn btn-danger delete'>Delete</a></td>";

                            echo "</tr>";
                        } */
                        
                        //use pagination
                        $items_per_page=7;
                        $number=1+($page-1)*$items_per_page;//for No
                        for($row=0;$row<count($result_page);$row++)
                        {
                            echo "<tr>";
                            echo "<td>".$number+$row."</td>";//for No
                            echo "<td>".$result_page[$row]["id"]."</td>";
                            echo "<td>".$result_page[$row]["name"]."</td>";
                            if($result_page[$row]['parent']==0)
                            {
                                echo "<td>-</td>";
                            }
                            else{
                                for($i=0;$i<count($result_page);$i++)
                                {
                                    if($result_page[$row]['parent']==$result_page[$i]['id'])
                                    {
                                        echo "<td>".$result_page[$i]["name"]."</td>"; 
                                    }
                                }
                                
                            }
                            
                            echo "<td id='".$result_page[$row]['id']."'>
                                    <a class='btn btn-warning mr-5' href='edit_category.php?id=".$result_page[$row]["id"]."'>Edit</a>
                                    <a class='btn btn-danger delete'>Delete</a></td>";

                            echo "</tr>";
                        }
            
                        ?>
                    </tbody>
                    </table>

                </div>

                <div class="row">
                    <ul class="pagination">
                        <?php
                            $pages=ceil(count($categories)/$items_per_page);
                            $previous=$page-1;
                            $next=$page+1;

                            if($page<=1)
                            {
                                echo '<li class="page-item disabled">
                                <a class="page-link" href="#" >Previous</a>
                                </li>';
                            }
                            else
                            {
                                if($previous==1)
                                {
                                    echo '<li class="page-item">
                                    <a class="page-link" href="category.php" >Previous</a>
                                    </li>';
                                }
                                else{
                                    echo '<li class="page-item">
                                    <a class="page-link" href="category.php?page='.$previous.'" >Previous</a>
                                    </li>';
                                }
                                
                            }

                            for($index=1;$index<=$pages;$index++)
                            {
                                if($page==$index)
                                {
                                    echo '<li class="page-item active"><a class="page-link" href="category.php?page='.$index.'">'.$index.'</a></li>';
                                    
                                }
                                else
                                {
                                   echo '<li class="page-item"><a class="page-link" href="category.php?page='.$index.'">'.$index.'</a></li>';
                                }
                            }

                            if($page>=$pages)
                            {
                                echo '<li class="page-item disabled">
                                <a class="page-link" href="#" >Next</a>
                                </li>';
                            }
                            else
                            {
                                echo '<li class="page-item">
                                <a class="page-link" href="category.php?page='.$next.'" >Next</a>
                                </li>';
                            }
                        ?>
                        
                    </ul>
                </div>

<?php
include_once "layouts/footer.php";
?>
