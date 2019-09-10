function addlist(i) {
    var length = $('[id^=' + i + '-row]').length
    lengthval = parseInt(length);
    if (lengthval > 0) {
        getdataplus(i)
    } else {
        var name = document.getElementById('' + i + '-name_product').innerHTML;
        var price = document.getElementById('' + i + '-price').innerHTML;

        var row = document.createElement('div');
        row.setAttribute('class', 'row a');
        row.setAttribute("style", "margin-right: 5px");
        row.setAttribute('id', '' + i + '-row');

        var div1 = document.createElement('div');
        div1.setAttribute("class", "col-md-3");
        var pnew = document.createElement('p');
        pnew.setAttribute('id', '' + i + '-namelist')
        var newname = document.createTextNode(name);
        pnew.appendChild(newname);
        div1.appendChild(pnew)

        var div2 = document.createElement('div');
        div2.setAttribute("class", "col-md-5");
        var row21 = document.createElement('div');
        row21.setAttribute("class", "row");
        div2.appendChild(row21);

        var div21 = document.createElement('div');
        div21.setAttribute("class", "col-md-3");
        row21.appendChild(div21);
        var plusicon = document.createElement('a');
        plusicon.setAttribute("class", "fa fa-plus-circle");
        div21.appendChild(plusicon)

        var div22 = document.createElement('div');
        div22.setAttribute("class", "col-md-6");
        row21.appendChild(div22);
        var newqty = document.createElement('input');
        newqty.setAttribute("type", "text");
        newqty.setAttribute("value", 1);
        newqty.setAttribute("class", "form-control");
        newqty.setAttribute("name", "qty[]");
        newqty.setAttribute('id', '' + i + '-qtylist');
        div22.appendChild(newqty)

        var div23 = document.createElement('div');
        div23.setAttribute("class", "col-md-3");
        row21.appendChild(div23);
        var minusicon = document.createElement('a');
        minusicon.setAttribute("class", "fa fa-minus-circle");
        minusicon.setAttribute('id', '' + i + '-minus');
        div23.appendChild(minusicon);

        var div3 = document.createElement('div');
        div3.setAttribute("class", "col-md-3");
        var pnew1 = document.createElement('p');
        var newprice = document.createTextNode(price);
        pnew1.appendChild(newprice);
        div3.appendChild(pnew1)

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
        document.getElementById('' + i + '-qtylist').value = qtystock;
    }
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
}
