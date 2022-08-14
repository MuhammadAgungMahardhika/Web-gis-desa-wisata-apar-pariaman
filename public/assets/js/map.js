
let base_url = 'http://localhost:8080'
let userPosition,userMarker,directionsRenderer,infoWindow,circle,map
let markerArray = []
let markerNearby
let geomArray = []
let geomNearby
let atData,evData,cpData,spData,wpData, fData, detailData
let atUrl,evUrl,cpUrl,spUrl,wpUrl,fUrl,detailUrl
let mapStyles = [{featureType: "poi",elementType: "labels",stylers: [{ visibility: "off" }]}]
    function initMap() {
        showMap() //show map , polygon, legend
        directionsRenderer = new google.maps.DirectionsRenderer(); //render route
        if(datas && url){loopingAllMarker(datas,url)} // detail object
        mata_angin() // mata angin compas on map
        addButtonDarkMap() // button dark map on map
        highlightCurrentManualLocation() //highligth when button location not clicked
        if(indexUrl =='index'){showUpcoming()} //showing upcoming 
    }

    function showMap() {
        map = new google.maps.Map(document.getElementById("map"),{ center: {lat: latApar,lng: lngApar}, zoom: 16,clickableIcons: false,styles: mapStyles });
        addAparPolygon(geomApar,'#ffffff')
        addAparLabel()
    }
    function showDarkMap(){
        let darkMap = [
        {elementType: "geometry", stylers: [{ color: "#242f3e" }] },
        {elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
        {elementType: "labels.text.fill", stylers: [{ color: "#746855" }] }, 
        {featureType: "road",elementType: "geometry",stylers: [{ color: "#38414e" }],},
        {featureType: "road",elementType: "geometry.stroke",stylers: [{ color: "#212a37" }],},
        {featureType: "road",elementType: "labels.text.fill",stylers: [{ color: "#9ca5b3" }],},
        {featureType: "road.highway",elementType: "geometry",stylers: [{ color: "#746855" }],},
        {featureType: "road.highway",elementType: "geometry.stroke",stylers: [{ color: "#1f2835" }],},
        {featureType: "road.highway",elementType: "labels.text.fill",stylers: [{ color: "#f3d19c" }],},
        {featureType: "poi",elementType: "labels",stylers: [{ visibility: "off" }]}]
        map.setOptions({ styles: darkMap });
        buttonDarkMode.innerHTML =`<a id="dayMap" title="day mode" role="button" class="btn btn-light" style="margin-top:10px" onclick="showDayMap()"><i class="fa fa-sun-o"></i></a>`
    }
    function showDayMap(){
        map.setOptions({ styles: mapStyles });
        buttonDarkMode.innerHTML =`<a id="darkMap" title="dark mode" role="button" class="btn btn-light" style="margin-top:10px" onclick="showDarkMap()"><i class="fa fa-moon-o"></i></a>`
    }
    function addAparLabel(){
        
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
    function showInfoOnMap(data,url) {
        const objectMarker = new google.maps.Marker({
            position: {
                lat: parseFloat(data.lat),
                lng: parseFloat(data.lng)
            },
            icon: checkIcon(url),
            opacity: 0.8,
            title: "Info Marker",
            map: map,
        })
        markerArray.push(objectMarker)
        objectMarker.addListener('click', () => {openInfoWindow(objectMarker, infoMarkerData(data,url))}) //open infowindow when click
        openInfoWindow(objectMarker, infoMarkerData(data,url))
    }
    //loping all marker
    function loopingAllMarker(datas,url) {
        showPanelList(datas,url) // show list panel
        for (let i = 0; i < datas.length; i++) {addMarkerToMap(datas[i],url)} //looping all 
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
            clearSlider()
            clearRadius()
            clearRoute()
            userPosition = event.latLng
            addUserMarkerToMap(userPosition)
        })
    }

    // add geom on map
    function addMarkerGeom(geoJson, color,pass = null) {
        // Construct the polygon.
        const a = {type: 'Feature',geometry: geoJson}

        const geom = new google.maps.Data()
        geom.addGeoJson(a)
        geom.setStyle({
            fillColor: color,
            strokeWeight: 0.3,
            strokeColor: '#00b300',
            fillOpacity: 0.3,
            clickable: false
        })
      
        if(!pass){
            geomArray.push(geom)
        }else{
            geomNearby = geom
        }
        
        geom.setMap(map)
    
    }
    // clear geom on map
    function clearGeom(pass=null){
        if(!pass){
            for(i in geomArray){
                geomArray[i].setMap(null)
            }
           geomArray = []
        }
        
    }
    function addAparPolygon(geoJson, color, opacity) {
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
   
    // move camera
    function moveCamera(z = 17, h = 300, t = 30) {
        map.moveCamera({
            zoom: z,
            heading: h,
            tilt: t
        })
    }
    // add callroute
    function calcRoute(lat, lng) {
        let destinationCord = {lat: lat,lng: lng}

        let directionsService = new google.maps.DirectionsService();
        if (!userPosition) {
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
    // clear route
    function clearRoute(){
        if(directionsRenderer){
            return  directionsRenderer.setMap(null)
        }
    }

    function checkIcon(icon) {
        if (icon == 'atraction') {return icon = { url:  base_url+"/assets/images/marker-icon/marker-atraction.png"}}
        if (icon == 'event') {return icon = {url: base_url+"/assets/images/marker-icon/marker_ev.png"}} 
        if (icon == 'culinary_place') {return icon = {url:  base_url+"/assets/images/marker-icon/marker_cp.png"}}
        if (icon == 'worship_place') {return icon = {url:  base_url+"/assets/images/marker-icon/marker_wp.png"}} 
        if (icon == 'souvenir_place') {return icon = {url:  base_url+"/assets/images/marker-icon/marker_sp.png"}} 
        if (icon == 'facility') {return icon = {url:  base_url+"/assets/images/marker-icon/marker_ev.png"}}
    }

    function infoMarkerData(data,url) {
        let id = data.id
        let name = data.name
        let status = data.status
        let dateStart = data.date_start
        // let dateEnd = data.date_end
        let lat = data.lat
        let lng = data.lng
        let infoMarker
      
        infoMarker = `<div class="text-center mb-1">${name}</div>${(() => {if (url == 'event') {return`<div class="text-center mb-1"><i class="fa fa-calendar"></i> ${dateStart}</div>`}else{return ''}})()}${(() => {if (url == 'atraction') {return`<div class="text-center mb-1">${status}</div>`}else{return ''}})()}<div class="col-md text-center" id="infoWindowDiv" ><a role ="button" title ="Route here" class="btn btn-outline-primary" onclick ="calcRoute(${lat},${lng})"> <i class ="fa fa-road"> </i></a > <a href="${base_url}/detail_object/${url}/${id}" target="_blank" role="button" class="btn btn-outline-primary" title="Detail information"> <i class="fa fa-info"></i></a> ${(() => {if (url == 'atraction' || url == 'event'){return `<a onclick = "setNearby(${JSON.stringify(data).split('"').join("&quot;")},${JSON.stringify(url).split('"').join("&quot;")})" target="_blank" role = "button" class="btn btn-outline-primary" title="Object arround you"><i class="fa fa-compass"></i></a >`}else{return ''}})()} </div>`
        return infoMarker
    }

     // show list panel
     function showPanelList(datas,url) {
        $('#panel').css('max-height','40vh')
            let listPanel = []
            // if object is empty
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
                $('#panel').html(`<div class="card-header"><h5 class="card-title text-center">List atraction</h5></div><div class="card-body"><table class="table table-border overflow-auto" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)
            }
            if(url=='event'){
                $('#panel').html(`<div class="card-header"><h5 class="card-title text-center">List event</h5></div><div class="card-body"><table class="table table-border overflow-auto" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)
            }
            if(url=='culinary_place'){
                $('#panel').append(`<div class="card-header"><h5 class="card-title text-center">List culinary place</h5></div><div class="card-body"><table class="table table-border overflow-auto shadow" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)
            }
            if(url=='souvenir_place'){
                $('#panel').append(`<div class="card-header"><h5 class="card-title text-center">List souvenir place</h5></div><div class="card-body"><table class="table table-border overflow-auto shadow" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)
            }
            if(url=='worship_place'){
                $('#panel').append(`<div class="card-header"><h5 class="card-title text-center">List worship place</h5></div><div class="card-body"><table class="table table-border overflow-auto shadow" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)
            }
            if(url=='facility'){
                $('#panel').append(`<div class="card-header"><h5 class="card-title text-center">List facility</h5></div><div class="card-body"><table class="table table-border overflow-auto shadow" width="100%"><thead><tr><th>#</th><th>Name</th><th class="text-center">Action</th></tr></thead><tbody id="tbody">${listPanel}</tbody></table></div>`)
            }     
    }

    // add Object Marker on Map
    function addMarkerToMap(data,url=null,pass=null) {
        let lat = parseFloat(data.lat)
        let lng = parseFloat(data.lng)
        let geoJSON,color
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
        // add geom to map
        if (data.geoJSON) {
            geoJSON = JSON.parse(data.geoJSON)
            if(url=='atraction'){color = '#C45A55'}
            if(url=='event'){color = '#8EFFCD'}
            if(url=='culinary_place'){color = '#FA786D'}
            if(url =='souvenir_place'){color = '#ED90C4'}
            if(url == 'worship_place'){color = '#42CB6F'}
            if(url == 'facility'){color = '#8EFFCD'}
        }
       
        if(!pass){
            markerArray.push(objectMarker)
            addMarkerGeom(geoJSON,color)
        }else{
            markerNearby = objectMarker
            addMarkerGeom(geoJSON,color,'pass')
        }
        
        objectMarker.addListener('click', () => {
           if(window.location.href == base_url+'/list_object'){
            openInfoWindow(objectMarker, infoMarkerData(data,url))
           }else{
             openInfoWindow(objectMarker,data.name)
           }
        })
        
    }
    // clear object marker on map
    function clearMarker(pass=null){
            for (i in markerArray){markerArray[i].setMap(null);}
            clearGeom()
            markerArray = [];
            if(!pass){
                clearMarkerNearby()
            }        
    }
    function clearMarkerNearby(){
        if(markerNearby){
            markerNearby.setMap(null)
            markerNearby = null 
        }
        if(geomNearby){
            geomNearby.setMap(null)
            geomNearby = null
        }
    }
    // set center on map
    function setCenter(val){
        map.setCenter(val)
    }
   
    //open infowindow
    function openInfoWindow(marker, content = "Info Window") {
        if (infoWindow != null) { infoWindow.close()}
        infoWindow = new google.maps.InfoWindow({content: content})
        infoWindow.open({anchor: marker,map,shouldFocus: false,})
    }
     //close infowindow
    function clearInfoWindow(){
        if(infoWindow){
            infoWindow.close()
        }
    }
    //CurrentLocation on Map
    function currentLocation() {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition
            ((position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    clearRadius()
                    clearRoute()
                    addUserMarkerToMap(pos);
                    userPosition = pos
                    map.setCenter(pos);
                },() =>{handleLocationError(true, currentWindow, map.getCenter());}
            )
        } else {handleLocationError(false, currentWindow, map.getCenter()); } // Browser doesn't support Geolocation
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
    // Add user marker
    function addUserMarkerToMap(location) {
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
            userMarker.addListener('click',() =>{openInfoWindow(userMarker, content)})
        }
    }
    // delete user marker
    function clearUser(){
        if(userMarker){
            userMarker.setMap(null)
            userMarker = null
        }
       
    }
    //wide the map and remove the panel list
    function togglePanelList() {
        $('#list').toggle()
    }

    //function radius 
    function radius(radius = null) {
        if (circle) {circle.setMap(null)}
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
    function clearRadius(){
        if(circle){
          return circle.setMap(null)
        }
    }
    function clearSlider(){
        $('#atSlider').val("0")
        $('#evSlider').val("0")
        $('#atSliderVal').html("0"+" m")
        $('#evSliderVal').html("0"+" m")
        $('#radiusSlider').val("0")
        $('#sliderVal').html("0"+ " m")
      
    }
    function setMainSliderToZero(){
            $('#atSliderVal').html("0"+" m")
            $('#atSlider').val("0")
            $('#evSliderVal').html("0"+" m")
            $('#evSlider').val("0")
    }
    function mainNearby(val,object){
        if(!userMarker){
           Swal.fire({
                text: 'Please determine your position first!',
                icon: 'warning',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                timer: 1500,
                confirmButtonText: 'Oke'
            })
           return setMainSliderToZero()
        }
        hideObjectArroundPanel()
        let distance = parseInt(val)
        const url = "list_object/search_main_nearby"
        $.ajax({
            url: base_url + "/" + url + "/" + distance,
            method: "get",
            data: {main: object,lng : userPosition.lng,lat : userPosition.lat},
            dataType: "json",
            success: function(response) {
                if(response){
                    if(response.atData && response.atUrl){
                        atData = response.atData
                        atUrl = response.atUrl
                        $('#atSliderVal').html(distance+" m")
                        radius(distance)
                        clearMarker()
                        clearRoute()
                       return loopingAllMarker(atData,atUrl)
                    }
                    if(response.evData && response.evUrl){
                        evData = response.evData
                        evUrl = response.evUrl
                        $('#evSliderVal').html(distance+" m")
                        radius(distance)
                        clearMarker()
                        clearRoute()
                        return loopingAllMarker(evData,evUrl)
                    }
                } 
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function setSupportSliderToZero(){
        $('#sliderVal').html("0"+ " m")
        $('#radiusSlider').val("0")
    }
    //function slidervalue
    function supportNearby(val=null) {
        let distance = parseFloat(val)
        let cp = $("#cpCheck").prop('checked') == true
        let wp = $("#wpCheck").prop('checked') == true
        let sp = $("#spCheck").prop('checked') == true
        let f =  $("#fCheck").prop('checked') == true
        $('#panel').html('')
        clearRadius()
        clearRoute()
        clearMarker('pass')
        if(cp == false && wp == false && sp == false && f==false){ 
           Swal.fire({
                text: 'Please check the box!',
                icon: 'warning',
                showClass: {popup: 'animate__animated animate__fadeInUp'},
                timer: 1200,
                confirmButtonText: 'Oke'
            })
            return  setSupportSliderToZero()
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
                    // Add support marker
                    if(response.cpData && response.cpUrl){
                        cpData = response.cpData
                        cpUrl = response.cpUrl
                        loopingAllMarker(cpData,cpUrl)
                    }
                    if(response.spData && response.spUrl){
                        spData = response.spData
                        spUrl = response.spUrl    
                        loopingAllMarker(spData,spUrl)
                    }
                    if(response.wpData && response.wpUrl){
                        wpData = response.wpData 
                        wpUrl = response.wpUrl
                        loopingAllMarker(wpData,wpUrl)
                    }
                    if(response.fData && response.fUrl){
                        fData  =  response.fData
                        fUrl = response.fUrl
                        loopingAllMarker(fData,fUrl)
                    }
                    radius(distance)
                    $('#sliderVal').html(distance+ " m");
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });
    }
    //function search nearby
    function setNearby(data,url) {
        userPosition = { lat: parseFloat(data.lat),lng: parseFloat(data.lng)}
        setSupportSliderToZero()
        setMainSliderToZero()
        clearUser()
        clearRoute()
        clearMarker()
        clearRadius()
        showObjectArroundPanel()
        addMarkerToMap(data,url,'pass')
        return supportNearby("0")
            
    }
    // add mata angin 
    function mata_angin(){
        const legendIcon = `${base_url}/assets/images/marker-icon/`
        const centerControlDiv = document.createElement("div");
        centerControlDiv.innerHTML =`<div class="mb-4"><img src="${legendIcon}mata_angin.png" width="120"></img><div>`
        map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(centerControlDiv);
    }
    // add button dark map
    function addButtonDarkMap(){
        let buttonDarkMode = document.createElement("div");
        buttonDarkMode.id = 'buttonDarkMode'
        buttonDarkMode.innerHTML =`<a id="darkMap" title="dark mode" role="button" class="btn btn-light shadow-sm" style="margin-top:10px" onclick="showDarkMap()"><i class="fa fa-moon-o"></i></a>`
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(buttonDarkMode);
    }
    //add legend to map
    function legend() {
        const legendIcon = `${base_url}/assets/images/marker-icon/`
        $('#legendButton').empty()
        $('#legendButton').append('<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hide Legend" class="btn icon btn-primary mx-1" id="legend-map" onclick="hideLegend()"><span class="material-symbols-outlined">visibility_off</span></a>');

        let legend = document.createElement('div')
        legend.id = 'legendPanel'
        let content = []
        content.push('<h6 class="text-center">Legend</h6>')
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
   function showObjectArroundPanel(){
    $('#panel').html('')
    $('#rowObjectArround').css("display", "block")
    $("#cpCheck").prop("checked", false)
    $("#wpCheck").prop("checked", false)
    $("#spCheck").prop("checked", false)
    $("#fCheck").prop("checked", false)
    $("#sliderVal").val("0")
   }
   function hideObjectArroundPanel(){
    $('#rowObjectArround').css("display", "none")
   }
    // show object on map
    function showObject(object, id = null) {
        let url
        if (id != null) {
            url = base_url + "/" +"list_object"+ "/"+ object + "/" + id
        } else {
            url = base_url + "/" +"list_object"+ "/"+ object
        }
        $.ajax({
            url: url,
            method: "get",
            dataType: "json",
            success: function(response) {
                setCenter({lat: latApar,lng: lngApar})
                $('#rowObjectArround').css("display", "none")
                atData = response.atData
                atUrl = response.url

                evData = response.evData
                evUrl = response.url
                if (atData && atUrl) {
                    clearMarker()
                    clearRadius()
                    clearRoute()
                    loopingAllMarker(atData, atUrl)
                }
                if (evData && evUrl) {
                    clearMarker()
                    clearMarker()
                    clearRadius()
                    clearRoute()
                    loopingAllMarker(evData, evUrl)
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });
    }
    // set object name with ajax when sidemenu by name is clicked
    function setObjectByName(object) {
        $.ajax({
            url: base_url +"/"+"list_object"+"/"+object,
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
      // Show atraction on map when name is match
     function getObjectByName(val = null,url) {
        let name = val
        if (!name) {
            return
        }
        let urlNow
        if(url=='atraction'){
            urlNow = "atraction_by_name"
        }else if(url=='event'){
            urlNow = "event_by_name"
        }
        $('#rowObjectArround').css("display", "none")
        $.ajax({
            url: base_url + "/" + "list_object"+ "/"+ urlNow + "/" + name,
            method: "get",
            dataType: "json",
            success: function(response) {
                setCenter({lat: latApar,lng: lngApar})
                clearMarker()
                clearRadius()
                clearRoute()
                if(url =='atraction'){
                    atData = response.atData
                    atUrl = response.url
                    loopingAllMarker(atData, atUrl)
                }else if(url=='event'){
                    evData = response.evData
                    evUrl = response.url
                    loopingAllMarker(evData, evUrl)
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });
    }
     // Show atraction on map when rate is match
      function getObjectByRate(val,url) {
        let urlNow
        $('#rowObjectArround').css("display", "none")
        if(url=='atraction'){
            urlNow = "atraction_by_rate"
        }else if(url =='event'){
            urlNow ="event_by_rate"
        }
        $.ajax({
            url: base_url + "/" + "list_object"+ "/"+ urlNow + "/" + val,
            method: "get",
            dataType: "json",
            success: function(response) {
                setCenter({lat: latApar,lng: lngApar})
                clearMarker()
                clearRadius()
                clearRoute()
                if(url == 'atraction'){
                    atData = response.atData
                    atUrl = response.url
                    loopingAllMarker(atData, atUrl)
                    setStar(val)
                }else if (url =='event'){
                    evData = response.evData
                    evUrl = response.url
                    loopingAllMarker(evData, evUrl)
                    setStar2(val)
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" +
                    xhr.responseText + "\n" + thrownError);
            }
        });
    }
   // Set star by user input
   function setStar(star) {
    switch (star) {
        case '1':
            $("#star-1").addClass('star-checked')
            $("#star-2,#star-3,#star-4,#star-5").removeClass('star-checked')
            break
        case '2':
            $("#star-1,#star-2").addClass('star-checked')
            $("#star-3,#star-4,#star-5").removeClass('star-checked')
            break
        case '3':
            $("#star-1,#star-2,#star-3").addClass('star-checked')
            $("#star-4,#star-5").removeClass('star-checked')
            break
        case '4':
            $("#star-1,#star-2,#star-3,#star-4").addClass('star-checked')
            $("#star-5").removeClass('star-checked')
            break
        case '5':
            $("#star-1,#star-2,#star-3,#star-4,#star-5").addClass('star-checked')
            break
    }
    }
     // Set star by user input
   function setStar2(star) {
    switch (star) {
        case '1':
            $("#sstar-1").addClass('star-checked')
            $("#sstar-2,#sstar-3,#sstar-4,#sstar-5").removeClass('star-checked')
            break
        case '2':
            $("#sstar-1,#sstar-2").addClass('star-checked')
            $("#sstar-3,#sstar-4,#sstar-5").removeClass('star-checked')
            break
        case '3':
            $("#sstar-1,#sstar-2,#sstar-3").addClass('star-checked')
            $("#sstar-4,#sstar-5").removeClass('star-checked')
            break
        case '4':
            $("#sstar-1,#sstar-2,#sstar-3,#sstar-4").addClass('star-checked')
            $("#sstar-5").removeClass('star-checked')
            break
        case '5':
            $("#sstar-1,#sstar-2,#sstar-3,#sstar-4,#sstar-5").addClass('star-checked')
            break
    }
    }

    function addComment(url){
        return alert(base_url + "/" + "review" + "/" + "comment_"+ url)
        $("#formReview").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: base_url + "/" + "review" + "/" + "comment_"+ url,
                method: "POST",
                data: $(this).serialize(),  
                dataType: "json",           
                success: function(response) {               
                document.getElementById("formReview").reset();
                // $('#status').html(response);              
                }
            });
        });
    }
    

