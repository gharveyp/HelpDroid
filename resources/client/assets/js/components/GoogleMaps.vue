<template>
    <section class="content">
        <div>
            <div>
                <label>
                    <gmap-autocomplete
                            @place_changed="setPlace">
                    </gmap-autocomplete>
                    <button @click="addMarker">Add</button>
                </label>
                <br/>
            </div>
            <br>
            <gmap-map
                    :center="center"
                    :zoom="12"
                    v-on:click="onMapClick"
                    style="
                    width: 100%;
                    height: 500px;"
            >
                <gmap-marker
                        :key="index"
                        v-for="(m, index) in markers"
                        :position="m.position"
                        @click="center=m.position"
                ></gmap-marker>
            </gmap-map>
        </div>
    </section>
</template>

<script>
    import CreateSafe from "../components/cruds/Safezones/Create";
    export default {
        name: "GoogleMap",
        components: {
            CreateSafe,
        },
        data() {
            return {
                // default to Montreal to keep it simple
                // change this to whatever makes sense
                center: { lat: 45.508, lng: -73.587 },
                markers: [],
                places: [],
                currentPlace: null,
                selectedloc: {
                    lat: '',
                    lng: '',
                    address: '',
                    placename: ''
                }
            };
        },
        mounted() {
            this.geolocate();
        },

        methods: {
            // receives a place object via the autocomplete component
            setPlace(place) {
                this.currentPlace = place;
            },
            addMarker() {
                if (this.currentPlace) {
                    const marker = {
                        lat: this.currentPlace.geometry.location.lat(),
                        lng: this.currentPlace.geometry.location.lng()
                    };
                    this.markers.push({ position: marker });
                    this.places.push(this.currentPlace);
                    this.center = marker;
                    this.currentPlace = null;
                }
            },
            geolocate: function() {
                navigator.geolocation.getCurrentPosition(position => {
                    this.center = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                });
            },
            onMapClick(event) {
                var geocoder = new google.maps.Geocoder();
                console.log(event.latLng.lat() + " - " + event.latLng.lng());
                var location = {
                    lat: event.latLng.lat(),
                    lng: event.latLng.lng()
                };
                geocoder.geocode({'location': location }, function(results, status){
                    if (status === 'OK') {
                        if (results[0]) {
                            console.log(results[0].formatted_address);
                            /*this.selectedloc.lat = location.lat;
                            this.selectedloc.lng = location.lng;
                            this.selectedloc.address = results[0].formatted_address;*/
                            console.log(this.$parent);
                            this.$parent.msg = results[0].formatted_address;
                        } else {
                            console.log(status);
                            window.alert('No results found');
                        }
                    }
                })
            }
        },
    };
</script>