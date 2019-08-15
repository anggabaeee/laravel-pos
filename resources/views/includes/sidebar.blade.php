<style>
    body {
        background-color: #f0f0f0;
    }

    a {
        text-decoration: none;
        color: #005b8a;
        transition: 0.3s;
    }

    a:hover {
        text-decoration: none;
    }

    li a:hover {
        text-decoration: none;
        color: white;
        background-color: #005b8a;
    }

    .menu-sidebar {
        margin-top: 56px;
    }

    .bg-sidebar {
        background-color: white;
    }

    .nav {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .nav>li {
        position: relative;
        display: block;
    }

    .nav>li>a> {
        position: relative;
        display: block;
        padding: 10px 15px;
        font-size: 13px;
    }

    .dropdown-container {
        list-style-position: outside;
        display: none;

    }

    .dropdown-item {
        list-style-type: none;
        padding-top:10px;
        font-size:13px;    
    }

    .dropdown-btn{
     
    }
    .fa-caret-down {
        color:white;

    }

</style>
<section class="menu-sidebar">
    <div class="row">
        <div id="sidebar-collapse" class=" col-sm-3 col-lg-2 sidebar collapse in">
            <ul class="nav flex-column bg-sidebar mb-3">
                <li>
                    <a href="dashboard/">Dashboard</a>
                </li>
                <li>
                    <a href="">Customer</a>
                </li>
                <li>
                    <a class="dropdown-btn">Gift Card
                    </a>
                  <div class="dropdown-container">
                        <div class="dropdown-item">
                            <a href="#" class="">Add Gift Card</a>
                            </div>
                            <div class="dropdown-item">
                            <a href="#">List Gift Card</a>
                        </div>
                    </div>
               </li>
                <li>
                    <a href="">Debit</a>
                </li>
                <li>
                <a class="dropdown-btn">Sales
                    </a>
                  <div class="dropdown-container">
                        <div class="dropdown-item">
                            <a href="#" class="">Today's Sales</a>
                            </div>
                            <div class="dropdown-item">
                            <a href="#">Opened Bill</a>
                        </div>
                    </div>
                </li>
                <li>
                <a class="dropdown-btn">Reports
                    </a>
                  <div class="dropdown-container">
                        <div class="dropdown-item">
                            <a href="#" class="">Sales Report</a>
                            </div>
                            <div class="dropdown-item">
                            <a href="#">Sold By Product</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="">Expenses</a>
                </li>
                <li>
                <a class="dropdown-btn">Profit & Loss
                    </a>
                  <div class="dropdown-container">
                        <div class="dropdown-item">
                            <a href="#" class="">Profit & Loss</a>
                            </div>
                            <div class="dropdown-item">
                            <a href="#">Profit & Loss Report</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="">POS</a>
                </li>
                <li>
                <a class="dropdown-btn">Return Order
                    </a>
                  <div class="dropdown-container">
                        <div class="dropdown-item">
                            <a href="#" class="">Create Return Order</a>
                            </div>
                            <div class="dropdown-item">
                            <a href="#">Return Order Report</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="">Inventory</a>
                </li>
                <li>
                <a class="dropdown-btn">Products
                    </a>
                  <div class="dropdown-container">
                        <div class="dropdown-item">
                            <a href="#" class="">List Products</a>
                            </div>
                            <div class="dropdown-item">
                            <a href="#">Print Product Label</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="#">Product Category</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="">Purchase Order</a>
                </li>
                <li>
                <a class="dropdown-btn">Settings
                    </a>
                  <div class="dropdown-container">
                        <div class="dropdown-item">
                            <a href="#" class="">Outlets</a>
                            </div>
                            <div class="dropdown-item">
                            <a href="#">User</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="#">Supllier</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="#">System  Setting</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="#">Payment Methods</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }

    </script>
