<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-lg-2 sidebar collapse show" id="sidebar-collapse"
            style="padding-left: 0px; padding-right: 0px;">
            <ul class="sidebar-ul" style="padding-left: 0px;">
                <li class="{{ Request::is('dashboard') ? "active-link" : "" }}">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="{{ Request::is('customer','customer/addCustomer') ? "active-link" : "" }}">
                    <a href="/customer">Customers</a>
                </li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Gift Card</a>
                    <div class="dropdown-container {{ Request::is('addgift','listgift') ? "active-block" : "" }}">
                        <div class="{{ Request::is('addgift') ? "active-link" : "" }}">
                            <a class="dropdown-item " href="/addgift">Add Gift Card</a>
                        </div>
                        <div class="{{ Request::is('listgift') ? "active-link" : "" }}">
                            <a class="dropdown-item" href="/listgift">List Gift Card</a>
                        </div>
                    </div>
                </li>
                <li class="{{ Request::is('debit') ? "active-link" : "" }}"><a href="/debit">Debit</a></li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Sales</a>
                    <div class="dropdown-container {{ Request::is('todaysales','openedbil') ? "active-block" : "" }}">
                        <div class="{{ Request::is('todaysales') ? "active-link" : "" }}">
                            <a class="dropdown-item" href="/todaysales">Today's Sales</a>
                        </div>
                        <div class="{{ Request::is('openedbil') ? "active-link" : "" }}">
                            <a class="dropdown-item" href="/openedbil">Opened Bill</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Reports</a>
                    <div
                        class="dropdown-container {{ Request::is('salesreports','soldbyproduct') ? "active-block" : "" }}">
                        <div class="{{ Request::is('salesreports') ? "active-link" : "" }}">
                            <a class="dropdown-item" href="/salesreports" class="">Sales Report</a>
                        </div>
                        <div class="{{ Request::is('soldbyproduct') ? "active-link" : "" }}">
                            <a class="dropdown-item" href="/soldbyproduct">Sold By Product</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Expenses</a>
                    <div
                        class="dropdown-container {{ Request::is('expenses','expensescategory') ? "active-block" : "" }}">
                        <div class="{{ Request::is('expenses') ? "active-link" : "" }}">
                            <a class="dropdown-item" href="/expenses" class="">Expenses</a>
                        </div>
                        <div class="{{ Request::is('expensescategory') ? "active-link" : "" }}" id="excat">
                            <a class="dropdown-item" href="/expensescategory">Expenses Category</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown-class" id="pnl">
                    <a class="dropdown-btn">Profit & Loss</a>
                    <div class="dropdown-container {{ Request::is('','') ? "active-block" : "" }}">
                        <div>
                            <a class=" dropdown-item" href="/pnl" class="">Profit & Loss</a>
                        </div>
                        <div>
                            <a class="dropdown-item" href="/pnl/pnlReport">Profit & Loss Report</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="/pos">POS</a>
                </li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Return Order</a>
                    <div class="dropdown-container">
                        <div class="dropdown-item">
                            <a href="/returnorder/CreateReturn">Create Return Order</a>
                        </div>
                        <div class="dropdown-item">
                            <a href="/returnorder/ReportReturn">Return Order Report</a>
                        </div>
                    </div>
                </li>
                <li class="{{ Request::is('inventory') ? "active-link" : "" }}"><a href="/inventory">Inventory</a></li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Products</a>
                    <div
                        class="dropdown-container {{ Request::is('product/ListProduct','','product/ProductCategory') ? "active-block" : "" }}">
                        <div class="{{ Request::is('product/ListProduct') ? "active-link" : "" }}">
                            <a class="dropdown-item" href="/product/ListProduct">List Products</a>
                        </div>
                        <div class="{{ Request::is('') ? "active-link" : "" }}">
                            <a class="dropdown-item" href="#">Print Product Label</a>
                        </div>
                        <div class="{{ Request::is('product/ProductCategory') ? "active-link" : "" }}" id="prodcat">
                            <a class="dropdown-item" href="/product/ProductCategory">Product Category</a>
                        </div>
                    </div>
                </li>
                <li class="{{ Request::is('purchase_order') ? "active-link" : "" }}"><a href="/purchase_order">Purchase Order</a></li>
                <li class="dropdown-class">
                    <a class="dropdown-btn">Setting</a>
                    <div
                        class="dropdown-container {{ Request::is('setting/outlets','setting/users','setting/suppliers','setting/system_setting','setting/payment_method') ? "active-block" : "" }}">
                        <div  class="{{ Request::is('setting/outlets') ? "active-link" : "" }}">
                            <a class="dropdown-item" href="/setting/outlets" class="">Outlets</a>
                        </div>
                        <div class="{{ Request::is('setting/users') ? "active-link" : "" }}">
                            <a class="dropdown-item" href="/setting/users">User</a>
                        </div>
                        <div class="{{ Request::is('setting/suppliers') ? "active-link" : "" }}" id="supplier">
                            <a class="dropdown-item" href="/setting/suppliers">Supllier</a>
                        </div>
                        <div class="{{ Request::is('setting/system_setting') ? "active-link" : "" }}" id="system">
                            <a class="dropdown-item" href="/setting/system_setting">System Setting</a>
                        </div>
                        <div class="{{ Request::is('setting/payment_method') ? "active-link" : "" }}" id="payment">
                            <a class="dropdown-item" href="/setting/payment_method">Payment Methods</a>
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

<script>
$role = {{Session::get('role')}}
if($role == "1" ){
    document.getElementById("pnl").style.display = "none";
    document.getElementById("excat").style.display = "none";
    document.getElementById("prodcat").style.display = "none";
    document.getElementById("supplier").style.display = "none";
    document.getElementById("payment").style.display = "none";
    document.getElementById("system").style.display = "none";
}
if($role == "2"){
    document.getElementById("pnl").style.display = "none";
    document.getElementById("pnl").style.display = "none";
    document.getElementById("supplier").style.display = "none";
    document.getElementById("payment").style.display = "none";
    document.getElementById("system").style.display = "none";
    document.getElementById("prodcat").style.display = "none";
}
</script>