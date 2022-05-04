<html>

<head>
    <meta charset="utf-8">
    <title>Payment Voucher</title>
    <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <style type="text/css" media="all">
        /* reset */







        /* heading */
        h1 {
            font: bold 100% sans-serif;
            letter-spacing: 0.5em;
            text-align: center;
            text-transform: uppercase;
        }

        /* table */
        table {
            font-size: 90%;
            table-layout: fixed;

        }

        table {
            border-collapse: separate;
            border-spacing: 0px;
        }

        th,
        td {

            padding: 0.5em;
            position: relative;
            text-align: left;
        }

        th,
        td {

            border-style: solid;
            border: 0.5px;
        }

        th {
            background: #EEE;
            font-weight: bold
        }

        td {}



        /* header */
        header {
            margin: 0 0 1em;
        }

        header:after {
            clear: both;
            content: "";
            display: table;
        }

        header h1 {



            margin: 0 0 1em;
            padding: 0.5em 0;
        }

        header address {
            float: left;
            font-size: 75%;
            font-style: normal;
            line-height: 1.25;
            margin: 0 1em 1em 0;
        }

        header addressq {
            margin: 0px 0em 0em -23px;
            display: flex;


        }

        header address p {
            margin: 0 0 0.25em;
        }


        header img {
            display: block;
            float: right;
        }



        header img {
            max-height: 100%;
            max-width: 100%;
        }

        header input {
            cursor: pointer;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        /* article */
        article,
        article address,
        table.meta,
        table.inventory {
            margin: 0 0 0.5em;
        }

        article:after {
            clear: both;
            content: "";
            display: table;
        }

        article h1 {
            clip: rect(0 0 0 0);
            position: absolute;
        }

        article address {
            float: left;
            font-size: 100%;

        }

        .bold_text {
            font-weight: bold;
        }

        /* table meta & balance */
        table.meta,
        table.balance {
            float: right;
            width: 50%;
        }

        table.meta:after,
        table.balance:after {
            clear: both;
            content: "";
            display: table;
        }

        /* table meta */
        table.meta th {
            width: 40%;
        }

        table.meta td {
            width: 60%;
        }

        /* table items */
        table.inventory {
            clear: both;
            width: 100%;
        }

        table.inventory th {
            border: 2px solid black;
            font-weight: bold;
            text-align: center;
        }
        table.inventory td {
            border: 2px solid black;
        }

        /* table balance */

        table.balance th,
        table.balance td {
            width: 50%;
             border: 2px solid black;
             text-align:center;
        }

        table.balance td {
            text-align: right;
            text-align:center;
        }

        /* aside */

        aside h1 {
            border: none;
            border-width: 0 0 1px;
            margin: 0 0 1em;
        }

        aside h1 {
            border-color: #000000;
            border-bottom-style: solid;
        }

        /* javascript */

        .add,
        .cut {
            border-width: 1px;
            display: block;
            font-size: .8rem;
            padding: 0.25em 0.5em;
            float: left;
            text-align: center;
            width: 0.6em;
        }

        .add,
        .cut {
            background: #9AF;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
            background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);

            border-color: #000000;
            color: #000000;
            cursor: pointer;
            font-weight: bold;
            text-shadow: 0 -1px 2px rgba(0, 0, 0, 0.333);
        }

        .add {
            margin: -2.5em 0 0;
        }

        .add:hover {
            background: #00ADEE;
        }

        .cut {
            opacity: 0;
            position: absolute;
            top: 0;
            left: -1.5em;
        }

        .cut {
            -webkit-transition: opacity 100ms ease-in;
        }

        /* tr:hover .cut {
        opacity: 1;
        } */

        @media print {
            * {
                -webkit-print-color-adjust: exact;
            }

            .pagebreak { page-break-after: always; } /* page-break-after works, as well */


            span:empty {
                display: none;
            }

            .add,
            .cut {
                display: none;
            }
             .donotprint{
                display:none;
            }

        }





        .row.downlo {
            margin: 0px 0px 0px 0px;
            background: whitesmoke;
            padding: 16px 0px 16px 0px;
            width: 100%;
            text-align: center;
        }

        /* th {
            background: #EEE;
            font-weight: bold;
            border: solid 1px black;
        } */
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--NEW STYLE-->
<style>

        /* Styles go here */

.page-header, .page-header-space {
  height: 25px;
}

.page-footer, .page-footer-space {
  height: 20px;

}

.page-footer {
  position: fixed;
  bottom: 0;
  width: 8.5in;


}

