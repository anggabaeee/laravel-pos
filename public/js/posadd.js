function addlist(i) {
    jQuery.noConflict();
    var invqty = document.getElementById('' + i + '-qty').innerHTML;
    if (invqty == 0) {
        $('#myModal7').modal('show');
    } else {
        var length = $('[id^=' + i + '-row]').length
        lengthval = parseInt(length);
        if (lengthval > 0) {
            getdataplus(i)
        } else {
            var name = document.getElementById('' + i + '-name_product').innerHTML;
            var price = document.getElementById('' + i + '-price').innerHTML;
            var code = document.getElementById('' + i + '-code').innerHTML;
            var cost = document.getElementById('' + i + '-cost').innerHTML

            var row = document.createElement('div');
            row.setAttribute('class', 'row row_list');
            row.setAttribute('name', 'row_list');
            row.setAttribute("style", "margin-right: 5px");
            row.setAttribute('id', '' + i + '-row');

            var div1 = document.createElement('div');
            div1.setAttribute("class", "col-md-3");
            var pnew = document.createElement('label');
            pnew.setAttribute('id', '' + i + '-namelist')
            var newname = document.createTextNode(name);
            pnew.appendChild(newname);
            var iname = document.createElement('input')
            iname.setAttribute("value", name)
            iname.setAttribute("name", "name[]")
            iname.setAttribute('type', 'hidden')
            var pcode = document.createElement('label');
            pcode.setAttribute('id', '' + i + '-codelist');
            var codenew = document.createTextNode(code);
            pcode.appendChild(codenew);
            var icode = document.createElement('input')
            icode.setAttribute('value', code)
            icode.setAttribute('name', 'code[]')
            icode.setAttribute('type', 'hidden')
            var br = document.createElement('br')
            div1.appendChild(pnew)
            div1.appendChild(br)
            div1.appendChild(pcode)
            div1.appendChild(iname)
            div1.appendChild(icode)

            var div2 = document.createElement('div');
            div2.setAttribute("class", "col-md-5");
            var row21 = document.createElement('div');
            row21.setAttribute("class", "row");
            div2.appendChild(row21);

            var div23 = document.createElement('div');
            div23.setAttribute("class", "col-md-3");
            div23.setAttribute("style", "padding-right: 0");
            row21.appendChild(div23);
            var minusicon = document.createElement('a');
            minusicon.setAttribute("class", "fa fa-minus-circle");
            minusicon.setAttribute("style", "margin-top: 11px;");
            div23.appendChild(minusicon);

            var div22 = document.createElement('div');
            div22.setAttribute("class", "col-md-6");
            div22.setAttribute("style", "padding-right: 0; padding-left: 0;");
            row21.appendChild(div22);
            var newqty = document.createElement('input');
            newqty.setAttribute("type", "text");
            newqty.setAttribute("value", 1);
            newqty.setAttribute("class", "form-control");
            newqty.setAttribute("name", "qty[]");
            newqty.setAttribute('id', '' + i + '-qtylist');
            div22.appendChild(newqty)

            var div21 = document.createElement('div');
            div21.setAttribute("class", "col-md-3");
            div21.setAttribute("style", "padding-left: 0;");
            row21.appendChild(div21);
            var plusicon = document.createElement('a');
            plusicon.setAttribute("class", "fa fa-plus-circle");
            plusicon.setAttribute("style", "margin-top: 11px");
            div21.appendChild(plusicon)

            var div3 = document.createElement('div');
            div3.setAttribute("class", "col-md-3");
            var pnew1 = document.createElement('label');
            pnew1.setAttribute('name', 'pricelist[]');
            var newprice = document.createTextNode(price);
            pnew1.appendChild(newprice);
            var iprice = document.createElement('input')
            iprice.setAttribute('value', price)
            iprice.setAttribute("name", "price[]")
            iprice.setAttribute('type', 'hidden')
            var icost = document.createElement('input')
            icost.setAttribute('value', cost)
            icost.setAttribute('name', 'cost[]')
            icost.setAttribute('type', 'hidden')
            div3.appendChild(pnew1)
            div3.appendChild(iprice)
            div3.appendChild(icost)

            var div4 = document.createElement('div');
            div4.setAttribute("class", "col-md-1")
            var closeicon = document.createElement('a');
            closeicon.setAttribute("class", "fa fa-close");
            div4.appendChild(closeicon)

            row.appendChild(div1);
            row.appendChild(div2);
            row.appendChild(div3);
            row.appendChild(div4);
            document.getElementById('isitable').appendChild(row);
            total();
        }
        minusicon.onclick = function () {
            getdatamin(i)
        }
        plusicon.onclick = function () {
            getdataplus(i)
        }
        newqty.onchange = function () {
            changeqty(i)
        }
        closeicon.onclick = function () {
            dataremove(i)
        }
    }
}

