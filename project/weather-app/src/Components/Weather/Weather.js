import React, { useState, useEffect } from "react";
import Clear from "../../assets/images/clear.png";
import Clouds from "../../assets/images/clouds.png";
import Drizzle from "../../assets/images/drizzle.png";
import HumidityImg from "../../assets/images/humidity.png";
import Mist from "../../assets/images/mist.png";
import Rain from "../../assets/images/rain.png";
import WindImg from "../../assets/images/wind.png";
import { FaSpinner } from "react-icons/fa"; // Importing spinner icon
import { Link } from "react-router-dom";

const Weather = ({ SearchCity, cityName, temperature, wind, humidity, weatherDetails, loading }) => {


  const images = {
    Clear,
    Clouds,
    Drizzle,
    Mist,
    Rain,
    Humidity: HumidityImg,
    Wind: WindImg,
  };

  const selectedImage = images[weatherDetails];

  return (
    <div className="h-screen font-mono bg-gradient-to-r from-green-300 via-blue-400 to-purple-500 ">
      <div className="flex justify-center items-center font-sans pt-4">
        <div className="max-w-md w-full rounded-lg bg-gradient-to-br from-blue-600 to-teal-200 shadow-lg p-6 mx-6">
          <form onSubmit={SearchCity} method="post">
            <div className="flex justify-between items-center">
              <input
                className="w-full py-2 px-4 rounded outline-none"
                type="text"
                name="city"
                placeholder="Search your city here"
                required
              />
              <button type="submit" className="ml-4 p-2 rounded bg-cyan-400 hover:bg-blue-300 text-white">
                <i className="ri-search-line text-2xl"></i>
              </button>
            </div>
          </form>

          {loading ? (
            <div className="flex justify-center items-center h-[500px]">
              <FaSpinner className="animate-spin text-4xl text-white" />
            </div>
          ) : temperature !== null ? (
            <div className="flex flex-col items-center h-[500px] mt-6">
              <div className="w-full pt-5 bg-contain flex justify-center items-center">
                {selectedImage && <img className="w-40" src={selectedImage} alt={weatherDetails} />}
              </div>
              <div className="text-6xl md:text-8xl text-center h-32 flex justify-center items-center mt-4">
                {Math.round(temperature)}°C
              </div>
              <div className="w-full text-center">
                <p className="text-2xl md:text-3xl">{cityName}</p>
              </div>
              <div className="mt-8 mb-5 text-lg md:text-xl text-center flex justify-around w-full">
                <div className="flex items-center">
                  <img className="hidden md:flex md:h-12 md:w-12" src={images.Humidity} alt="Humidity" />
                  <div className="ml-2">
                    <p className="md:text-md">{humidity}%</p>
                    <p className="md:text-md">Humidity</p>
                  </div>
                </div>
                <div className="flex items-center">
                  <img className="hidden md:flex md:h-12 md:w-12" src={images.Wind} alt="Wind" />
                  <div className="ml-2">
                    <p className="md:text-md">{wind} km/s</p>
                    <p className="md:text-md">Wind Speed</p>
                  </div>
                </div>
              </div>
            </div>
          ) : (
            <div className="text-center text-xl mt-10 h-[400px]">
              <h2>Location not found</h2>
            </div>
          )}
        </div>
      </div>
      <div className="font-mono flex justify-center items-center mt-2">
        <Link to="https://www.rudalkunwar.com.np" target="_blank">  www.rudalkunwar.com.np</Link>
      </div>
    </div>
  );
};

export default Weather;
