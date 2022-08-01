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

                    emptyAllMarker()
                    atData = response.atData
                    atUrl = response.url

                    evData = response.evData
                    evUrl = response.url

                    userMarker = null
                    initMap()
                    if (atData && atUrl) {
                        loopingAllMarker(atData, atUrl)
                    }
                    if (evData && evUrl) {
                        loopingAllMarker(evData, evUrl)
                    }
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

    function getAtractionByName(val = null) {
        let name = val
        if (!name) {
            return
        }
        $.ajax({
            url: "<?= base_url('list_object') ?>" + "/" + "atraction_by_name" + "/" + name,
            method: "get",
            dataType: "json",
            success: function(response) {
                emptyAllMarker()
                atData = response.atData
                atUrl = response.url
                initMap()
                if (atData && atUrl) {
                    loopingAllMarker(atData, atUrl)
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });


    }

    function getEventByName(val = null) {
        let name = val
        if (!name) {
            return
        }
        $.ajax({
            url: "<?= base_url('list_object') ?>" + "/" + "event_by_name" + "/" + name,
            method: "get",
            dataType: "json",
            success: function(response) {
                emptyAllMarker()
                evData = response.evData
                evUrl = response.url
                initMap()
                if (evData && evUrl) {
                    loopingAllMarker(evData, evUrl)
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });


    }
</script>