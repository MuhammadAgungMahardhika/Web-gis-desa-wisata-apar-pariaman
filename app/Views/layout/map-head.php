<div class="card-header">
    <div class="row align-items-center">
        <div class="col-md-auto">
            <h5 class="card-title">Google Maps with Location</h5>
        </div>
        <div class="col">
            <a id="manualLocation" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Current Location" class="btn icon btn-primary mx-1" id="current-position" onclick="currentLocation()">
                <span class="material-symbols-outlined">my_location</span>
            </a>
            <a id="currentLocation" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Set Manual Location" class="btn icon btn-primary mx-1" id="manual-position" onclick="manualLocation()">
                <span class="material-symbols-outlined">pin_drop</span>
            </a>
            <span id="legendButton">
                <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Legend" class="btn icon btn-primary mx-1" id="legend-map" onclick="legend();">
                    <span class="material-symbols-outlined">visibility</span>
                </a>
            </span>

        </div>
    </div>
</div>