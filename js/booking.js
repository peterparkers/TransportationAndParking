var parkingNumber = document.getElementById('parking-number');
var p = document.getElementsByClassName('p');
var number = document.getElementById('number');
var position;
// var distance = document.getElementById('distance2');
var _eQuatorialEarthRadius = 6378.1370;
var _d2r = (Math.PI / 180.0);
var x,y;
var distance = 0;

for(let i = 0; i < n.length; i++) {
    p[n[i].n_parking - 1].style.background = '#e74c3c';
}
for(let i = 0; i < p.length; i++) {
    p[i].addEventListener('click', function(){
        clearBorder();
        parkingNumber.value = p[i].firstChild.innerHTML;
        p[i].style.boxSizing = "border-box";
        p[i].style.border = "10px solid #1984c3";
        number.value = i + 1;
        position = i;
    });
    p[i].addEventListener('mouseover', function(evt){
        clearBorder();
        if(i != position) {
            parkingNumber.value = p[i].firstChild.innerHTML;
            p[i].style.boxSizing = "border-box";
            p[i].style.border = "10px solid #fff";
        }
    });
}

function clearBorder() {
    for(let i = 0; i < p.length; i++) {
        if(i != position) {
            p[i].style.boxSizing = "initial";
            p[i].style.border = "0";
            p[i].style.borderRight = "1px solid #fff";
        }
    }
}
function HaversineInM(lat1, long1, lat2, long2)
{
    return (1000.0 * HaversineInKM(lat1, long1, lat2, long2));
}
function HaversineInKM(lat1, long1, lat2, long2)
{
    var dlong = (long2 - long1) * _d2r;
    var dlat = (lat2 - lat1) * _d2r;
    var a = Math.pow(Math.sin(dlat / 2.0), 2.0) + Math.cos(lat1 * _d2r) * Math.cos(lat2 * _d2r) * Math.pow(Math.sin(dlong / 2.0), 2.0);
    var c = 2.0 * Math.atan2(Math.sqrt(a), Math.sqrt(1.0 - a));
    var d = _eQuatorialEarthRadius * c;

    return d;
}
// function getLocation() {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(showPosition);
//     } else {
//         x.innerHTML = "Geolocation is not supported by this browser.";
//     }
// }
// function showPosition(position) {
//     distance = HaversineInKM(position.coords.latitude,position.coords.longitude,12.957673, 100.941566);
//     if(distance < 10) {
//         alert('distance > 10' + distance);
//         return false;
//     }
//     else {
//         return false;
//     }
// }
function validateForm() {
    if(number.value == 0) {
        alert("You have not booked yet.");
        return false;
    }
    if(nArray.includes(number.value)) {
        alert("It's already booked.");
        return false;
    }
    // if(distance < 10) {
    //     alert("Distance > 10 km" + distance);
    //     return false;
    // }
}