function getdatamin(i) {
    var valueqty = document.getElementById('' + i + '-qtylist').value;
    nilaiqty = parseInt(valueqty);
    var a = nilaiqty - 1;
    document.getElementById('' + i + '-qtylist').value = a;

    if (valueqty == "1") {
        alert("tidak boleh kurang dari 1");
        document.getElementById('' + i + '-qtylist').value = "1";
    }
    total();
}

function getdataplus(i) {
    var valueqty = document.getElementById('' + i + '-qtylist').value;
    nilaiqty = parseInt(valueqty);
    var qtystock = document.getElementById('' + i + '-qty').innerHTML;
    nilaiqtystock = parseInt(qtystock);
    var a = nilaiqty + 1;
    document.getElementById('' + i + '-qtylist').value = a;

    if (nilaiqty == nilaiqtystock) {
        alert("Melebihi batas stok");
        document.getElementById('' + i + '-qtylist').value = nilaiqtystock;
    }
    total();
}

function changeqty(i) {
    var valueqty = document.getElementById('' + i + '-qtylist').value;
    nilaiqty = parseInt(valueqty);
    var qtystock = document.getElementById('' + i + '-qty').innerHTML;
    nilaiqtystock = parseInt(qtystock);

    if (nilaiqty > nilaiqtystock) {
        alert("Melebihi batas stok");
        document.getElementById('' + i + '-qtylist').value = qtystock;
    }

    if (valueqty < 1) {
        alert("tidak boleh kurang dari 1");
        document.getElementById('' + i + '-qtylist').value = "1";
    }
    total();
}

function dataremove(i) {
    document.getElementById('' + i + '-row').remove();
    total();
}

function total() {
    var length = document.getElementsByName('row_list').length
    lengthval = parseInt(length);
    document.getElementById('row_length').value = lengthval;
    var arr = document.getElementsByName('pricelist[]');
    var arrqty = document.getElementsByName('qty[]');
    var tax = document.getElementById('tax').value;
    var dis = document.getElementById('discount').value;
    var tot = 0;
    var totqty = 0;
    if (dis == "") {
        dis = 0;
    }
    for (var i = 0; i < arr.length; i++) {
        if (parseFloat(arr[i].innerHTML))
            if (parseInt(arrqty[i].value))
                tot += (parseFloat(arr[i].innerHTML) * parseInt(arrqty[i].value));
        totqty += parseInt(arrqty[i].value);
    }
    dis = parseFloat(dis);
    var total = tot - dis;
    var taxval = (total * parseInt(tax)) / 100;
    var grandtot = total + taxval
    document.getElementById('total').innerHTML = parseFloat(total).toFixed(2);
    document.getElementById('totalinput').value = parseFloat(total).toFixed(2);
    document.getElementById('taxval').innerHTML = parseFloat(taxval).toFixed(2);
    document.getElementById('taxvalue').value = parseFloat(taxval).toFixed(2);
    document.getElementById('totalqty').innerHTML = totqty;
    document.getElementById('grandtotal').innerHTML = parseFloat(grandtot).toFixed(2);
}

