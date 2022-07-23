<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <?= $this->include('layout/sidebar_header'); ?>
        <?= $this->include('layout/sidebar_menu'); ?>
    </div>
</div>
<script>
    function showObject(object, id = null) {
        <?php if (current_url() != base_url('list_object')) : ?>
            window.location = object;
        <?php else : ?>
            let url
            if (id != null) {
                url = "<?= base_url('list_object') ?>" + "/" + object + "/" + id
            } else {
                url = "<?= base_url('list_object') ?>" + "/" + object
            }
            $.ajax({
                url: url,
                method: "get",
                dataType: "json",
                success: function(response) {
                    $('#rowObjectArround').css("display", "none")
                    $('#panelListTittle').html(response.panelList)
                    atData = response.atData
                    atUrl = response.url

                    evData = response.evData
                    evUrl = response.url

                    emptyAllMarker()
                    userMarker = null
                    initMap()
                    if (userPosition != null) {
                        addUserManualMarkerToMap(userPosition)
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" +
                        xhr.responseText + "\n" + thrownError);
                }
            });
        <?php endif; ?>
    }
</script>