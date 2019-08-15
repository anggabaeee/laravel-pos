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
        padding-right: 4 0px;
    }





    .fa-caret-down {
        list-style-type: none;

    }

</style>
<section class="menu-sidebar">
    <div class="row">
        <div id="sidebar-collapse" class=" col-sm-3 col-lg-2 sidebar collapse in">
            <ul class="nav flex-column bg-sidebar">
                <li>
                    <a href="dashboard/">Dashboard</a>
                </li>
                <li>
                    <a href="">Customer</a>
                </li>
                <li>
                    <a class="dropdown-btn" style="color:#005b8a">Gift Card
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <div class="dropdown-container">

                        <div class="dropdown-item">
                    
                            <a href="#">Add Gift Card</a>
                         
                            <br>
                            <a href="#">List Gift Card</a>
                            <br>
                        </div>
                    </div>
               </li>
                <li>
                    <a href="">Debit</a>
                </li>
                <li>
                    <a href="">Sales</a>
                </li>
                <li>
                    <a href="">Reports</a>
                </li>
                <li>
                    <a href="">Expenses</a>
                </li>
                <li>
                    <a href="">Profit & Loss</a>
                </li>
                <li>
                    <a href="">POS</a>
                </li>
                <li>
                    <a href="">Return Order</a>
                </li>
                <li>
                    <a href="">Inventory</a>
                </li>
                <li>
                    <a href="">Products</a>
                </li>
                <li>
                    <a href="">Purchase Order</a>
                </li>
                <li>
                    <a href="">Setting</a>
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
