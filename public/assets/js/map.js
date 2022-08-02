
let base_url = 'http://localhost:8080'
let userMarker,directionsRenderer,infoWindow,circle
let userPosition = null
let atData = null,evData = null,cpData = null,spData= null,wpData= null,fData= null,detailData = null
let atUrl = null,evUrl = null,cpUrl = null,spUrl = null,wpUrl = null,fUrl = null,detailUrl=null

    function initMap() {
        showMap() 
        hideLegend()
        addPolygonToMap(geomApar,'#ffffff') //add polygon when map is on initiation
        directionsRenderer = new google.maps.DirectionsRenderer(); //render route
        if(datas && url){loopingAllMarker(datas,url)} //detail information of object
        mata_angin() // mata angin compas on map
        highlightCurrentManualLocation() //highligth when button location not clicked
        if(indexUrl =='index'){showUpcoming()}
    }
    function showMap() {
        map = new google.maps.Map(document.getElementById("map"),{
            // mapId: "8e0a97af9386fef",
            center: {lat: latApar,lng: lngApar},zoom: 16,
        });
    }
    //show atraction gallery when url is in home
    function showUpcoming() {
        $('#panel').html(`<div class="card-header"><h5 class="card-title text-center">Upcoming events</h5></div><div class="card-body">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class=""></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active"><img src="https://source.unsplash.com/random/0x300/?wallpaper,landscape" onclick="showObject('atraction')" style="cursor: pointer;"></div>
            <div class="carousel-item"><img src="https://source.unsplash.com/random/0x300/?wallpaper,landscape" onclick="showObject('atraction')" style="cursor: pointer;"></div>
            <div class="carousel-item"><img src="https://source.unsplash.com/random/0x300/?wallpaper,landscape" onclick="showObject('atraction')" style="cursor: pointer;"></div>
        </div>
        <a class=" carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div></div>`)
    }
    //show info on map
    function showInfoOnMap(data=null,url=null) {
        const objectMarker = new google.maps.Marker({
            position: {lat: parseFloat(data.lat),lng: parseFloat(data.lng)},
            icon: checkIcon(url),
            opacity: 0.8,
            title: "Info Marker",
            map: map,
        })
        objectMarker.addListener('click', () => {openInfoWindow(objectMarker, infoMarkerData(data,url))})
        openInfoWindow(objectMarker, infoMarkerData(data,url))
    }
    //loping all marker
    function loopingAllMarker(datas=null,url=null) {
        showPanelList(datas,url) // show list panel
        for (let i = 0; i < datas.length; i++){addMarkerToMap(datas[i],url)} //loop marker
    }
    //user manual marker
    function manualLocation() {
        Swal.fire({
            text: 'Select your position on map',
            icon: 'success',
            showClass: {popup: 'animate__animated animate__fadeInUp'},
            timer: 1200,
            confirmButtonText: 'Oke'
        })
        google.maps.event.addListener(map, "click", (event) => {
            userPosition = event.latLng
            addUserManualMarkerToMap(userPosition)
            if (circle) {circle.setMap(null)}
            directionsRenderer.setMap(null)
        })
    }
    // add polygon on map
    function addPolygonToMap(geoJson, color, opacity) {
        // Construct the polygon.
        const a = {type: 'Feature',geometry: geoJson}
        const geom = new google.maps.Data()
        geom.addGeoJson(a)
        geom.setStyle({
            fillColor: '#00b300',
            strokeWeight: 0.5,
            strokeColor: color,
            fillOpacity: 0.1,
            clickable: false
        })
        geom.setMap(map)
    }
    //callroute
    function calcRoute(lat, lng) {
        let destinationCord = {
            lat: lat,
            lng: lng
        }
        let directionsService = new google.maps.DirectionsService();
        if (userPosition == null)
        {
            Swal.fire(
            {
                text: 'Please determine your position first!',
                icon: 'warning',
                showClass: {popup: 'animate__animated animate__fadeInUp'},
                timer: 1500,
                confirmButtonText: 'Oke'
            })
            return setTimeout(()=>{
                $('#currentLocation').addClass('highligth')
                $('#manualLocation').addClass('highligth')
                setTimeout(() => {
                    $('#currentLocation').removeClass('highligth')
                    $('#manualLocation').removeClass('highligth')
                }, 1000)
            }, 1400)
        }
        var request = {origin: userPosition,destination: destinationCord,travelMode: 'WALKING'}
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

    function checkIcon(icon) {
        if (icon == 'atraction') {
          return icon = {url:  base_url+"/assets/images/marker-icon/marker-atraction.png"}
        }
        if (icon == 'event') {
            return icon = {url: base_url+"/assets/images/marker-icon/marker_ev.png"}
        } 
        if (icon == 'culinary_place') {
            return icon = {url:  base_url+"/assets/images/marker-icon/marker_cp.png"}
        }
        if (icon == 'worship_place') {
            return icon = {url:  base_url+"/assets/images/marker-icon/marker_wp.png"}
        } 
         if (icon == 'souvenir_place') {
            return icon = {url:  base_url+"/assets/images/marker-icon/marker_sp.png"}
        } 
        if (icon == 'facility') {
            return icon = {url:  base_url+"/assets/images/marker-icon/marker_ev.png"}
        }
    }

    function infoMarkerData(data,url=null) {
        let id = data.id
        let name = data.name
        let status = data.status
        let dateStart = data.date_start
        // let dateEnd = data.date_end
        let lat = data.lat
        let lng = data.lng
        let infoMarker = null
        infoMarker = `<div class="text-center mb-1">${name}</div>${(() => {if (url == 'event') {return`<div class="text-center mb-1"><i class="fa fa-calendar"></i> ${dateStart}</div>`}else{return ''}})()}${(() => {if (url == 'atraction') {return`<div class="text-center mb-1">${status}</div>`}else{return ''}})()}<div class="col-md text-center" id="infoWindowDiv" ><a role ="button" title ="Route here" class="btn btn-outline-primary" onclick ="calcRoute(${lat},${lng})"> <i class ="fa fa-road"> </i></a > <a href="${base_url}/detail_object/${url}/${id}" target="_blank" role="button" class="btn btn-outline-primary" title="Detail information"> <i class="fa fa-info"></i></a> ${(() => {if (url == 'atraction' || url == 'event'){return `<a onclick = "setNearby(${JSON.stringify(data).split('"').join("&quot;")},${JSON.stringify(url).split('"').join("&quot;")})" target="_blank" role = "button" class="btn btn-outline-primary" title="Object arround you"><i class="fa fa-compass"></i></a >`}else{return ''}})()} </div>`
        return infoMarker
    }
     // show list panel
     function showPanelList(datas = null,url=null) {
        $('#panel').css('max-height','40vh')
        let listPanel = []
        if (datas.length==0){listPanel.push(`<tr colspan="3"><td></td><td class="text-center">Object not found !</td><td></td></tr>`)}
        for (let i = 0; i < datas.length; i++) {
            let data = datas[i]
            let id = datas[i].id
            let name = datas[i].name
            let lat = datas[i].lat
            let lng = datas[i].lng
            listPanel.push(`<tr><td>${i+1}</td><td>${name} </td><td class="text-center"><button title="Info on map" onclick="showInfoOnMap(${JSON.stringify(data).split('"').join("&quot;")},${JSON.stringify(url).split('"').join("&quot;")})" class="btn btn-primary btn-sm"><i class="fa fa-info fa-xs"></i></button> <button title="Route" onclick="calcRoute(${lat},${lng})" class="btn btn-primary btn-sm"><i class="fa fa-road fa-xs"></i></button></td></tr>`)
        }
        if(url=='atraction'){
            $('#panel').html(`<div class="card-header"><h5 class="card-title text-center">List atraction</h5></div><div class="card-body"><table class="table table-border overflow-auto" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)}
        if(url=='event'){
            $('#panel').html(`<div class="card-header"><h5 class="card-title text-center">List event</h5></div><div class="card-body"><table class="table table-border overflow-auto" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)}
        if(url=='culinary_place'){
            $('#panel').append(`<div class="card-header"><h5 class="card-title text-center">List culinary place</h5></div><div class="card-body"><table class="table table-border overflow-auto shadow" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)}
        if(url=='souvenir_place'){
            $('#panel').append(`<div class="card-header"><h5 class="card-title text-center">List souvenir place</h5></div><div class="card-body"><table class="table table-border overflow-auto shadow" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)}
        if(url=='worship_place'){
            $('#panel').append(`<div class="card-header"><h5 class="card-title text-center">List worship place</h5></div><div class="card-body"><table class="table table-border overflow-auto shadow" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)}
        if(url=='facility'){
            $('#panel').append(`<div class="card-header"><h5 class="card-title text-center">List facility</h5></div><div class="card-body"><table class="table table-border overflow-auto shadow" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)}     
    }
    // add Atraction Marker on Map
    function addMarkerToMap(data = null,url=null) {
        if(data==null){
            objectMarker= null
            objectMarker.setMap(null)
            return
        }
        let lat = parseFloat(data.lat)
        let lng = parseFloat(data.lng)
        // add geom to map
        if (data.geoJSON) {
            let geoJSON = JSON.parse(data.geoJSON)
            addPolygonToMap(geoJSON,'#ffffff')
        }
        const objectMarker = new google.maps.Marker({
            position: {
                lat: lat,
                lng: lng
            },
            icon: checkIcon(url),
            opacity: 0.8,
            title: "Info Object",
            animation: google.maps.Animation.DROP,
            map: map,
        })
        objectMarker.addListener('click', () => {
           if(window.location.href == base_url+'/list_object'){
            openInfoWindow(objectMarker, infoMarkerData(data,url))
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
                    const pos = {lat: position.coords.latitude,lng: position.coords.longitude,};
                    addUserManualMarkerToMap(pos);
                    userPosition = pos
                    map.setCenter(pos);
                },()=>{handleLocationError(true, currentWindow, map.getCenter());}
            )
        }else {handleLocationError(false, currentWindow, map.getCenter());}// doesn't support Geolocation
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
            userMarker.setPosition(location)
        } else {
            userMarker = new google.maps.Marker({
                position: location,
                opacity: 0.8,
                title: "Your Location",
                animation: google.maps.Animation.DROP,
                draggable: false,
                map: map,
            });
            content = `Your Location <div class="text-center"></div>`
            userMarker.addListener('click', () => {openInfoWindow(userMarker, content)})
        }
    }
    //wide the map and remove the panel list
    function togglePanelList() {
        $('#list').toggle()
    }

    //function radius 
    function radius(radius = null) {
        if (circle) {
            circle.setMap(null)
        }
        circle = new google.maps.Circle({
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
            map : map,
            center: userPosition,
            radius: radius
        });
    }
    function mainNearby(val,object){
        if(userPosition==null){
            return Swal.fire({
                text: 'Please determine your position first!',
                icon: 'warning',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                timer: 1500,
                confirmButtonText: 'Oke'
            })
        }
        $('#rowObjectArround').css("display", "none")
        let distance = parseInt(val)
        const url = "list_object/search_main_nearby"
        $.ajax({
            url: base_url + "/" + url + "/" + distance,
            method: "get",
            data: {
                main: object,
                lng : userPosition.lng,
                lat : userPosition.lat
            },
            dataType: "json",
            success: function(response) {
                if(response){
                    userMarker = null
                    initMap()
                    if (userPosition != null) {
                        addUserManualMarkerToMap(userPosition)
                    }
                    if(response.atData && response.atUrl){
                        atData = response.atData
                        atUrl = response.atUrl
                        radius(distance)
                       return loopingAllMarker(atData,atUrl)
                    }else{atData = null}

                    if(response.evData && response.evUrl){
                        evData = response.evData
                        evUrl = response.evUrl
                        radius(distance)
                        return loopingAllMarker(evData,evUrl)
                    }else{evData = null}
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });

    }
    //function slidervalue
    function supportNearby(val) {
        let distance = parseFloat(val)
        let cp = $("#cpCheck").prop('checked') == true
        let wp = $("#wpCheck").prop('checked') == true
        let sp = $("#spCheck").prop('checked') == true
        let f =  $("#fCheck").prop('checked') == true
      
        if(cp == false && wp == false && sp == false && f==false){
            return Swal.fire({
                text: 'Please check the box first',
                icon: 'warning',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                timer: 1200,
                confirmButtonText: 'Oke'
            })
        }
        const url = "list_object/search_support_nearby"
        $.ajax({
            url: base_url + "/" + url + "/" + distance,
            method: "get",
            data: {
                cp: cp,
                wp: wp,
                sp: sp,
                f: f,
                lng : userPosition.lng,
                lat : userPosition.lat
            },
            dataType: "json",
            success: function(response) {
                if(response){
                    initMap()  
                    $('#panel').html('')

                    // Add atraction || event marker
                    if(atData && atUrl){
                        addMarkerToMap(atData,atUrl)
                    }else if (evData && atUrl){
                        addMarkerToMap(evData,evUrl)
                    }

                    // Add support marker
                    if(response.cpData && response.cpUrl){
                        cpData = response.cpData
                        cpUrl = response.cpUrl
                        loopingAllMarker(cpData,cpUrl)
                    }else{
                        cpData = null
                    }
                    if(response.spData && response.spUrl){
                        spData = response.spData
                        spUrl = response.spUrl    
                        loopingAllMarker(spData,spUrl)
                    }else{
                        spData = null
                    }
                    if(response.wpData && response.wpUrl){
                        wpData = response.wpData 
                        wpUrl = response.wpUrl
                        loopingAllMarker(wpData,wpUrl)
                    }else{
                        wpData = null
                    }
                    if(response.fData && response.fUrl){
                        fData  =  response.fData
                        fUrl = response.fUrl
                        loopingAllMarker(fData,fUrl)
                    }else{
                        fData = null
                    }
                    radius(distance)
                    $('#sliderVal').html(distance);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });
    }
    //function search nearby
    function setNearby(data ,url) {
        $('#panel').html('')
        $('#rowObjectArround').css("display", "block")
        userPosition = { lat: parseFloat(data.lat),lng: parseFloat(data.lng)}
        userMarker = null
        addUserManualMarkerToMap(null)
            addMarkerToMap(data,url)
            if(url =='atraction'){
                atData = data 
                atUrl = url
            }else if(url =='event'){
                evData = data
                evUrl = url
            }
            directionsRenderer.setMap(null)
    }
    // add mata angin 
    function mata_angin(){
        const legendIcon = `${base_url}/assets/images/marker-icon/`
        const centerControlDiv = document.createElement("div");
        centerControlDiv.innerHTML =`<div class="mb-4"><img src="${legendIcon}mata_angin.png" width="120"></img><div>`
        map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(centerControlDiv);
    }
    //add legend to map
    function legend() {
        const legendIcon = `${base_url}/assets/images/marker-icon/`
        $('#legendButton').empty()
        $('#legendButton').append('<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hide Legend" class="btn icon btn-primary mx-1" id="legend-map" onclick="hideLegend()"><span class="material-symbols-outlined">visibility_off</span></a>');

        let legend = document.createElement('div')
        legend.id = 'legendPanel'
        let content = []
        content.push('<h6 class="text-center text-primary">Legend</h6>')
        content.push(`<p><img src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png" width="15"></img> User</p>`)
        content.push(`<p><img src="${legendIcon}marker-atraction.png" width="15"></img> Atraction</p>`)
        content.push(`<p><img src="${legendIcon}marker_ev.png" width="15"></img> Event</p>`)
        content.push(`<p><img src="${legendIcon}marker_cp.png" width="15"></img> Culinary place</p>`)
        content.push(`<p><img src="${legendIcon}marker_wp.png" width="15"></img> Worship place</p>`)
        content.push(`<p><img src="${legendIcon}marker_sp.png" width="15"></img> Souvenir place</p>`)
        content.push(`<p><img src="${legendIcon}marker_ev.png" width="15"></img> Facility</p>`)
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
    function emptyAllMarker(){
        cpData = null
        spData = null
        wpData = null
        fData = null
    }
