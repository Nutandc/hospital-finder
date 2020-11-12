<script>
    Echo.private(`user.` + '{{ Auth::id() }}')
        .notification((notification) => {
            getNotificationsCount();
        });
    //Notification calls
    $('.notifications-menu').on('click', function () {
        getNotifications();
    });
    $('.markAllRead').on('click', function (e) {
        markAllAsRead();
        e.stopPropagation();
        if ($(this).hasClass('notification-index')) {
        } else {
            getNotifications();
            getNotificationsCount();
            e.stopPropagation();
        }
    });

    function getNotifications() {
        axios.get('{{ route($routePrefix.'.notifications.getNotifications') }}')
            .then((response) => {
                var data = response.data;
                $('.notifications-list').html(data);
            }).catch(function (error) {
            alert('Cannot reach request');
            console.log(error);
            return false;
        });
    }

    function getNotificationsCount() {
        axios.get('{{ route($routePrefix.'.notifications.getNotificationCount') }}').then((response) => {
            if (response.data == 0)
                $('.notification_count').hide();
            else
                $('.notification_count').show();
            $('.notification_count').html(response.data);
            $('.notification_count_li').html(response.data);
        }).catch(function (error) {
            alert('Cannot reach request');
            console.log(error);
            return false;
        });
    }

    function markAllAsRead() {
        axios.get('{{ route($routePrefix.'.notifications.markAllAsRead') }}').then((response) => {
            return true;
        }).catch(function (error) {
            alert('Cannot reach request');
            console.log(error);
            return false;
        });
    }

    function markAsRead(notificationId) {
        axios.get('{!! url('/')  !!}' + '/' + '{{$routePrefix}}' + '/notifications/' + notificationId + '/markAsRead').then((response) => {
            return true;
        }).catch(function (error) {
            alert('Cannot reach request');
            console.log(error);
            return false;
        });
    }
</script>