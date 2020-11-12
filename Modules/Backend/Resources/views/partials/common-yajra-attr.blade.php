<script>
    function loadingWizard() {
        return "<i class='fa fa-refresh fa-spin fa-2x'></i>";
    }


    function productID() {
        return $('#product_id').val()
    }

    function productCategoryID() {
        return $('#product_category_id').val()
    }

    function selected_project() {
        return $('#selectProjects').val();
    }

    function filterBy() {
        return $("input[name='filter_by']:checked").val()
    }

    function warehouseID() {
        return $('#warehouse_id').val();
    }

    function changeFiscalYear() {
        return $('.select2 :selected').text();

    }

</script>