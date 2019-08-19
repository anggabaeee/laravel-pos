<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-lg-2 sidebar collapse show" id="sidebar-collapse" style="padding-left: 0px; padding-right: 0px;">
            <ul class="sidebar-ul" style="padding-left: 0px;">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/customer">Customers</a></li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Gift Card</a>
                    <div class="dropdown-container" style="display: none;">
                        <div class="dropdown-item">
                            <a href="/addgift">Add Gift Card</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/listgift">List Gift Card</a>
                        </div>
                    </div>
                </li>
                <li><a href="/debit">Debit</a></li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Sales</a>
                    <div class="dropdown-container" style="display: none;">
                        <div class="dropdown-item">
                            <a href="/todaysales">Today's Sales</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/openedbil">Opened Bill</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Reports</a>
                    <div class="dropdown-container" style="display: none;">
                        <div class="dropdown-item">
                            <a href="/salesreports" class="">Sales Report</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/soldbyproduct">Sold By Product</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Expenses</a>
                    <div class="dropdown-container" style="display: none;">
                        <div class="dropdown-item">
                            <a href="/expenses" class="">Expenses</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/expensescategory">Expenses Category</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Profit & Loss</a>
                    <div class="dropdown-container" style="display: none;">
                        <div class="dropdown-item">
                            <a href="#" class="">Profit & Loss</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="#">Profit & Loss Report</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="/pos">POS</a>
                </li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Return Order</a>
                    <div class="dropdown-container" style="display: none;">
                        <div class="dropdown-item">
                            <a href="">Create Return Order</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="">Return Order Report</a>
                        </div>
                    </div>
                </li>
                <li><a href="/inventory">Inventory</a></li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Products</a>
                    <div class="dropdown-container" style="display: none;">
                        <div class="dropdown-item">
                            <a href="/product/ListProduct" class="">List Products</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="#">Print Product Label</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/product/ProductCategory">Product Category</a>
                        </div>
                    </div>
                </li>
                <li><a href="/purchase_order">Purchase Order</a></li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Setting</a>
                    <div class="dropdown-container" style="display: none;">
                        <div class="dropdown-item">
                            <a href="/setting/outlets" class="">Outlets</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/setting/users">User</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/setting/suppliers">Supllier</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/setting/system_setting">System Setting</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/setting/payment_method">Payment Methods</a>
                        </div>
                    </div>
                </li>
            </ul>
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
