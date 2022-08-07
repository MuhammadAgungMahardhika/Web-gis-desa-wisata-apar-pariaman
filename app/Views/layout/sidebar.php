<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <?= $this->include('layout/sidebar_header'); ?>
        <?= $this->include('layout/sidebar_menu'); ?>
    </div>
</div>
<script>
    // pencarian seluruh object 
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
                    emptyAllMarker()
                    atData = response.atData
                    atUrl = response.url

                    evData = response.evData
                    evUrl = response.url

                    userMarker = null
                    userPosition = null
                    initMap()
                    if (atData && atUrl) {
                        loopingAllMarker(atData, atUrl)
                    }
                    if (evData && evUrl) {
                        loopingAllMarker(evData, evUrl)
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" +
                        xhr.responseText + "\n" + thrownError);
                }
            });
        <?php endif; ?>
    }

    // set nama-nama object ketika by name di tekan
    function setObjectByName(object) {
        $.ajax({
            url: "<?= base_url('list_object') ?>" + "/" + object,
            method: "get",
            dataType: "json",
            success: function(response) {
                let listObject = []
                let url = response.url
                if (url == 'atraction') {
                    atData = response.atData
                    for (let i = 0; i < atData.length; i++) {
                        let name = atData[i].name
                        listObject.push(`<option>${name}</option>`)
                    }
                    return $('#basicSelect').html(`<option value="">Select ${url}</option>${listObject}`)
                } else if (url == 'event') {
                    evData = response.evData
                    for (let i = 0; i < evData.length; i++) {
                        let name = evData[i].name
                        listObject.push(`<option>${name}</option>`)
                    }
                    return $('#basicSelect2').html(`<option value="">Select ${url}</option>${listObject}`)
                }

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });
    }

    // dapatkan nama object dan tampilkan ke map
    function getAtractionByName(val = null) {
        let name = val
        if (!name) {
            return
        }
        $('#rowObjectArround').css("display", "none")
        $.ajax({
            url: "<?= base_url('list_object') ?>" + "/" + "atraction_by_name" + "/" + name,
            method: "get",
            dataType: "json",
            success: function(response) {
                if (userPosition) {
                    userPosition = null
                    userMarker = null
                }
                atData = response.atData
                atUrl = response.url
                if (evData && evUrl) {
                    evData = null
                    evUrl = null
                }
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
        $('#rowObjectArround').css("display", "none")
        $.ajax({
            url: "<?= base_url('list_object') ?>" + "/" + "event_by_name" + "/" + name,
            method: "get",
            dataType: "json",
            success: function(response) {
                if (userPosition) {
                    userPosition = null
                    userMarker = null
                }
                evData = response.evData
                evUrl = response.url
                if (atData && atUrl) {
                    atData = null
                    atUrl = null
                }
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