.page-header {
  position: fixed;
  top: 0mm;
  width: 8.5in;

 /* for demo */
}
.a4page {
    width: 8.5in;
    /* padding: 0.1cm; */
    margin: 0cm auto;
    background: white;
    font-family:arial;
    border: solid 1px black;

}
.page {
  page-break-after: always;
}
.row100{
    width:8.5in;
}

@page {

  margin-top: 0;
  margin-bottom: 0;
  margin-left: 10mm;
  margin-right: 10mm;

}

@media print {
   thead {display: table-header-group;}
   tfoot {display: table-footer-group;}

   button {display: none;}

   body {margin: 0 !important;}
}
    </style>
</head>

<!--NEW CONTENT-->

<body class="a4page" >

  <div class="page-header">
        <div class="row downlo donotprint">
            <div style="height: 150px">
                <button class="btn btn-success" style="border: 1px solid rgb(0, 0, 0);  text-decoration: none; font-weight: bold; border-radius: 3px; padding: 2px 6px;"  onclick="printMe()" id="print">Print</button>
            </div>
        </div>

    <br/>
  </div>

  <div class="page-footer">
  </div>

  <table id="content">

    <thead>
      <tr>
        <td>
          <!--place holder for the fixed-position header-->
          <div class="page-header-space"></div>
        </td>
      </tr>
    </thead>

    <tbody style="background:white;">
      <tr>
        {{-- SECTION ONE --}}
        <td >
            <!--*** CONTENT GOES HERE ***-->
            <div class="page " style="line-height: 1.3;">

                    <table style="width: 100%" class="table inventory">
                        <tr>
                            <td style=" !important; text-align:center;" colspan="2">
                                <span style="text-align:center; font-weight:bold; font-size:25px;">Receipt Voucher</span>
                            </td>
                        </tr>
                        <tr>
                            <td  style="border:none;" colspan="2"></td>
                        </tr>
                        <tr>
                            <td style="border: none !important;">
                                <!-- <span>Serial No: </span><span style="text-decoration: underline; text-align:right; ">{{@$quotations['date']}}</span><br> -->
                                <span>Ref: </span><span style="text-decoration: underline; text-align:right; ">{{@$pay->ref}}</span><br>
                                <span>Date: </span><span style="text-decoration: underline; text-align:right; ">{{@$pay->created_at->toDateString()}}</span><br>

                            </td>
                            <td style="border: none !important; text-align:right">
                                <span>Entry Date: </span><span style="text-decoration: underline; text-align:right; ">{{@$pay->created_at->toDateString()}}</span><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: none !important;">
                                <!-- <span>Serial No: </span><span style="text-decoration: underline; text-align:right; ">{{@$quotations['date']}}</span><br> -->
                                <span>Bank Code: </span><span style="text-decoration: underline; text-align:right; ">{{@$pay->bank->account_no}}</span><br>
                                <span>Bank Title: </span><span style="text-decoration: underline; text-align:right; ">{{@$pay->bank->bank_name}}</span><br>

                            </td>
                            <td style="border: none !important; text-align:right">
                                <span>Cheque Ref: </span><span style="text-decoration: underline; text-align:right; ">{{@$pay->cheque_ref}}</span><br>
                                <span>Cheque Date: </span><span style="text-decoration: underline; text-align:right; ">{{@$pay->cheque_date}}</span><br>
                            </td>
                        </tr>
                    </table>

                  <article>

                      <table class="inventory">
                          <thead>
                              <tr>
                                  <th style="width:20% !important"><span>Account Code</span></th>
                                  <th style="width:15% !important"><span>Title Account</span></th>
                                  <th style="width:45% !important"><span>Narration</span></th>
                                  <th style="width:10% !important"><span>Cost (Center)</span></th>
                                  <th style="width:15% !important"><span>Debit (PKR)</span></th>
                                  <th style="width:15% !important"><span>Credit (PKR)</span></th>
                              </tr>
                          </thead>
                          <tbody>
                                <tr>
                                  <td  style="text-align:center;">{{$pay->bank->account_no}}</td>
                                  <td  style="text-align:center;">{{$pay->bank->account_title}}</td>
                                  <td  style="text-align:center;"></td>
                                  <td  style="text-align:center;"></td>
                                  <td  style="text-align:center;">{{$pay->amount}}</td>
                                  <td  style="text-align:center;"></td>
                              </tr>
                              
                              <?php
                              $total_credit = $pay->amount;
                              ?>
                              @foreach($pay->taxes as $t)
                              <?php
                              $tax_amount = round(($pay->amount*$t->tax->percent)/100);
                              $total_credit += $tax_amount;
                              ?>
                              <tr>
                                  <td  style="text-align:center;">{{$pay->account->id+3}}</td>
                                  <td  style="text-align:center;">{{$t->tax->title." ".$t->tax->percent."%"}}</td>
                                  <td  style="text-align:center;">{{$pay->description != 0 ?$pay->description : ''}}</td>
                                  <td  style="text-align:center;"></td>
                                  <td  style="text-align:center;">{{$tax_amount}}</td>
                                  <td  style="text-align:center;"></td>
                              </tr>

                              @endforeach
                              <tr>
                                  <td  style="text-align:center;">{{$pay->account->id}}</td>
                                  <td  style="text-align:center;">{{$pay->account->name}}</td>
                                  <td  style="text-align:center;">{{$pay->description != 0 ?$pay->description : ''}}</td>
                                  <td  style="text-align:center;"></td>
                                  <td  style="text-align:center;"></td>
                                  <td  style="text-align:center;">{{$total_credit}}</td>
                              </tr>

                              <tr style="margin-top:15px">
                                  <td  style="text-align:center;"></td>
                                  <td  style="text-align:center;"></td>
                                  <td  style="text-align:center;">Total</td>
                                  <td  style="text-align:center;"></td>
                                  <td  style="text-align:center;">{{$total_credit}}</td>
                                  <td  style="text-align:center;">{{$total_credit}}</td>
                              </tr>
                          </tbody>
                          <?php
                          ?>
                      </table>
                      

                  </article>

                  <article>
                  <table class="inventory">
                          <tbody>
                              <tr>
                                  <td  style="text-align:center; padding: 5px;">{{$pay->account->id}}</td>
                                  <td  style="text-align:center;width:70%">{{amountInWords($total_credit)}}</td>
                                  <td  style="text-align:center;">{{$total_credit}}</td>
                              </tr>
                             
                          </tbody>
                          <?php
                          ?>
                      </table>
                  </article>

              <!---->

            </div>
          </td>

          {{-- END SECTION ONE --}}
          {{-- SECTION TWO --}}

      </tr>
    </tbody>

    <tfoot>
      <tr>
        <td>
          <!--place holder for the fixed-position footer-->
          <div class="page-footer-space" style="margin-top:60px">
              <div style="text-align:center">
                    <span style="border-top:1px solid black;padding:20px 30px; margin-left:15px">
                            Presented By
                    </span>  
                    <span style="border-top:1px solid black;padding:20px 30px; margin-left:30px">
                            Checked By
                    </span>  
                    <span style="border-top:1px solid black;padding:20px 30px; margin-left:30px">
                            Approved By
                    </span>  
                    <span style="border-top:1px solid black;padding:20px 30px; margin-left:30px">
                            Received By
                    </span>  

              </div>
          </div>
        </td>
      </tr>
    </tfoot>

  </table>

