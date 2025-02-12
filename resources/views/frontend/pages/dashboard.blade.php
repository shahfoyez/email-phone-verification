<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Room Listing Map') }}
        </h2>
    </x-slot>
<style>
    #room-details{
        bottom: 0;
    }
    .single-room{
        max-width: 200px;
    }
    .single-room .room-image {
        /* max-width: 100px; */
        max-height: 100px;
    }
</style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 relative">
                    <div id="map" style="height: 500px; width: 100%;"></div>
                    <div id="room-details" class="absolute bg-white">
                        <button onclick="hideRoomDetails()" class="absolute top-0 right-0 text-gray-500 hover:text-gray-800 p-2 bg-white">&times;</button>
                        <div id="room-content" class="flex overflow-y-auto"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <script>
        let map;
        const roomData = [
            { id: 1, address: "123 Main St, Sylhet", latitude: 24.8869367913732, longitude: 91.88338560754985, details: [
                    { room_id: 101, image: "https://picsum.photos/200", price: 5000, date: "2025-02-12", username: "JohnDoe", address: "123 Main St, Sylhet" },
                    { room_id: 102, image: "https://picsum.photos/200", price: 6000, date: "2025-02-12", username: "JaneDoe", address: "123 Main St, Sylhet" }
                ]},
            { id: 2, address: "456 Market Rd, Sylhet", latitude: 24.88830420792061, longitude: 91.88596589255842, details: [
                    { room_id: 201, image: "https://picsum.photos/200", price: 4500, date: "2025-02-12", username: "Alice", address: "456 Market Rd, Sylhet" }
                ]},
            { id: 3, address: "789 New St, Sylhet", latitude: 24.88849927808098, longitude: 91.88766050171185, details: [
                    { room_id: 301, image: "https://picsum.photos/200", price: 5500, date: "2025-02-12", username: "Bob", address: "789 New St, Sylhet" }
                ]}
        ];

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 24.8869, lng: 91.8833 },
                zoom: 13,
            });

            roomData.forEach(location => {
                const marker = new google.maps.Marker({
                    position: { lat: location.latitude, lng: location.longitude },
                    map,
                    title: location.address,
                    icon: {
                        url: "https://maps.google.com/mapfiles/kml/shapes/homegardenbusiness.png",
                        scaledSize: new google.maps.Size(32, 32)
                    }
                });

                marker.addListener("click", () => {
                    showRoomDetails(location.details);
                });
            });
        }

        function showRoomDetails(rooms) {
            const detailsDiv = document.getElementById("room-details");
            const contentDiv = document.getElementById("room-content");
            contentDiv.innerHTML = rooms.map(room => `
                <div class="p-2 border-b single-room">
                    <img src="${room.image}" alt="Room Image" class="w-full rounded-lg mb-2 room-image">
                    <p><strong>Price:</strong> ${room.price} BDT</p>
                    <p><strong>Date:</strong> ${room.date}</p>
                    <p><strong>Username:</strong> ${room.username}</p>
                    <p><strong>Address:</strong> ${room.address}</p>
                </div>
            `).join("");

            detailsDiv.classList.remove("hidden");
        }

        function hideRoomDetails() {
            document.getElementById("room-details").classList.add("hidden");
        }
    </script>
</x-app-layout>