function disc(val) {
    var arr = document.getElementsByName('price[]');
    var arrqty = document.getElementsByName('qty[]');
    var tax = document.getElementById('tax').value;
    var tot = 0;
    var totqty = 0;
    if (val == 0) {
        for (var i = 0; i < arr.length; i++) {
            if (parseFloat(arr[i].value))
                if (parseInt(arrqty[i].value))
                    tot += (parseFloat(arr[i].value) * parseInt(arrqty[i].value));
            totqty += parseInt(arrqty[i].value);
        }
        var taxval = (tot * parseInt(tax)) / 100;
        var grandtot = tot + taxval;
        document.getElementById('total').innerHTML = parseFloat(tot).toFixed(2);
        document.getElementById('totalinput').value = parseFloat(tot).toFixed(2);
        document.getElementById('totalqty').innerHTML = totqty;
        document.getElementById('taxval').innerHTML = parseFloat(taxval).toFixed(2);
        document.getElementById('taxvalue').value = parseFloat(taxval).toFixed(2);
        document.getElementById('grandtotal').innerHTML = parseFloat(grandtot).toFixed(2);
    } else {
        for (var i = 0; i < arr.length; i++) {
            if (parseFloat(arr[i].value))
                if (parseInt(arrqty[i].value))
                    tot += (parseFloat(arr[i].value) * parseInt(arrqty[i].value));
            totqty += parseInt(arrqty[i].value);
        }
        if (val > (tot - 1)) {
            alert("discount Discount Amount must to less than Payable Amount!");
            document.getElementById('discount').value = "";
            val = 0;
        }
        var total = tot - val;
        var taxval = (total * parseInt(tax)) / 100;
        var grandtot = total + taxval
        document.getElementById('total').innerHTML = parseFloat(total).toFixed(2);
        document.getElementById('totalinput').value = parseFloat(total).toFixed(2);
        document.getElementById('totalqty').innerHTML = totqty;
        document.getElementById('taxval').innerHTML = parseFloat(taxval).toFixed(2);
        document.getElementById('taxvalue').value = parseFloat(taxval).toFixed(2);
        document.getElementById('grandtotal').innerHTML = parseFloat(grandtot).toFixed(2);
    }
}

function PaidAmount(val) {
    var totalAmount = document.getElementById('total_amount').innerHTML;
    var ret = document.getElementById('paidamount').value;
    if (ret == "") {
        document.getElementById('return_change').innerHTML = 0.00;
        document.getElementById('returninput').value = 0.00;
    } else {
        var returnchange = parseFloat(val) - parseFloat(totalAmount);
        document.getElementById('return_change').innerHTML = returnchange;
        document.getElementById('returninput').value = returnchange;
        if (returnchange > -1) {
            document.getElementById('ajaxsubmit').hidden = false;
        } else {
            document.getElementById('ajaxsubmit').hidden = true;
        }
    }
}

$(document).ready(function () {
    jQuery.noConflict();
    $("#mybtncancel").click(function () {
        $("#isitable").empty();
        total();
    });
    $("#myBtn5").click(function () {
        row_length = document.getElementById('row_length').value;
        if (row_length < 1) {
            $('#myModal8').modal('show');
        } else {
            $('#Modal5').modal('show');
            $('#form_output').html('');
            var totalAmount = document.getElementById('grandtotal').innerHTML;
            var totalItems = document.getElementById('totalqty').innerHTML;
            document.getElementById('total_amount').innerHTML = totalAmount;
            document.getElementById('total_items').innerHTML = totalItems;
            document.getElementById('ttl_amount').value = totalAmount;
            document.getElementById('ttl_item').value = totalItems;

            var paid = document.getElementById('paidamount').value;
            if (paid == "") {
                paid = 0.00;
            } else {
                var returnchange = parseFloat(paid) - parseFloat(totalAmount);
                document.getElementById('return_change').innerHTML = returnchange;
                document.getElementById('returninput').value = returnchange;
                if (returnchange < 0) {
                    document.getElementById('ajaxsubmit').hidden = true
                } else {
                    document.getElementById('ajaxsubmit').hidden = false
                }
            }
        }
    });
    $("#myBtn4").click(function () {
        $("#myModal4").modal();
    });
});

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