</body>


<!--END NEW CONTENT-->

<script type="text/php">

    if ( isset($pdf) ) {

  $font = Font_Metrics::get_font("helvetica");;

  $size = 8;



  $text_height = Font_Metrics::get_font_height($font, $size);

  $foot = $pdf->open_object();



  $w = $pdf->get_width();

  $h = $pdf->get_height();



  $y = $h - $text_height - 20;



  $pdf->close_object();

  $pdf->add_object($foot, "all");



  $color = array(0,100,0);

  $text = "Footer text is here XXXXXXXXXX";

  $pdf->page_text(30, $y, $text, $font, $size, $color);

  $text2 = " {PAGE_NUM} of {PAGE_COUNT}";

  $pdf->page_text(560, $y, $text2, $font, $size, $color);

}

</script>

<script>
    /* Shivving (IE8 is not supported, but at least it won't look as awful)
/* ========================================================================== */

function printMe(){
    window.print();
}
    (function(document) {
        var
            head = document.head = document.getElementsByTagName('head')[0] || document.documentElement,
            elements = 'article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output picture progress section summary time video x'.split(' '),
            elementsLength = elements.length,
            elementsIndex = 0,
            element;

        while (elementsIndex < elementsLength) {
            element = document.createElement(elements[++elementsIndex]);
        }

        element.innerHTML = 'x<style>' +
            'article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}' +
            'audio[controls],canvas,video{display:inline-block}' +
            '[hidden],audio{display:none}' +
            'mark{background:#000000;color:#000000}' +
            '</style>';

        return head.insertBefore(element.lastChild, head.firstChild);
    })(document);

    /* Prototyping
    /* ========================================================================== */
