const container = document.querySelector('.container');
const weatherBox = document.querySelector('.weather-info');
const weatherDetails = document.querySelector('.weather-details');
const error404 = document.querySelector('.not-found');
const image = document.querySelector('.weather-info img');
const temperature = document.querySelector('.weather-info .temperature');
const description = document.querySelector('.weather-info .description');
const humidity = document.querySelector('.weather-details .humidity span');
const wind = document.querySelector('.weather-details .wind span');

const searchWeather = async () => {
    const city = document.querySelector('.search-bar input').value.trim();
    const APIKey = '8a01001e0905088ca0be118718d9570a';
  
    if (!city) {
      return;
    }
  
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${APIKey}`;
  
    try {
      const response = await fetch(url);
      const json = await response.json();
  
      image.src = `images/${json.weather[0].main.toLowerCase()}.png`;
      temperature.innerHTML = `${parseInt(json.main.temp)}<span>°C</span>`;
      description.innerHTML = json.weather[0].description;
      humidity.innerHTML = `${json.main.humidity}%`;
      wind.innerHTML = `${parseInt(json.wind.speed)}Km/h`;
    
      weatherBox.style.display = '';
      weatherDetails.style.display = '';
      weatherBox.classList.add('fadeIn');
      weatherDetails.classList.add('fadeIn');
      container.style.height = '590px';
    } catch (error) {
      console.error(error);
    }
  };
  
  document.querySelector('.search-bar button').addEventListener('click', searchWeather);
  document.querySelector('.search-bar input').addEventListener('keydown', (event) => {
    if (event.keyCode === 13) {
      searchWeather();
    }
  });



