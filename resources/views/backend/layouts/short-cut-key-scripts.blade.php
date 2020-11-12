<script>
    //WareHouses
    key('shift + w', function () {
        if (($('.modal.in').length) > 0) return;
        $('.modal').modal('hide');
        $('#modal-create-warehouse').modal('show');
    });
    //Location
    key('shift + l', function () {
        if (($('.modal.in').length) > 0) return false;
        $('.modal').modal('hide');
        $('#modal-create-location').modal('show');

    });
    //Charges
    key('shift + g', function () {
        if (($('.modal.in').length) > 0) return false;
        $('.modal').modal('hide');
        $('#modal-create-charge').modal('show');
    });
    //Contacts
    key('shift + c', function () {
        if (($('.modal.in').length) > 0) return false;
        $('.modal').modal('hide');
        $('#modal-create-contact').modal('show');
    });
    //Currencies
    key('shift + m', function () {
        if (($('.modal.in').length) > 0) return false;
        $('.modal').modal('hide');
        $('#modal-create-currency').modal('show');
    });
    //Add Tax
    key('shift + t', function () {
        if (($('.modal.in').length) > 0) return false;
        $('.modal').modal('hide');
        $('#tax-modal').modal('show');
        // return false;
    });
    //print
    key('ctrl + p', function () {
        if ($('.printable')) {
            $('.print').trigger('click');
            return false;
        }
    });
    key('shift + x', function () {
        if (($('.modal.in').length) > 0) return false;
        $('.modal').modal('hide');
        $('#modal-create-chart-of-account').modal('show');
        // return false;
    });

    key('alt + a', function () {
        console.log('Approved Event Fire');
        let ele = $('#update_status');
        if (ele.closest('li').hasClass('disabled')) {
            alert('Sorry ' + ele[0].action.split('/')[4] + ' has already Approved?');
        } else {
            if (ele.length > 0) {
                if (confirm('Are you sure to approved ' + ele[0].action.split('/')[4] + ' ?') === true) {
                    console.log('Approved Event Confirmed ');
                    ele.find('input[name="status"]').remove();
                    $("<input type='hidden' value='approved' name='status'/>").appendTo(ele);
                    ele.submit();
                } else {
                    console.log('Approved Confirm cancel');
                    return false;
                }
            }
        }

    });

    key('alt + r', function () {
        console.log('Approved Event Fire');
        let ele = $('#update_status');
        if (ele.closest('li').hasClass('disabled')) {
            alert('Sorry ' + ele[0].action.split('/')[4] + ' has already Recommended?');
        } else {
            if (ele.length > 0) {
                if (confirm('Are you sure to Recommended ' + ele[0].action.split('/')[4] + ' ?') === true) {
                    console.log('Approved Event Confirmed ');
                    ele.find('input[name="status"]').remove();
                    $("<input type='hidden' value='recommended' name='status'/>").appendTo(ele);
                    ele.submit();
                } else {
                    console.log('Approved Confirm cancel');
                    return false;
                }
            }
        }

    });

    key('alt + c', function () {
        console.log('Cancel Event Fire');
        let ele = $('.action-more').find('.cancel-status');
        let cancel_modal = $('#cancel_modal');
        if (ele.length > 0) {
            console.log('Cancel Event Confirmed ');
            let cancelModal = ele.attr('data-target');
            if (cancelModal) {
                $(cancelModal).modal('show');
            }
        }
        if (cancel_modal.length > 0) {
            console.log('Cancel Event Confirmed ');
            cancel_modal.modal('show');
        }
    });
    key('alt + s', function () {
        console.log('Checked Event Fire');
        let ele = $('#update_status');
        if (ele.closest('li').hasClass('disabled')) {
            alert('Sorry ' + ele[0].action.split('/')[4] + ' has already checked ?')
        } else {
            if (ele.length > 0) {
                if (confirm('Are you sure to check ' + ele[0].action.split('/')[4] + ' ?') === true) {
                    console.log('Checked Event Confirmed ');
                    ele.find('input[name="status"]').remove();
                    $("<input type='hidden' value='checked' name='status'/>").appendTo(ele);
                    ele.submit();
                } else {
                    console.log('Checked Confirm cancel');
                    return false;
                }
            }
        }

    });

    $(document).ready(function () {
        let action_more = $('.status-action');
        action_more.find('li >a').each(function () {
            let ele = $(this);
            ele.on('click', function () {
                const status = $(this).data('status');
                if (status === 'Close' || status === 'UnClose'
                    || status === 'Canceled' || status === "OnGoing"
                    || status === "Completed" || status === "Paid"
                    || status === 'canceled' || status === "Register"
                    || status === "Sold/Disposed"
                ) {
                    let cancel_modal = ele.closest('li').data('target');
                    let relation_status_input = $(cancel_modal).find('input[name="relation_status"]');
                    $(cancel_modal).find('input[name="status"]').val(status);
                    let relation_status = $(this).closest('.relation_status').data('status');
                    relation_status_input.val(relation_status);
                    $(cancel_modal).modal('show');
                } else {
                    let updateStatusForm = $('form#update_status');
                    updateStatusForm.find('input[name="status"]').remove();
                    $("<input type='hidden' value='" + status + "' name='status'/>").appendTo(updateStatusForm);
                    updateStatusForm.submit();
                }
            })
        });

    });


</script>