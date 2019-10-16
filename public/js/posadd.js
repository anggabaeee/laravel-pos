function addlist(i) {
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
            pnew.setAttribute('id', 'namelist')
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
    var codebarang = document.getElementById('' + i + '-codelist').innerHTML;

    if (nilaiqty > nilaiqtystock) {
        alert('Kode Barang ' + codebarang + ' Melebihi batas stok. Stok kurang dari ' + nilaiqty + '');
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
    var payment_method = document.getElementById('payment_method').value;
    if (payment_method == 6){
        document.getElementById('return_change').innerHTML = 0.00;
        document.getElementById('returninput').value = 0.00;
        if(parseFloat(val) >= totalAmount){
            document.getElementById('ajaxsubmit').hidden = true;
        }
        else{
            document.getElementById('ajaxsubmit').hidden = false;
        }
    }
    else{
        if (ret == "") {
            document.getElementById('return_change').innerHTML = 0.00;
            document.getElementById('returninput').value = 0.00;
        } else {
            var returnchange = parseFloat(val) - parseFloat(totalAmount);
            document.getElementById('return_change').innerHTML = parseFloat(returnchange).toFixed(2);
            document.getElementById('returninput').value = parseFloat(returnchange).toFixed(2);
            if (returnchange >= 0) {
                document.getElementById('ajaxsubmit').hidden = false;
            } else {
                document.getElementById('ajaxsubmit').hidden = true;
            }
        }
    }
}

function addfromhold(i) {
    $.ajax({
        url: '/getHold',
        type: 'get',
        data: {
            suspend_id: i
        },
        success: function (data) {
            $('#isitable').empty();
            $.each(data, function (i, value) {
                $('#myModal2').modal('hide');
                var msg = '<div class="row row_list" name="row_list" style="margin-right: 5px" id="' + value.id_product + '-row"><div class="col-md-3"><input type="hidden" value=' + value.suspend_id + ' name="suspend_id" id="suspend_id"><label id="namelist"> Contoh 1</label><br><label id="' + value.id_product + '-codelist">' + value.product_code + '</label><input value="' + value.product_name + '" name="name[]" type="hidden"><input value="' + value.product_code + '" name="code[]" type="hidden"></div><div class="col-md-5"><div class="row"><div class="col-md-3" style="padding-right: 0"><a onclick="getdatamin(' + value.id_product + ')" class="fa fa-minus-circle" style="margin-top: 11px;"></a></div><div class="col-md-6" style="padding-right: 0; padding-left: 0;"><input onchange="changeqty(' + value.id_product + ')" type="text" value="' + value.qty + '" class="form-control" name="qty[]" id="' + value.id_product + '-qtylist"></div><div class="col-md-3" style="padding-left: 0;"><a onclick="getdataplus(' + value.id_product + ')" class="fa fa-plus-circle" style="margin-top: 11px"></a></div></div></div><div class="col-md-3"><label name="pricelist[]">' + value.price + '</label><input value="' + value.price + '" name="price[]" type="hidden"><input value="' + value.cost + '" name="cost[]" type="hidden"></div><div class="col-md-1"><a onclick="dataremove(' + value.id_product + ')" class="fa fa-close"></a></div><input value="' + value.id_susp + '" name="id_susp" id="id_susp" type="hidden"><input value="' + value.customer_name + '" name="customer_name" id="customer_name" type="hidden"></div>'
                $('#isitable').append(msg);
                $('#discount').val(value.discount_total);
                total();
                changeqty(value.id_product);
            });
        }
    });
}

function paymentchange() {
    var selected = $('#payment_method').val();
    if (selected == 3 || selected == 4) {
        $('#cardnumber').show();
        $('#chequenumber').hide();
        $('#giftcard').hide();
        $('input[name="cardnumber"]').attr('required', true);
    } else if (selected == 5) {
        $('#giftcard').hide();
        $('#cardnumber').hide();
        $('#chequenumber').show();
        $('input[name="chequenumber"]').attr('required', true);
    } else if (selected == 7) {
        $('#cardnumber').hide();
        $('#chequenumber').hide();
        $('#giftcard').show();
        $('input[name="giftcard"]').attr('required', true);
    } else {
        $('#chequenumber').hide();
        $('#cardnumber').hide();
        $('#giftcard').hide();
        $('input[name="giftcard"]').removeAttr('required');
        $('input[name="chequenumber"]').removeAttr('required');
        $('input[name="cardnumber"]').removeAttr('required');
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
            paymentchange();
            var totalAmount = document.getElementById('grandtotal').innerHTML;
            var totalItems = document.getElementById('totalqty').innerHTML;
            document.getElementById('total_amount').innerHTML = totalAmount;
            document.getElementById('total_items').innerHTML = totalItems;
            document.getElementById('ttl_amount').value = totalAmount;
            document.getElementById('ttl_item').value = totalItems;
            var paid = document.getElementById('paidamount').value;
            var payment_method = document.getElementById('payment_method').value;

            if(payment_method == 6){
                document.getElementById('return_change').innerHTML = 0.00;
                document.getElementById('returninput').value = 0.00;
                if(parseFloat(val) >= totalAmount){
                    document.getElementById('ajaxsubmit').hidden = true;
                }
                else{
                    document.getElementById('ajaxsubmit').hidden = false;
                }
            }
            else{
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
        } 
        $.ajax({
            url: '/load',
            type: 'get',
            complete: function (xhr) {
                // datanerespon
                var data = JSON.parse(xhr.responseText);
                // Loopinge bos
                $('#customerpayment').empty();
                data.forEach(function (post) {
                    $("#customerpayment").append(`<option value='` + post.id +
                        `'>` + post.fullname + `</option>`);
                });
            }
        });
        $("#payment_method").change(function () {
            var selected = $("#payment_method").children("option:selected").val();
            if (selected == 3 || selected == 4) {
                $('#cardnumber').show();
                $('#chequenumber').hide();
                $('#giftcard').hide();
                $('input[name="cardnumber"]').attr('required', true);
            } else if (selected == 5) {
                $('#giftcard').hide();
                $('#cardnumber').hide();
                $('#chequenumber').show();
                $('input[name="chequenumber"]').attr('required', true);
            } else if (selected == 7) {
                $('#cardnumber').hide();
                $('#chequenumber').hide();
                $('#giftcard').show();
                $('input[name="giftcard"]').attr('required', true);
            } else {
                $('#chequenumber').hide();
                $('#cardnumber').hide();
                $('#giftcard').hide();
                $('input[name="giftcard"]').removeAttr('required');
                $('input[name="chequenumber"]').removeAttr('required');
                $('input[name="cardnumber"]').removeAttr('required');
            }
            if(selected == 6){
                document.getElementById('ajaxsubmit').hidden = false;
            }
            else{
                document.getElementById('ajaxsubmit').hidden = true;
            }
        });
    });
    $("#myBtn4").click(function () {
        $("#myModal4").modal();
    });
    $("#myBtn1").click(function () {
        $("#myModal1").modal('show');
        var outlets = $('#outlet_id').val();
        $.ajax({
            url: '/todaysale',
            type: 'get',
            data: {
                outlets: outlets
            },
            success: function (data) {
                $.each(data, function (i, value) {
                    if (value.cash == null) {
                        value.cash = "0.00";
                    }
                    if (value.master_card == null) {
                        value.master_card = "0.00";
                    }
                    if (value.nett == null) {
                        value.nett = "0.00";
                    }
                    if (value.visa == null) {
                        value.visa = "0.00";
                    }
                    if (value.cheque == null) {
                        value.cheque = "0.00";
                    }
                    $('#divcash').empty();
                    $('#divnett').empty();
                    $('#divvisa').empty();
                    $('#divmaster').empty();
                    $('#divcheq').empty();
                    $('#divcash').append($("<label/>", {
                        text: value.cash
                    })).append($);
                    $('#divnett').append($("<label/>", {
                        text: value.nett
                    })).append($);
                    $('#divvisa').append($("<label/>", {
                        text: value.visa
                    })).append($);
                    $('#divmaster').append($("<label/>", {
                        text: value.master_card
                    })).append($);
                    $('#divcheq').append($("<label/>", {
                        text: value.cheque
                    })).append($);

                });
            }
        });
    });
    $("#myBtn3").click(function () {
        $("#myModal3").modal('show');
        $.get('/getcustomer', function (data) {
            $('#customeroption').empty();
            $.each(data, function (i, value) {
                $('#customeroption').append($("<option/>", {
                    text: value.fullname,
                    value: value.id
                })).append($);

            });
        })
    });
    $('#saveBill').click(function () {
        var code = $('input[name="code[]"]').map(function (idx, elem) {
            return $(elem).val();
        }).get();
        var name = $('input[name="name[]"]').map(function (idx, elem) {
            return $(elem).val();
        }).get();
        var qty = $('input[name="qty[]"]').map(function (idx, elem) {
            return $(elem).val();
        }).get();
        var cost = $('input[name="cost[]"]').map(function (idx, elem) {
            return $(elem).val();
        }).get();
        var price = $('input[name="price[]"]').map(function (idx, elem) {
            return $(elem).val();
        }).get();
        var totalitem = $('#totalqty').html();
        var subtotal = $('#total').html();
        var taxvalue = $('#taxvalue').val();
        var grandtotal = $('#grandtotal').html();
        var discount = $('#discount').val();
        var customer_id = $('#customeroption').val();
        var outlet_id = $('#outlet_id').val();
        var ref_number = $('#ref_number').val();
        var row_length = $('input[name="row_length"]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/addBill',
            type: 'post',
            dataType: 'json',
            data: {
                code: code,
                name: name,
                qty: qty,
                cost: cost,
                price: price,
                totalitem: totalitem,
                subtotal: subtotal,
                taxvalue: taxvalue,
                grandtotal: grandtotal,
                discount: discount,
                customer_id: customer_id,
                outlet_id: outlet_id,
                ref_number: ref_number,
                row_length: row_length,
            },
            complete: function () {
                $('#myModal3').modal('hide');
                $('#isitable').empty();
                total();
                window.scrollTo(0, 0);
                $('#notif').css('display', 'block').fadeOut(4000);
                $('#discount').val('');
                $('#ref_number').val('');
            },
        });
    });
    $('#myBtn2').click(function () {
        $("#myModal2").modal('show');
        var outlets = $('#outlet_id').val();
        $.ajax({
            url: '/openedHold',
            type: 'get',
            data: {
                outlets: outlets
            },
            success: function (data) {
                console.log(data)
                $('#isihold').empty();
                $.each(data, function (i, value) {
                    var msg = '<div id="holddata" class="col-md-5">  <a onclick="addfromhold(' + value.id + ')"><b>Ref. Number</b> : ' + value.ref_number + ' <br><b>Customer Name </b> : ' + value.customer_name + '<br><b>Date </b> : ' + value.created_at + '<br><b>Qty</b> : ' + value.total_items + '<br><b>Total </b> : ' + value.grandtotal + ' <input type="hidden" value="' + value.id + '" name="id_suspend" id="id_suspend"></a></div>'
                    $('#isihold').append(msg);
                });
            }
        });
    })
    $('#searchold').keyup(function () {
        var outlets = $('#outlet_id').val();
        var ref_number = $(this).val();
        if (ref_number == null) {
            $.ajax({
                url: '/openedHold',
                type: 'get',
                data: {
                    outlets: outlets
                },
                success: function (data) {
                    console.log(data)
                    $('#isihold').empty();
                    $.each(data, function (i, value) {
                        var msg = '<div id="holddata" class="col-md-5">  <a onclick="addfromhold(' + value.id + ')"><b>Ref. Number</b> : ' + value.ref_number + ' <br><b>Customer Name </b> : ' + value.customer_name + '<br><b>Date </b> : ' + value.created_at + '<br><b>Qty</b> : ' + value.total_items + '<br><b>Total </b> : ' + value.grandtotal + ' <input type="hidden" value="' + value.id + '" name="id_suspend" id="id_suspend"></a></div>'
                        $('#isihold').append(msg);
                    });
                }
            });
        } else {
            $.ajax({
                url: '/searchHold',
                type: 'get',
                data: {
                    outlets: outlets,
                    ref_number: ref_number
                },
                success: function (data) {
                    console.log(data)
                    $('#isihold').empty();
                    $.each(data, function (i, value) {
                        var msg = '<div id="holddata" class="col-md-5">  <a onclick="addfromhold(' + value.id + ')"><b>Ref. Number</b> : ' + value.ref_number + ' <br><b>Customer Name </b> : ' + value.customer_name + '<br><b>Date </b> : ' + value.created_at + '<br><b>Qty</b> : ' + value.total_items + '<br><b>Total </b> : ' + value.grandtotal + ' <input type="hidden" value="' + value.id + '" name="id_suspend" id="id_suspend"></a></div>'
                        $('#isihold').append(msg);
                    });
                }
            });
        }
    });
});
