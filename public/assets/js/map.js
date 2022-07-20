
let base_url = 'http://localhost:8080'
let userMarker, directionsRenderer, infoWindow, circle
let userPosition = null

    function initMap() {
        showMap() //show map
        directionsRenderer = new google.maps.DirectionsRenderer(); //render route
        if (datas) {
            loopingAllMarker(datas) //looping all marker
        } else {
            showAtractionGallery()
        }
        highlightCurrentManualLocation() //highligth when button location not clicked
    }

    function showMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            // mapId: "8e0a97af9386fef",
            center: {
                lat: latApar,
                lng: lngApar
            },
            zoom: 16,
        });
    }
    // show list panel
    function showPanelList(datas = null) {
        if (datas) {
            let listPanel = []
            for (let i = 0; i < datas.length; i++) {
                let data = datas[i]
                let id = datas[i].id
                let name = datas[i].name
                let lat = datas[i].lat
                let lng = datas[i].lng
                listPanel.push(`<tr><td>${i+1}</td><td>${name} </td><td class="text-center"><button onclick="showInfoOnMap(${JSON.stringify(data).split('"').join("&quot;")})" class="btn btn-primary btn-sm"><i class="fa fa-info fa-xs"></i></button> <button onclick="calcRoute(${lat},${lng})" class="btn btn-primary btn-sm"><i class="fa fa-road fa-xs"></i></button></td></tr>`)
            }
            $('#panelTabel').html(`<thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody>`)
        }
    }
    //show atraction gallery
    function showAtractionGallery() {
        $('#panelTabel').html(`<img src="https://source.unsplash.com/random/255x300/?wallpaper,landscape" onclick="showObject('atraction')" style="cursor: pointer;">`)
    }
    //show info on map
    function showInfoOnMap(data) {
        const objectMarker = new google.maps.Marker({
            position: {
                lat: parseFloat(data.lat),
                lng: parseFloat(data.lng)
            },
            icon: checkIcon(),
            opacity: 0.8,
            title: "Info Marker",
            map: map,
        })
        objectMarker.addListener('click', () => {
            openInfoWindow(objectMarker, infoMarkerData(data))
        })
        openInfoWindow(objectMarker, infoMarkerData(data))
    }
    //loping all marker
    function loopingAllMarker(datas) {
        showPanelList(datas) // show list panel
        for (let i = 0; i < datas.length; i++) {
            addMarkerToMap(datas[i])
        }
    }
    //user manual marker
    function manualLocation() {
        Swal.fire({
            text: 'Select your position on map',
            icon: 'success',
            showClass: {
                popup: 'animate__animated animate__fadeInUp'
            },
            timer: 1200,
            confirmButtonText: 'Oke'
        })
        google.maps.event.addListener(map, "click", (event) => {
            userPosition = event.latLng
            addUserManualMarkerToMap(userPosition)
            if (circle) {
                circle.setMap(null)
            }
            $('#rowObjectArround').css("display", "none")
            showPanelList(datas)
            directionsRenderer.setMap(null)
        })
    }

    // add polygon on map
    function addPolygonToMap(geoJson, color, opacity) {
        // Construct the polygon.
        const a = {
            type: 'Feature',
            geometry: geoJson
        }
        const geom = new google.maps.Data()
        geom.addGeoJson(a)
        geom.setStyle({
            fillColor: '#00b300',
            strokeWeight: 0.5,
            strokeColor: '#ffffff',
            fillOpacity: 0.1,
            clickable: false
        })
        geom.setMap(map)
    }
    // move camera
    function moveCamera(z = 17, h = 300, t = 30) {
        map.moveCamera({
            zoom: z,
            heading: h,
            tilt: t
        })
    }
    // Tilt and rotate camera
    function tiltAndRotateCamera() {
        const buttons = [
            ["<", "rotate", 20, google.maps.ControlPosition.LEFT_CENTER],
            [">", "rotate", -20, google.maps.ControlPosition.RIGHT_CENTER],
            ["V", "tilt", 20, google.maps.ControlPosition.TOP_CENTER],
            ["^", "tilt", -20, google.maps.ControlPosition.BOTTOM_CENTER],
        ]
        buttons.forEach(([text, mode, amount, position]) => {
            const controlDiv = document.createElement("div")
            const controlUI = document.createElement("button")
            controlUI.classList.add("ui-button");
            controlUI.innerText = `
            $ {
                text
            }
            `;
            controlUI.addEventListener("click", () => {
                adjustMap(mode, amount);
            });
            controlDiv.appendChild(controlUI);
            map.controls[position].push(controlDiv);
        })
        const adjustMap = function(mode, amount) {
            switch (mode) {
                case "tilt":
                    map.setTilt(map.getTilt() + amount);
                    break;
                case "rotate":
                    map.setHeading(map.getHeading() + amount);
                    break;
                default:
                    break;
            }
        }
    }
    //callroute
    function calcRoute(lat, lng) {
        let destinationCord = {
            lat: lat,
            lng: lng
        }
        let directionsService = new google.maps.DirectionsService();
        if (userPosition == null) {
            Swal.fire({
                text: 'Please determine your position first!',
                icon: 'warning',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                timer: 1500,
                confirmButtonText: 'Oke'
            })
            return setTimeout(() => {
                $('#currentLocation').addClass('highligth')
                $('#manualLocation').addClass('highligth')
                setTimeout(() => {
                    $('#currentLocation').removeClass('highligth')
                    $('#manualLocation').removeClass('highligth')
                }, 1000)
            }, 1400)
        }
        var request = {
            origin: userPosition,
            destination: destinationCord,
            travelMode: 'WALKING'
        }
        directionsService.route(request, function(response, status) {
            if (status == 'OK') {
                directionsRenderer.setMap(map);
                directionsRenderer.setDirections(response)
            } else {
                return Swal.fire({
                    text: 'Sorry, Cannot recognize your rute! :( ',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                })
            }
        })
        //Show detail rute at element you want
        // display.setPanel(document.getElementById());
    }

    function checkIcon() {
        let icon = {
            url: null, // url
            scaledSize: new google.maps.Size(25, 25), // scaled size
            origin: new google.maps.Point(0, 0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
        }
        if (ajaxUrl == 'atraction') {
            icon.url = base_url+"/assets/images/marker-icon/marker-atraction.png"
        } else if (ajaxUrl == 'event') {
            icon.url = base_url+"/assets/images/marker-icon/marker_ev.png"
        } else if (ajaxUrl == 'culinary_place') {
            icon.url = base_url+"/assets/images/marker-icon/marker_cp.png"
        } else if (ajaxUrl == 'worship_place') {
            icon.url = base_url+"/assets/images/marker-icon/marker_wp.png"
        } else if (ajaxUrl == 'souvenir_place') {
            icon.url = base_url+"/assets/images/marker-icon/marker_sp.png"
        } else if (ajaxUrl == 'facility') {
            icon.url = base_url+"/assets/images/marker-icon/marker_ev.png"
        }
        return icon
    }

    function infoMarkerData(data) {
        let id = data.id
        let name = data.name
        let lat = data.lat
        let lng = data.lng
        let infoMarker = null
        infoMarker = `<div class="text-center">${name}</div><br><div class="col-md text-center" id="infoWindowDiv" ><a role ="button" title ="Route here" class="btn btn-outline-primary" onclick ="calcRoute(${lat},${lng})"> <i class ="fa fa-road"> </i></a > <a href="${base_url}/detail_object/${ajaxUrl}/${id}" target="_blank" role="button" class="btn btn-outline-primary" title="Detail information"> <i class="fa fa-info"></i></a> 
        ${(() => {if (ajaxUrl == 'atraction' || ajaxUrl == 'event') {
        return `<a onclick = "setNearby(${lat},${lng})" target="_blank" role = "button" class="btn btn-outline-primary" title="Object arround you"><i class="fa fa-compass"></i></a >`
        }else{return ''}})()} </div>`
        return infoMarker
    }

    // add Atraction Marker on Map
    function addMarkerToMap(data) {
        // add geom to map
        if (data.geoJSON) {
            const geoJSON = JSON.parse(data.geoJSON)
            addPolygonToMap(geoJSON)
        }
        let lat = parseFloat(data.lat)
        let lng = parseFloat(data.lng)
        const objectMarker = new google.maps.Marker({
            position: {
                lat: lat,
                lng: lng
            },
            icon: checkIcon(),
            opacity: 0.8,
            title: "Info Object",
            animation: google.maps.Animation.DROP,
            map: map,
        })
        objectMarker.addListener('click', () => {
           if(window.location.href == base_url+'/list_object'){
            openInfoWindow(objectMarker, infoMarkerData(data))
           }else{
             openInfoWindow(objectMarker,data.name)
           }
           
        })
    }
    //open infowindow
    function openInfoWindow(marker, content = "Info Window") {
        if (infoWindow != null) {
            infoWindow.close()
        }
        infoWindow = new google.maps.InfoWindow({
            content: content
        })
        infoWindow.open({
            anchor: marker,
            map,
            shouldFocus: false,
        })
    }
    //CurrentLocation on Map
    function currentLocation() {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    addUserManualMarkerToMap(pos);
                    userPosition = pos
                    map.setCenter(pos);
                },
                () => {
                    handleLocationError(true, currentWindow, map.getCenter());
                }
            )
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, currentWindow, map.getCenter());
        }
    }
    //Browser doesn't support Geolocation
    function handleLocationError(browserHasGeolocation, currentWindow, pos) {
        currentWindow.setPosition(pos);
        currentWindow.setContent(
            browserHasGeolocation ?
            "Error: The Geolocation service failed." :
            "Error: Your browser doesn't support geolocation."
        )
        currentWindow.open(map);
    }
    // Adds a user manual marker to the map.
    function addUserManualMarkerToMap(location) {
        if (userMarker) {
            userMarker.setPosition(location);
        } else {
            userMarker = new google.maps.Marker({
                position: location,
                opacity: 0.8,
                title: "Your Location",
                animation: google.maps.Animation.DROP,
                draggable: false,
                map: map,
            });
            content = `Your Location <div class="text-center"><button  title="Search nearby" onclick="setNearby()" class="btn btn-outline-primary"><i class="fa fa-compass fa-sm"></i></button> </div>`
            userMarker.addListener('click', () => {
                openInfoWindow(userMarker, content)
            })
        }
    }
    //wide the map and remove the panel list
    function togglePanelList() {
        $('#list').toggle()
    }

    //function radius 
    function radius() {
        if (circle) {
            circle.setMap(null)
        }
        circle = new google.maps.Circle({
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
            map,
            center: userPosition,
            radius: 0
        });
    }
    //function slidervalue
    function sliderChange(val) {
        let distance = parseInt(val)
        let cp = $("#cpCheck").prop('checked') == true
        let wp = $("#wpCheck").prop('checked') == true
        let sp = $("#spCheck").prop('checked') == true
        let f = $("#fCheck").prop('checked') == true
        $('#sliderVal').html(distance);
        circle.setRadius(distance)
        const url = "list_object/search_nearby"
        $.ajax({
            url: base_url + "/" + url + "/" + distance,
            method: "get",
            data: {
                cp: cp,
                wp: wp,
                sp: sp,
                f: f
            },
            dataType: "json",
            success: function(response) {
                alert(response)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });
    }
    //function search nearby
    function setNearby(lat = null, lng = null) {
        $('#panelListTittle').html('Search Result Object Arround')
        $('#panelTabel').html('')
        $('#rowObjectArround').css("display", "block")
        if (lat != null && lng != null) {
            userPosition = {
                lat: lat,
                lng: lng
            }
            addUserManualMarkerToMap(null)
            directionsRenderer.setMap(null)
            radius()
        } else {
            directionsRenderer.setMap(null)
            radius()
        }
    }
    //add legend to map
    function legend() {
        $('#legendButton').empty()
        $('#legendButton').append('<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hide Legend" class="btn icon btn-primary mx-1" id="legend-map" onclick="hideLegend()"><span class="material-symbols-outlined">visibility_off</span></a>');

        let legend = document.createElement('div')
        legend.id = 'legendPanel'
        let content = []
        content.push('<h4>Legend</h4>')
        content.push('<p><div class="color a"></div>User</p>')
        content.push('<p><div class="color b"></div>Atraction</p>')
        content.push('<p><div class="color c"></div>Event</p>')
        content.push('<p><div class="color d"></div>Culinary place</p>')
        content.push('<p><div class="color e"></div>Worship place</p>')
        content.push('<p><div class="color e"></div>Souvenir place</p>')
        content.push('<p><div class="color e"></div>Facility</p>')
        legend.innerHTML = content.join('')
        legend.index = 1
        map.controls[google.maps.ControlPosition.LEFT_TOP].push(legend)
    }
    //Hide legend
    function hideLegend() {
        $('#legendPanel').remove()
        $('#legendButton').empty()
        $('#legendButton').append('<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Legend" class="btn icon btn-primary mx-1" id="legend"  onclick="legend()"><span class="material-symbols-outlined">visibility</span></a>');
    }
    // highlight current and manual location before click the button
    function highlightCurrentManualLocation() {
        google.maps.event.addListener(map, "click", (event) => {
            if (userPosition == null) {
                $('#currentLocation').addClass('highligth')
                $('#manualLocation').addClass('highligth')
                setTimeout(() => {
                    $('#currentLocation').removeClass('highligth')
                    $('#manualLocation').removeClass('highligth')
                }, 400)
            }
        })
    }
window.initMap = initMap
