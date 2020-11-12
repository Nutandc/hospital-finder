<script>
            @if($allTaxes?? null)
    var taxes = $.parseJSON('{!!  $allTaxes??'{}'  !!}');
            @endif
            @if($page ??null)
            @php($colSpan = (($page ?? 'default') == 'invoice' ? 4:3))
            @php($colSpan = (($page == "credit-note" ? 5:4)))
            @php($colSpan = $colSpan + ($taxInclusive?1:0))
    var CalculateAmount = {
            init: function () {
                this.calculateAmount();
            },
            calculateAmount: function () {
                $(document).on('change', '.warehouse_quantity_value', function () {
                    var warehouseQuantityTd = $(this).closest('td');
                    var warehouseQuantityValues = warehouseQuantityTd.find('.warehouse_quantity_value');
                    var quantity = 0;
                    warehouseQuantityValues.each(function () {
                        quantity = quantity + parseFloat($(this).val());
                    });
                    warehouseQuantityTd.find('.quantity').val(quantity);
                    warehouseQuantityTd.find('.quantity').trigger('change');
                });
                $(document).on('change', '.quantity', function (e) {
                    var row = $(this).closest('.recordset');
                    var quantityValue = this.value;
                    var priceValue = row.find('.price').val();
                    var taxId = row.find('.tax_id').val();
                    priceValue = isNaN(priceValue) ? 0 : priceValue;
                    @if($taxInclusive)
                    if (taxId)
                        priceValue = priceValue - calculateInclusiveTaxBeforeDiscount(row, taxId, priceValue);

                    @endif
                    row.find('.net_price').val(Number(priceValue).toFixed(2));
                    //calculate Amount
                    var amountValue = priceValue * quantityValue;
                    amountValue = isNaN(amountValue) ? 0 : amountValue;
                    row.find('.amount').val(amountValue.toFixed(2));

                    //calculate
                    var discountType = row.find('.product_discount_type').val();
                    var discount = row.find('.product_discount').val();
                    var discountAmount = calculateDiscount(amountValue, (discount ? discount : 0), discountType);
                    row.find('.discount_amount').val(discountAmount);

                    //calculate Tax
                    var taxAmount = 0;
                    if (taxId) {
                        taxAmount = getTotalTaxAmount(row, taxId, amountValue, discountAmount);
                        row.find('.taxable_amount').val(amountValue - (discountAmount ? discountAmount : 0));
                    } else {
                        row.find('.product_tax').removeData('tax-value');
                        row.find('.taxable_amount').val(0);
                    }
                    row.find('.tax_amount').val(taxAmount);
                    //calculate NetAmount
                    var netAmount = calculateNetAmount(amountValue, discountAmount, taxAmount);
                    row.find('.net_amount').val(netAmount.toFixed(2));

                    //triggers
                    row.find('.amount').trigger('change');
                    row.find('.discount_amount').trigger('change');
                    row.find('.tax_amount').trigger('change');
                    row.find('.net_amount').trigger('change');
                    if ($('#discount').length)
                        $('#discount').trigger('change');
                    return false;
                });
                $(document).on('change', '.product_discount, .product_discount_type, .tax_id, .price', function (e) {
                    $(this).closest('.recordset').find('.quantity').trigger('change');
                });
                $(document).on('change', '#discount_type, #discount', function (e) {
                    var subTotal = $('#sub_total').val();
                    var discount = $('#discount').val();
                    var discountRatio = 0;
                    if ($('#discount_type').val() == 'percent') {
                        discountRatio = discount / 100;
                        discount = subTotal * (discount / 100);
                    } else {
                        discountRatio = discount / subTotal;
                    }
                    $('.recordset').each(function () {
                        var amount = Number($(this).find('.amount').val());
                        var discountAmount = discountRatio * amount;
                        $(this).find('.discount_amount').val(discountAmount);
                        var taxId = $(this).closest('.recordset').find('.tax_id').val();
                        var taxAmount = 0;
                        if (taxId) {
                            taxAmount = getTotalTaxAmount($(this), taxId, amount, discountAmount);
                            $(this).find('.taxable_amount').val(amount - (discountAmount ? discountAmount : 0));
                        } else {
                            $(this).find('.product_tax').removeData('tax-value');
                            $(this).find('.taxable_amount').val(0);
                        }
                        $(this).find('.tax_amount').val(taxAmount);
                        var netAmount = calculateNetAmount(amount, discountAmount, taxAmount);
                        $(this).find('.net_amount').val(netAmount.toFixed(2));
                        $(this).find('.discount_amount').trigger('change');
                        $(this).find('.tax_amount').trigger('change');
                        $(this).find('.net_amount').trigger('change');
                        $(this).find('.amount').trigger('change');
                    });

                });
                $(document).on('change', '.discount_amount', function (e) {
                    var amount = 0;
                    $('.discount_amount').each(function () {
                        amount += Number($(this).val());
                    });
                    $('#discount_amount').val(amount.toFixed(2)).trigger('change');
                });
                $(document).on('change', '.tax_amount', function (e) {
                    var amount = 0;
                    var taxableAmount = 0;
                    $('.tax_amount').each(function () {
                        amount += Number($(this).val());
                    });
                    $('.taxable_amount').each(function () {
                        taxableAmount += Number($(this).val());
                    });
                    $('#tax_amount').val(amount.toFixed(2)).trigger('change');
                    $('#taxable_amount').val(taxableAmount.toFixed(2)).trigger('change');
                });
                $(document).on('change', '.net_amount, .extra_charges', function (e) {
                    var amount = 0;
                    $('.net_amount').each(function () {
                        amount += Number($(this).val());
                    });
                    $('#net_amount').val(amount.toFixed(2));
                    $('.extra_charges').each(function () {
                        amount += Number($(this).val());
                    });
                    if ($('#total').length != 0) {
                        //var total = calculateNetAmount(subTotal, discountAmount, taxAmount);
                        var total = amount;
                        if ($("#freight_charges").length != 0) {
                            var freight = isNaN($("#freight_charges").val()) ? 0 : $("#freight_charges").val();
                            total = total + Number(freight);
                        }
                        $('#total').val(total.toFixed(2));
                    }
                });
                $(document).on('change', '.amount', function (e) {
                    var amount = 0;
                    $('.amount').each(function () {
                        amount += Number($(this).val());
                    });
                    $('#sub_total').val(amount.toFixed(2)).trigger('change');
                });
                $(document).on('change', '#tax_amount', function (e) {
                    displayTaxDetails();
                });

            },
        };

    function displayTaxDetails() {
        $('.tax_details').remove();
        var dataTax = [];
        $('.product_tax').each(function (index) {
            if ($(this).data('tax-value')) {
                $.merge(dataTax, JSON.parse($(this).data('tax-value')));
            }
        });
        var result = dataTax.reduce(function (res, obj) {
            if (!(obj.name in res))
                res.__array.push(res[obj.name] = obj);
            else {
                res[obj.name].rate = obj.rate;
                res[obj.name].tax_amount += obj.tax_amount;
            }
            return res;
        }, {__array: []}).__array;
        var taxDetails = '';
        $.each(result, function (i, v) {
            taxDetails += '<tr class="tax_details">';
            if (i == 0)
                taxDetails += '<td colspan="{{$colSpan}}" rowspan="' + result.length + '" class="align-right">' +
                    '<label for="tax_amount" class="control-label">Tax Amount:</label></td>';
            taxDetails += '<td  class="text-right" id ="tax_name' + v.name + '"> ' + v.name + '(' + v.rate + ') %' + '</td>' +
                '<td  id ="tax_amount' + v.name + '"> <input name="tax_amount' + v.name + '" value="' +
                v.tax_amount.toFixed(2) + '" class="form-control" step="0.01" readonly></td>';
            if (i == 0) {
                @if(setting('sales_discount_item_level') == 1 ||  setting('sales_tax_item_level'))
                    taxDetails += '<td rowspan="' + result.length + '" ></td>';
                @else
                    taxDetails += '<td rowspan="' + result.length + '"></td>' +
                    '<td rowspan="' + result.length + '"></td>';
                @endif
            }
            taxDetails += '</tr>';
        });
        $(taxDetails).insertAfter('#tax_amount_tr');
    }

            @else
    var CalculateAmount = {
            priceValue: 0,
            quantityValue: 0,
            amountValue: 0,
            init: function () {
                this.calculateAmount();
            },
            calculateAmount: function () {
                $(document).on('change', '.warehouse_quantity_value', function () {
                    var warehouseQuantityTd = $(this).closest('td');
                    var warehouseQuantityValues = warehouseQuantityTd.find('.warehouse_quantity_value');
                    var quantity = 0;
                    warehouseQuantityValues.each(function () {
                        quantity = quantity + parseFloat($(this).val());
                    });
                    warehouseQuantityTd.find('.quantity').val(quantity);
                    warehouseQuantityTd.find('.quantity').trigger('change');
                });

                $(document).on('change', '.quantity', function (e) {
                    this.quantityValue = this.value;
                    this.priceValue = $(this).closest('.recordset').find('.price').val();
                    this.priceValue = (this.priceValue == '') ? 0 : this.priceValue;
                    this.amountValue = this.priceValue * this.quantityValue;
                    this.amountValue = isNaN(this.amountValue) ? 0 : this.amountValue;
                    $(this).closest('.recordset').find('.amount').val(this.amountValue.toFixed(2));
                    calculateTotal();
                    $('.amount').trigger('change');
                    return false;
                });
                $(document).on('change', '#discount_type', function (e) {
                    if ($(this).val() == 'percent') {
                        if (!$('.discount_type').hasClass('col-sm-8')) {
                            $('.discount_type').addClass('col-sm-8');
                            $('.discount_type').removeClass('col-sm-12');
                        }
                        if (!$('.discount_amount').hasClass('col-sm-4')) {
                            $('.discount_amount').addClass('col-sm-4');
                        }
                        $('.discount_amount').show();
                    } else {
                        if (!$('.discount_type').hasClass('col-sm-12')) {
                            $('.discount_type').addClass('col-sm-12');
                            $('.discount_type').removeClass('col-sm-8');
                        }
                        if (!$('.discount_amount').hasClass('col-sm-4')) {
                            $('.discount_amount').removeClass('col-sm-4');
                        }
                        $('.discount_amount').hide();
                    }

                });
                $(document).on('change', '.price', function (e) {
                    this.priceValue = this.value;
                    this.quantityValue = $(this).closest('.recordset').find('.quantity').val();
                    this.quantityValue = (this.quantityValue == '') ? 0 : this.quantityValue;
                    this.amountValue = this.priceValue * this.quantityValue;
                    $(this).closest('.recordset').find('.amount').val(this.amountValue.toFixed(2));
                    calculateTotal();
                    $('.amount').trigger('change');
                    return false;
                });

                $(document).on('change', '#discount, #discount_type, #tax, #freight_charges', function (e) {
                    calculateTotal();
                });
            },
        };

    function calculateTotal() {
        var subTotal = 0;
        var taxableAmount = 0;
        var discountAmount = 0;
        var tax_amount = 0;
        $('.total_wise_cost').each(function () {
            var total_wise_cost = Number($(this).val());
            subTotal = subTotal + total_wise_cost;
        });
        $('.amount').each(function () {
            var amount = Number($(this).val());
            subTotal = subTotal + amount;
        });
        if ($("#sub_total").length != 0) {
            subTotal = isNaN(subTotal) ? 0 : subTotal;
            $("#sub_total").val(subTotal.toFixed(2));
        }

        if ($('#discount').length != 0) {
            var discount = $('#discount').val();
            var discountType = $('#discount_type').val();
            var discountAmount = calculateDiscount(subTotal, (discount ? discount : 0), discountType);
            discountAmount = isNaN(discountAmount) ? 0 : discountAmount;
            $('#discount_amount').val(discountAmount.toFixed(2));
            var taxableAmount = subTotal - discountAmount;
            taxableAmount = isNaN(taxableAmount) ? 0 : taxableAmount;
            $('#taxable_amount').val(taxableAmount.toFixed(2));
        } else {
            taxableAmount = subTotal;
        }
        if ($('#tax').length != 0) {
            var tax = $('#tax').val();
            var tax_amount = calculateTax(taxableAmount, (tax ? tax : 0));
            tax_amount = isNaN(tax_amount) ? 0 : tax_amount;
            $('#tax_amount').val(tax_amount.toFixed(2));
        }
        if ($('#total').length != 0) {
            var total = isNaN(taxableAmount + tax_amount) ? 0 : taxableAmount + tax_amount;
            if ($("#freight_charges").length != 0) {
                var freight = isNaN($("#freight_charges").val()) ? 0 : $("#freight_charges").val();
                total = total + Number(freight);
            }
            $('#total').val(total.toFixed(2));
        }
    }

    @endif
    /*function calculateTotalWithExtraCharges(amount) {

     }*/

    function getTotalTaxAmount(row, taxId, amountValue, discountAmount) {
        return calculateExclusiveTax(row, taxId, amountValue, discountAmount);
    }

    function calculateExclusiveTax(row, taxId, amountValue, discountAmount) {
        var totalTaxAmount = 0;
        var amount = amountValue - (discountAmount ? discountAmount : 0);
        var tax = taxes[taxId];
        if (tax.is_grouped) {
            var value = [];
            var compoundAmount = amount;
            $.each(tax.groups, function (k, v) {
                var taxAmount = 0;
                if (v.is_compound == 1) {
                    var rate = v.rate / 100;
                    taxAmount = compoundAmount * rate;
                    compoundAmount = compoundAmount + (compoundAmount * rate);
                } else {
                    var rate = v.rate / 100;
                    taxAmount = compoundAmount * rate;
                }
                value.push({
                    "name": v.name,
                    "rate": v.rate,
                    "taxable_amount": amount,
                    "tax_amount": taxAmount
                });
                totalTaxAmount += taxAmount;
            });
            if (row)
                row.find('.product_tax').data('tax-value', JSON.stringify(value));
        } else {
            var rate = tax.rate / 100;
            var value = [{
                "name": tax.name,
                "rate": tax.rate,
                "taxable_amount": amount,
                "tax_amount": (amount * rate)
            },];
            totalTaxAmount += amount * rate;
            if (row)
                row.find('.product_tax').data('tax-value', JSON.stringify(value));
        }
        return totalTaxAmount;
    }

    function calculateInclusiveTax(row, taxId, amountValue, discountAmount) {

        var totalTaxAmount = 0;
        var amount = amountValue - (discountAmount ? discountAmount : 0);
        var tax = taxes[taxId];
        if (tax.is_grouped) {
            var value = [];
            var compoundAmount = amount;
            var groupTaxes = tax.groups;
            var jsonArr = Object.keys(groupTaxes).map(function (key) {
                return [groupTaxes[key]];
            });
            $.each(jsonArr.reverse(), function (k, v) {
                v = v[0];
                var taxAmount = 0;
                if (v.is_compound == 1) {
                    var percent = Number(v.rate);
                    var rate = percent / 100;
                    var taxableAmount = ((compoundAmount * 100) / (percent + 100));
                    taxAmount = taxableAmount * rate;
                    compoundAmount = compoundAmount - (taxAmount);
                } else {
                    var percent = Number(v.rate);
                    var rate = percent / 100;
                    var taxableAmount = ((compoundAmount * 100) / (percent + 100));
                    taxAmount = taxableAmount * rate;
                }
                value.push({
                    "name": v.name,
                    "rate": v.rate,
                    "taxable_amount": taxableAmount,
                    "tax_amount": taxAmount
                });
                totalTaxAmount += taxAmount;
            });
            if (row)
                row.find('.product_tax').data('tax-value', JSON.stringify(value));
        } else {
            var percent = Number(tax.rate);
            var rate = percent / 100;
            var taxableAmount = ((amount * 100) / (percent + 100));
            var value = [{
                "name": tax.name,
                "rate": tax.rate,
                "taxable_amount": taxableAmount,
                "tax_amount": (taxableAmount * rate)
            },];
            totalTaxAmount += taxableAmount * rate;
            if (row)
                row.find('.product_tax').data('tax-value', JSON.stringify(value));
        }
        return totalTaxAmount;
    }

    function calculateInclusiveTaxBeforeDiscount(row, taxId, amountValue) {
        var totalTaxAmount = 0;
        var amount = amountValue;
        var tax = taxes[taxId];
        if (tax.is_grouped) {
            var value = [];
            var compoundAmount = amount;
            var groupTaxes = tax.groups;
            var jsonArr = Object.keys(groupTaxes).map(function (key) {
                return [groupTaxes[key]];
            });
            $.each(jsonArr.reverse(), function (k, v) {
                v = v[0];
                var taxAmount = 0;
                if (v.is_compound == 1) {
                    var percent = Number(v.rate);
                    var rate = percent / 100;
                    var taxableAmount = ((compoundAmount * 100) / (percent + 100));
                    taxAmount = taxableAmount * rate;
                    compoundAmount = compoundAmount - (taxAmount);
                } else {
                    var percent = Number(v.rate);
                    var rate = percent / 100;
                    var taxableAmount = ((compoundAmount * 100) / (percent + 100));
                    taxAmount = taxableAmount * rate;
                }
                totalTaxAmount += taxAmount;
            });
        } else {
            var percent = Number(tax.rate);
            var rate = percent / 100;
            var taxableAmount = ((amount * 100) / (percent + 100));
            totalTaxAmount += taxableAmount * rate;
        }
        return totalTaxAmount;
    }

    function calculateNetAmount(amount, discountAmount, taxAmount) {
        return (amount - discountAmount) + taxAmount;
    }


    function calculateDiscount(amount, discount, discount_type) {
        if (discount_type == 'percent') {
            return (amount * (discount / 100));
        } else {
            return parseFloat(discount);
        }
    }

    function calculateTax(amount, tax) {
        return (amount * (tax / 100));
    }

    $(document).ready(function () {
        CalculateAmount.init();
        $('.quantity').trigger('change');
    });

</script>
