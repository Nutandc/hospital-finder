var FormRepo = function (namespace) {
    /// <summary>Persistent form values, saves to localStorage</summary>
    /// <param name="namespace" type="String">the namespace to store values in localStorage</param>

    // should also protect per page, since we could have the same forms in various places
    this.N = namespace + '.' + window.location.pathname;
};
$.extend(FormRepo.prototype, {
    namespace: function (key) {
        return this.N + '.' + key;
    }
    ,
    preserve: function ($form, iden) {
        var data = $form.serializeArray();

        localStorage.setItem(this.namespace('form.' + (iden || $form.index())), JSON.stringify(data));
    }
    ,
    restore: function ($form, iden) {
        var data = localStorage.getItem(this.namespace('form.' + (iden || $form.index())));
        if (null == data || $.isEmptyObject(data)) return; // nothing to do

        $.each(JSON.parse(data), function (i, kv) {
            // find form element, set its value
            var $input = $form.find('[name=' + kv.name + ']');
            if ($input.attr('name') != '_token') {
                // how to set it's value?
                if ($input.is(':checkbox') || $input.is(':radio')) {
                    $input.filter(function () {
                        return $(this).val() == kv.value;
                    }).first().attr('checked', 'checked');
                }
                else {
                    $input.val(kv.value);
                }
            }
        });
    }//--	fn	restore
    ,
    remove: function ($form, iden) {
        localStorage.removeItem(this.namespace('form.' + (iden || $form.index())));
    }//--	fn	remove
    ,
    all: function () {
        var allData = {};
        for (var i = 0, l = localStorage.length; i < l; i++) {
            allData[localStorage.key(i)] = localStorage.getItem(localStorage.key(i));
        }
        return allData;
    }//--	fn	repo.all
});