// ===================================================================================
    (function(window, ElementPrototype, ArrayPrototype, polyfill) {
        function NodeList() {
            [polyfill]
        }
        NodeList.prototype.length = ArrayPrototype.length;

        ElementPrototype.matchesSelector = ElementPrototype.matchesSelector ||
            ElementPrototype.mozMatchesSelector ||
            ElementPrototype.msMatchesSelector ||
            ElementPrototype.oMatchesSelector ||
            ElementPrototype.webkitMatchesSelector ||
            function matchesSelector(selector) {
                return ArrayPrototype.indexOf.call(this.parentNode.querySelectorAll(selector), this) > -1;
            };

        ElementPrototype.ancestorQuerySelectorAll = ElementPrototype.ancestorQuerySelectorAll ||
            ElementPrototype.mozAncestorQuerySelectorAll ||
            ElementPrototype.msAncestorQuerySelectorAll ||
            ElementPrototype.oAncestorQuerySelectorAll ||
            ElementPrototype.webkitAncestorQuerySelectorAll ||
            function ancestorQuerySelectorAll(selector) {
                for (var cite = this, newNodeList = new NodeList; cite = cite.parentElement;) {
                    if (cite.matchesSelector(selector)) ArrayPrototype.push.call(newNodeList, cite);
                }

                return newNodeList;
            };

        ElementPrototype.ancestorQuerySelector = ElementPrototype.ancestorQuerySelector ||
            ElementPrototype.mozAncestorQuerySelector ||
            ElementPrototype.msAncestorQuerySelector ||
            ElementPrototype.oAncestorQuerySelector ||
            ElementPrototype.webkitAncestorQuerySelector ||
            function ancestorQuerySelector(selector) {
                return this.ancestorQuerySelectorAll(selector)[0] || null;
            };
    })(this, Element.prototype, Array.prototype);

    /* Helper Functions
    /* ========================================================================== */


    $(document).ready(function() {
        $('#print').click(function() {
            console.log("123")
            window.print();
        })
    });
    document.getElementById("print").click(()=>{
        console.log("123")
        window.print();
    })



    function generateTableRow() {
        var emptyColumn = document.createElement('tr');

        emptyColumn.innerHTML = '<td><a class="cut">-</a><span contenteditable></span></td>' +
            '<td><span contenteditable></span></td>' +
            '<td><span data-prefix>$</span><span contenteditable>0.00</span></td>' +
            '<td><span contenteditable>0</span></td>' +
            '<td><span data-prefix>$</span><span>0.00</span></td>';

        return emptyColumn;
    }

    function parseFloatHTML(element) {
        return parseFloat(element.innerHTML.replace(/[^\d\.\-]+/g, '')) || 0;
    }

    function parsePrice(number) {
        return number.toFixed(2).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1,');
    }

    /* Update Number
    /* ========================================================================== */

    function updateNumber(e) {
        var
            activeElement = document.activeElement,
            value = parseFloat(activeElement.innerHTML),
            wasPrice = activeElement.innerHTML == parsePrice(parseFloatHTML(activeElement));

        if (!isNaN(value) && (e.keyCode == 38 || e.keyCode == 40 || e.wheelDeltaY)) {
            e.preventDefault();

            value += e.keyCode == 38 ? 1 : e.keyCode == 40 ? -1 : Math.round(e.wheelDelta * 0.025);
            value = Math.max(value, 0);

            activeElement.innerHTML = wasPrice ? parsePrice(value) : value;
        }

        updateInvoice();
    }

    /* Update Invoice
    /* ========================================================================== */

    function updateInvoice() {
        var total = 0;
        var cells, price, total, a, i;

        // update inventory cells
        // ======================

        for (var a = document.querySelectorAll('table.inventory tbody tr'), i = 0; a[i]; ++i) {
            // get inventory row cells
            cells = a[i].querySelectorAll('span:last-child');

            // set price as cell[2] * cell[3]
            price = parseFloatHTML(cells[2]) * parseFloatHTML(cells[3]);

            // add price to total
            total += price;

            // set row total
            cells[4].innerHTML = price;
        }

        // update balance cells
        // ====================

        // get balance cells
        cells = document.querySelectorAll('table.balance td:last-child span:last-child');

        // set total
        cells[0].innerHTML = total;

        // set balance and meta balance
        cells[2].innerHTML = document.querySelector('table.meta tr:last-child td:last-child span:last-child').innerHTML = parsePrice(total - parseFloatHTML(cells[1]));

        // update prefix formatting
        // ========================

        var prefix = document.querySelector('#prefix').innerHTML;
        for (a = document.querySelectorAll('[data-prefix]'), i = 0; a[i]; ++i) a[i].innerHTML = prefix;

        // update price formatting
        // =======================

        for (a = document.querySelectorAll('span[data-prefix] + span'), i = 0; a[i]; ++i)
            if (document.activeElement != a[i]) a[i].innerHTML = parsePrice(parseFloatHTML(a[i]));
    }

    /* On Content Load
    /* ========================================================================== */

   </script>
</html>
