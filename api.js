var city = document.querySelector('.city')

function changeWeatherUI(){
    let apiURL = 'https://api.openweathermap.org/data/2.5/weather?lat=16.068&lon=108.212&appid=9f6f4fd8ee75593600edbd76831dd200'
    let data = await fetch(apiURL).then(res=>res.json())
    console.log(data)
    city.innerHTML = data.name
}

// addEventListener
city.addEventListener()