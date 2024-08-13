import React, { useEffect, useState } from 'react';
import Weather from './Components/Weather/Weather';
import axios from 'axios';

function App() {
  const [cityName, setCityName] = useState("Kathmandu");
  const [temperature, setTemperature] = useState(null);
  const [wind, setWind] = useState(null);
  const [humidity, setHumidity] = useState(null);
  const [weatherDetails, setWeatherDetails] = useState(null);
  const [loading, setLoading] = useState(false);
  const fetchWeatherData = async () => {
    const apiKey = process.env.REACT_APP_WEATHER_API_KEY;
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${cityName}&appid=${apiKey}&units=metric`;
    try {
      const res = await axios.get(url);
      if (res && res.data) {
        setLoading(false);

        setCityName(res.data.name);
        setTemperature(res.data.main.temp);
        setWind(res.data.wind.speed);
        setHumidity(res.data.main.humidity);
        setWeatherDetails(res.data.weather[0].main);
        console.log(res.data);
      }
    } catch (e) {
      setLoading(false);
      console.log("Error fetching weather data: ", e);
      setCityName("Location Not Found !");
      setTemperature(null);
      setWind("");
      setHumidity("");
      setWeatherDetails("");
    }
  };

  const SearchCity = (e) => {
    e.preventDefault();
    setLoading(true);
    const city = e.target.city.value.trim();
    if (city) {
      setCityName(city);
    }
  };

  useEffect(() => {
    setLoading(true);
    fetchWeatherData();
  }, [cityName]);

  return (
    <div>
      <Weather
        SearchCity={SearchCity}
        temperature={temperature}
        cityName={cityName}
        humidity={humidity}
        wind={wind}
        weatherDetails={weatherDetails}
        loading={loading}
      />
    </div >
  );
}

export default App;
